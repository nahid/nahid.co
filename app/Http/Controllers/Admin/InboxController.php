<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

use App\Models\Messages;

class InboxController extends Controller
{
    public function getIndex()
    {
        $inbox = Messages::orderBy('created_at', 'desc')->get();
        return View::make('admin.inbox.inbox', [
            'pageInfo' =>
                [
                    'siteTitle' => 'Inbox',
                    'pageHeading' => 'Inbox',
                    'pageHeadingSlogan' => 'Here is the place to contact with me'
                ]
            ,
            'data' =>
                [
                    'inboxes' => $inbox
                ]
        ]);
    }


    public function getRead($id)
    {
        $inbox = Messages::find($id);
        $inbox->status = 1;
        $inbox->save();
        return View::make('admin.inbox.readmessage', [
            'pageInfo' =>
                [
                    'siteTitle' => 'Inbox',
                    'pageHeading' => 'Inbox',
                    'pageHeadingSlogan' => 'Here is the place to contact with me'
                ]
            ,
            'data' => $inbox
        ]);
    }
}
