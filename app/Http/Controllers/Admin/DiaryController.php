<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Auth;
use Validator;
use Image;
use Markdown;
use Event;

use App\Http\Requests\DiaryCreateRequest;
use App\Http\Requests\DiaryEditRequest;
use App\Http\Requests\CommentsCreateRequest;
use App\Events\NewDiaryEvent;

use App\Models\Diary;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Tags;


class DiaryController extends Controller
{
    function __construct()
    {
        $this->middleware('adminauthor', ['only'=>['getAll', 'getNew', 'postNew', 'getEdit', 'postEdit']]);
        $this->middleware('admin', ['except'=>['getAll', 'getNew', 'postNew', 'getEdit', 'postEdit']]);
    }

    public function getAll()
    {
        $diary='';
        $view='';
        if(Auth::user()->role=='admin'){
            $diary=Diary::with(['category', 'tags'])->orderBy('created_at', 'desc')->paginate(40);
            $view='admin.diary.alldiary';
        }else{
            $diary=Diary::with(['category', 'tags'])->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(40);
            $view='admin.diary.usersalldiary';
        }



        return view($view, [
          'pageInfo'=>
           [
            'siteTitle'        =>'All Diary',
            'pageHeading'      =>'All Diary',
            'pageHeadingSlogan'=>'I write here what I learn'
            ]
            ,
            'data'=>
            [
               'diary'      =>  $diary
              ]
          ]);
    }

       public function getNew()
       {

         $cat=Category::get();

         return view('admin.diary.newdiary', [
           'pageInfo'=>
            [
             'siteTitle'        =>'New Diary',
             'pageHeading'      =>'New Diary',
             'pageHeadingSlogan'=>'I write here what I learn'
             ]
             ,
             'data'=>
             [
                'category'      =>$cat
               ]
           ]);
       }


      public function postNew(DiaryCreateRequest $req)
      {

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
                   if($req->input('tags')!=''){
                       $tags=explode(',', $req->input('tags'));
                       $diary->tags()->sync($tags);
                   }
                   Event::fire(new NewDiaryEvent($diary));
                   return redirect()->back()->with('msg', 'ok');
               }
           }

      }

     public function getCategory($id=null)
     {

       $cat=Category::get();

       return view('admin.diary.category', [
         'pageInfo'=>[
           'siteTitle'=>'Category Manager',
           'pageHeading'=>'Category Manager',
           'pageHeadingSlogan'=>'I write here what I learn']
           ,
           'data'=>[
              'category'=>$cat
             ]
         ]);
     }

     public function postCategory(Request $req)
     {

        $rules=[
            'category_name'=>['required', 'min:2']
          ];

          $valid=Validator::make($req->input(), $rules);
          if(!$valid->fails()){
              $cat=new Category;
              $cat->category_name=$req->input('category_name');
              $cat->category_alias=strtolower(str_slug($req->input('category_name')));
              if($cat->save()){
                return redirect()->back()->with('msg','Successfully Saved Category');
              }
          }else{
            return redirect()->back()->withErrors($valid->errors());
          }
     }

     public function getTags()
     {

         $tags=Tags::all();

         return view('admin.diary.tags', [
           'pageInfo'=>[
             'siteTitle'=>'Tags Manager',
             'pageHeading'=>'Tags Manager',
             'pageHeadingSlogan'=>'I write here what I learn']
             ,
             'data'=>[
                'tags'=>$tags
               ]
           ]);
     }

     public function postTags(Request $req)
     {

         $rules=[
                'tag_name'=>['required', 'min:2']
            ];

        $valid=Validator::make($req->input(), $rules);

        if(!$valid->fails()){
            $tag=new Tags;
            $tag->tag_name=strtolower(str_slug($req->input('tag_name')));
            if($tag->save()){
                return redirect()->back()->with('msg', 'Successfully Saved Tag');
            }
        }else{
            return redirect()->back()->withErrors($valid->errors());
        }


     }

     public function getEdit($id)
     {

         $cat=Category::get();
         $diary=Diary::find($id);

         return view('admin.diary.editdiary', [
           'pageInfo'=>
            [
             'siteTitle'        =>'Edit Diary',
             'pageHeading'      =>'Edit Diary',
             'pageHeadingSlogan'=>'I write here what I learn'
             ]
             ,
             'data'=>
             [
                'category'      =>  $cat,
                'diary'         =>  $diary
               ]
           ]);
     }


     public function postEdit(DiaryEditRequest $req, $id)
     {

         $diary = Diary::find($id);

         $fileName = $diary->featured_image;

         if($req->hasFile('featured_image')){

          $img=Image::make($req->file('featured_image'));
          $ext=$req->file('featured_image')->getClientOriginalExtension();
          $fileName=str_slug($req->input('title')).uniqid().'.'.$ext;

          $img->resize(760, null, function ($constraint) {
                  $constraint->aspectRatio();
                $constraint->upsize();
              });

          $img->save(public_path().'/media/diary/'.$fileName);
        }

              $diary->title=$req->input('title');
              $diary->note=$req->input('content');
              $diary->category_id=$req->input('category');
              $diary->featured_image=$fileName;
              $diary->status=$req->input('publish')?$req->input('publish'):0;

              if($diary->save()){
                  if($req->input('tags')!=''){
                      $tags=explode(',', $req->input('tags'));
                      $diary->tags()->sync($tags);
                  }

                  return redirect()->back()->with('msg', 'ok');
              }


     }


     public function getDelete($id)
     {
          if(Auth::user()->role=='admin'){
              if(Diary::find($id)->delete()){
                  return redirect()->back()->with('msg','deleted');
              }
          }

          if(Diary::where('user_id', Auth::user()->id)->where('id', $id)->exists()){
              if(Diary::find($id)->delete()){
                  return redirect()->back()->with('msg','deleted');
              }
          }

          return redirect()->back();
     }


}
