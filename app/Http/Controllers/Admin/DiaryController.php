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

use App\Http\Requests\DiaryCreateRequest;
use App\Http\Requests\CommentsCreateRequest;

use App\Models\Diary;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Tags;


class DiaryController extends Controller
{

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

}
