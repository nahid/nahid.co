<?php

namespace App\Listeners;

use App\Events\CommentSentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Nahidz\Notify\Notify;

class SendCommentMailListener
{

    public $comment;
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
     * @param  CommentSentEvent  $event
     * @return void
     */
    public function handle(CommentSentEvent $event)
    {
        $notify=new Notify;
        $this->comment=$event->comment;
        $msg=$this->comment->user->name.' comment your diary';
        $link=url('diary/read/'.$this->comment->diary->id);
        $user=$this->comment->diary->user_id;
        $img=$this->comment->user->image;
        $notify->makeNotification($msg, $link, $user, $img);

    }
}
