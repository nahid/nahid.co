<?php

namespace App\Listeners;

use App\Events\MessageSentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Nahidz\Notify\Notify;

use App\Models\User;

class SendMessageNotificatonListener
{
    public $message;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSentEvent  $event
     * @return void
     */
    public function handle(MessageSentEvent $event)
    {
        $notify=new Notify;
        
        $this->message=$event->message;
        $msg=$this->message->name.' send you a message';
        $link=url('admin/message/read/'.$this->message->id);
        $img=asset('assets/img/avatar5.png');
        $user='null';
        $notify->makeNotification($msg, $link, $user, $img);

    }
}
