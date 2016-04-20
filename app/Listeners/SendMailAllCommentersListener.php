<?php

namespace App\Listeners;

use App\Events\MakeCommentsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use App\Models\Comments;

class SendMailAllCommentersListener
{
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
     * @param  MakeCommentsEvent  $event
     * @return void
     */
    public function handle(MakeCommentsEvent $event)
    {
        $comment=$event->comment;
        $user = $comment->user->toArray();

        $comments=Comments::with('user')->where('diary_id', $comment->diary_id)->groupBy('user_id')->get();

        Mail::queue('email.new_comment_for_poster', ['comment'=>$comment->toArray(), 'user'=>$user], function($m) use($user){
            $m->to($user['email'], $user['name'])->subject("New Comment Was Posted On Your Post | nahid.co");
        });

        $comment= $comment->toArray();

        foreach($comments as $comnt){
            $users=$comnt->user->toArray();
            Mail::queue('email.new_comment', compact('comment', 'users'), function($m) use($users){
                $m->to($users['email'], $users['name'])->subject("New Comment Was Posted | nahid.co");
            });
        }
    }
}
