<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

use App\Models\WorkEdu;
use App\Models\Skills;

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
        $edu=WorkEdu::where('type', 0)->get();
        $work=WorkEdu::where('type', 1)->get();
        $skills=Skills::where('type', 'professional')->get();
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
                    'skills'=>$skills
                ]
            ]);
    }
}
