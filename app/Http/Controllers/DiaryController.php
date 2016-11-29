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
use Cache;

use App\Http\Requests\DiaryCreateRequest;
use App\Http\Requests\CommentsCreateRequest;
use App\Events\MakeCommentsEvent;

use App\Models\Diary;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Tags;
use App\Models\Tagged;



class DiaryController extends Controller
{

  function __construct()
  {
      $this->sidebarCategory();
  }

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





   public function getRead(Request $req, $id, $slag = null){
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

    public function getSearch(Request $req)
    {
        $query = rawurldecode($req->input('q'));
        $words = explode(' ', $query);
        $skipKeywords = ['in', 'are', 'of', 'at', 'a', 'is', 'to', 'an', 'for', 'and', 'or', 'with'];
        $tags = [];

        $keywords = array_diff($words, $skipKeywords);

        $diary = Diary::with('tags')->where(function($q) use($keywords) {
            foreach($keywords as $tag) {
                $q->orWhere('diary.title', 'like', '%'.$tag.'%');
            }
        })->where('diary.status', 1)->orderBy('title', 'asc')->paginate(10);

        if(count($diary)<1) {
            $tags = Tags::where(function($q) use($words){
                foreach ($words as $word) {
                    $q->orWhere('tag_name', 'like', '%' . $word . '%');
                }
            })->get(['tag_name', 'id']);
        }

        return view('site.diary.diary', [
            'pageInfo'=>[
                'pageLogo'=>'diary',
                'siteTitle'=>'Search | '. $query,
                'pageHeading'=>'Search | '. $query,
                'pageHeadingSlogan'=>'Search everything what I write'],
            'data'=>$diary,
            'tags'=>$tags
        ]);
    }



    // pertials

       protected function sidebarCategory(){
        if(!Cache::has('_tags')){
            $tags=Tagged::join('tags', 'tagged.tag_id','=', 'tags.id')->select('tags.id', DB::raw('count(tag_id) as total_tags'), 'tags.tag_name')->groupBy('tagged.tag_id')->take(20)->get();
            Cache::put('_tags', $tags, 60);
        }

        if(!Cache::has('_category')){
            $category=Category::get();
            Cache::put('_category', $category, 60);
        }

        if(!Cache::has('_recent')){
            $recent=Diary::where('status', 1)->orderBy('created_at','desc')->take(5)->get(['title', 'id']);
            Cache::put('_recent', $recent, 60);
        }
        if(!Cache::has('_popular')){
            $recent=Diary::where('status', 1)->orderBy('visits','desc')->take(5)->get(['title', 'id']);
            Cache::put('_popular', $recent, 60);
        }
            view()->composer('site.partials.sidebar', function($view){
                $view->with('navData', [
                    'category'=>Cache::get('_category'),
                    'recents'=>Cache::get('_recent'),
                    'tags'=>Cache::get('_tags'),
                    'populars' => Cache::get('_popular')
                    ]);
            });

    }
}
