<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\WorkEduRequest;


use App\Models\WorkEdu;

class WorkEduController extends Controller
{
    public function getEdu(){
        $edu=WorkEdu::where('type', 0)->get();
        return view('admin.workedu.edu', [
                'pageInfo'=>
                    [
                        'siteTitle'=>'Mange Educations',
                        'pageHeading'=>'Mange Educations'
                    ],
                'data'=>
                    [
                        'edu'=>$edu
                    ]
            ]);
    }


    public function postEdu(WorkEduRequest $req){
        $edu=new WorkEdu;
        $edu->institute=$req->input('institute');
        $edu->address=$req->input('address');
        $edu->period=$req->input('start_year').'-'. $req->input('end_year');
        $edu->section=$req->input('responsibility');
        $edu->note=$req->input('note');
        $edu->type=0;
        if($edu->save()){
            return redirect()->back()->with('msg', 'Successfully Added Education');
        }
    }


    public function getWork(){
        $work=WorkEdu::where('type', 1)->get();
        return view('admin.workedu.work', [
                'pageInfo'=>
                    [
                        'siteTitle'=>'Mange Works',
                        'pageHeading'=>'Mange Works'
                    ],
                'data'=>
                    [
                        'work'=>$work
                    ]
            ]);
    }

    public function postWork(WorkEduRequest $req){
        $edu=new WorkEdu;
        $edu->institute=$req->input('institute');
        $edu->address=$req->input('address');
        $edu->period=$req->input('start_year').'-'. $req->input('end_year');
        $edu->section=$req->input('responsibility');
        $edu->note=$req->input('note');
        $edu->type=1;
        if($edu->save()){
            return redirect()->back()->with('msg', 'Successfully Added Work');
        }
    }

}
