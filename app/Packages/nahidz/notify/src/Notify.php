<?php namespace Nahidz\Notify;

use App\Models\Notifications;

class Notify{

    public function makeNotification($msg, $link, $userId, $img){
        $notify=new Notifications;
        $notify->messages=$msg;
        $notify->link=$link;
        $notify->status=0;
        $notify->user_id=$userId;
        $notify->image=$img;
        if($notify->save()){
            return $notify->id;
        }

        return false;
    }

    public function getAllNotifications(){
        $allNotifications=Notifications::get();
        return $allNotifications;
    }

    public function getNotification($id){
        return Notifications::findOrFail($id);
    }

}
