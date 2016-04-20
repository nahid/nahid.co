<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Support\Collection;

use App\Models\WorkEdu;
use App\Models\Skills;
use App\Models\Messages;

class PublicContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('site.index', ['pageInfo'=>['siteTitle'=>'The Alien']]);
    }

    public function resumePage(){
        $edu=WorkEdu::where('type', 0)->orderBy('id', 'desc')->get();
        $work=WorkEdu::where('type', 1)->orderBy('id', 'desc')->get();

        $skillsArray=Skills::get();
        $skillsCollections=Collection::make($skillsArray);
        $skillsProfessional=$skillsCollections->where('type', 'professional');
        $skillsAdditional=$skillsCollections->where('type', 'additional');


        return View::make('site.resume', [
                'pageInfo'=>[
                        'siteTitle'=>'Resume',
                        'pageHeading'=>'Resume',
                        'pageHeadingSlogan'=>"Here is my qualifications and experience",
                        'pageLogo'=>'resume'
                    ],
                'data'=>
                [
                    'edu'=>$edu,
                    'work'=>$work,
                    'skillsPro'=>$skillsProfessional,
                    'skillsAdd'=>$skillsAdditional
                ]
            ]);
    }


    public function profilePage(){
        return View::make('site.profile', [
                'pageInfo'=>[
                        'siteTitle'=>'Profile',
                        'pageHeading'=>'Profile',
                        'pageHeadingSlogan'=>"A Short Brief About Me",
                        'pageLogo'=>'profile'
                    ]
            ]);
    }

    public function contactPage(){
        return View::make('site.contact', [
                'pageInfo'=>[
                        'siteTitle'=>'Contact',
                        'pageHeading'=>'Contact',
                        'pageHeadingSlogan'=>"Its the place where you can find me",
                        'pageLogo'=>'contact'
                    ]
            ]);
    }

    public function makeContactRequest(ContactRequest $req){
        $msg=new Messages;
        $msg->name=$req->input('name');
        $msg->email=$req->input('email');
        $msg->image=$req->input('email');
        $msg->message=$req->input('message');
        $msg->status=0;

        if($msg->save()){
            return redirect()->back()->with('msg', 'ok');
        }
    }
}
