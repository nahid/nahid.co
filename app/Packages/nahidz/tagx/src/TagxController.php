<?php namespace Nahidz\Notify;
/*
*@Author:		Nahid Bin Azhar
*@Author URL:	http://nahid.co
*/

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Nahidz\Notify\Notify;


class NotifyController extends Controller{

    public function index(Notify $nt){
        // $noti=Notifications::get();
        // return view('notify::view')->with('notify', $noti);

        return $nt->getName();
    }
}
