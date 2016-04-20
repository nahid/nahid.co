<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Auth;
use Validator;
use Image;
use Markdown;
use DB;
use Event;

use App\Http\Requests\DiaryCreateRequest;
use App\Http\Requests\CommentsCreateRequest;
use App\Events\MakeCommentsEvent;

use App\Models\Diary;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Tags;



class DiaryController extends Controller
{
   public function getIndex(){
     $diary=Diary::where('status', 1)->where('category_id', '!=', 7)->with(['tags'])->orderBy('created_at', 'desc')->paginate(10);

     return view('site.diary.diary', [
       'pageInfo'=>[
         'pageLogo'=>'diary',
         'siteTitle'=>'Diary',
         'pageHeading'=>'Diary',
         'pageHeadingSlogan'=>'I write here what I learn'],
         'data'=>$diary
       ]);
   }





   public function getRead(Request $req, $id){
       $diary=Diary::with(['comments', 'tags'])->find($id);

       if($diary->status==0){
           if(!Auth::check()){
               return redirect('diary');
           }elseif(Auth::user()->id!=$diary->user_id){
                return redirect('diary');
           }
       }
       //$comments=Comments::where('diary_id', $id)->get();
       $diary->visits+=1;
       $diary->save();
       return view('site.diary.read', [
         'pageInfo'=>[
           'pageLogo'=>'diary',
           'siteTitle'=>$diary->title,
           'pageHeading'=>'Diary',
           'pageHeadingSlogan'=>'I write here what I learn',
           'siteImage'=>$diary->featured_image,
           'siteContents'=>strShorten($diary->note, 200)
           ],
           'diary'=>$diary,
           'comments'=>$diary->comments,
           'request'=>$req
         ]);

   }

   public function postComment(CommentsCreateRequest $req){
       $comment=new Comments;
       $comment->comment=$req->input('comment');
       $comment->status=1;
       $comment->diary_id=$req->input('diary_id');
       $comment->user_id=Auth::user()->id;
       if($comment->save()){
           Event::fire(new MakeCommentsEvent($comment));
           return redirect('diary/read/'. $req->input('diary_id').'#comment')->with('msg', 'Successfully comment posted');
       }
   }


   public function getCategory($aliasOrId){
       $category=Category::where('id', $aliasOrId)->orWhere('category_alias', $aliasOrId)->firstOrFail();
       $diary=Category::find($category->id)->diary()->where('diary.status', 1)->orderBy('created_at', 'desc')->paginate(10);

       return view('site.diary.diary', [
         'pageInfo'=>[
           'pageLogo'=>'diary',
           'siteTitle'=>'Diary | '.$category->category_name,
           'pageHeading'=>'Diary | '.$category->category_name,
           'pageHeadingSlogan'=>'I write here what I learn'],
           'data'=>$diary
         ]);
   }

   public function getTag($aliasOrId){
       $tag=Tags::where('id', $aliasOrId)->orWhere('tag_name', $aliasOrId)->firstOrFail();
       $diary=Tags::find($tag->id)->diary()->where('diary.status', 1)->orderBy('created_at', 'desc')->paginate(10);

       return view('site.diary.diary', [
         'pageInfo'=>[
           'pageLogo'=>'diary',
           'siteTitle'=>'Diary by Tag | '.$tag->tag_name,
           'pageHeading'=>'Diary | '.$tag->tag_name,
           'pageHeadingSlogan'=>'I write here what I learn'],
           'data'=>$diary
         ]);
   }

   public function getTags(){
       $tags = Tags::select(DB::raw('id as value, tag_name as text'))->get();
       return response()->json($tags);
   }
}
