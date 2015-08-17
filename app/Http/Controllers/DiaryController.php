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

use App\Http\Requests\DiaryCreateRequest;
use App\Http\Requests\CommentsCreateRequest;

use App\Models\Diary;
use App\Models\Category;
use App\Models\Comments;



class DiaryController extends Controller
{
   public function getIndex(){
     $diary=Diary::get();

     return view('diary.diary', [
       'pageInfo'=>[
         'pageLogo'=>'diary',
         'siteTitle'=>'Diary',
         'pageHeading'=>'Diary',
         'pageHeadingSlogan'=>'I write here what I learn'],
         'data'=>$diary
       ]);
   }

   public function getNew(){
     $cat=Category::get();

     return view('diary.newdiary', [
       'pageInfo'=>[
         'pageLogo'=>'diary',
         'siteTitle'=>'New Diary',
         'pageHeading'=>'New Diary',
         'pageHeadingSlogan'=>'I write here what I learn']
         ,
         'data'=>[
            'category'=>$cat
           ]
       ]);
   }

   public function postNew(DiaryCreateRequest $req){

        $img=Image::make($req->file('featured_image'));
        $ext=$req->file('featured_image')->getClientOriginalExtension();
        $fileName=str_slug($req->input('title')).uniqid().'.'.$ext;

        $img->resize(760, null, function ($constraint) {
		        $constraint->aspectRatio();
	          $constraint->upsize();
			});
        if($img->save(public_path().'/media/diary/'.$fileName)){
            $diary=new Diary;
            $diary->title=$req->input('title');
            $diary->note=$req->input('content');
            $diary->category_id=$req->input('category');
            $diary->featured_image=$fileName;
            $diary->status=$req->input('publish')?$req->input('publish'):0;
            $diary->user_id=Auth::user()->id;

            if($diary->save()){
              return redirect()->back()->with('msg', 'ok');
            }
        }

   }



   public function getRead($id){
       $diary=Diary::find($id);
       $comments=Comments::where('diary_id', $id)->get();

       return view('diary.read', [
         'pageInfo'=>[
           'pageLogo'=>'diary',
           'siteTitle'=>$diary->title,
           'pageHeading'=>'Diary',
           'pageHeadingSlogan'=>'I write here what I learn'
           ],
           'diary'=>$diary,
           'comments'=>$comments
         ]);

   }

   public function postComment(CommentsCreateRequest $req){
       $comment=new Comments;
       $comment->comment=$req->input('comment');
       $comment->status=1;
       $comment->diary_id=$req->input('diary_id');
       $comment->user_id=Auth::user()->id;
       if($comment->save()){
           return redirect('diary/read/'. $req->input('diary_id').'#comment')->with('msg', 'Successfully comment posted');
       }
   }
}
