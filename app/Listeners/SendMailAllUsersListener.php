<?php

namespace App\Listeners;

use App\Events\NewDiaryEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

use App\Models\User;

class SendMailAllUsersListener
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
     * @param  NewDiaryEvent  $event
     * @return void
     */
    public function handle(NewDiaryEvent $event)
    {
        $diary=$event->diary;

        $users=User::get(['id','name', 'email']);

        foreach($users as $user){
            $user=$user->toArray();
            Mail::queue('email.new_diary', ['diary'=>$diary->toArray(), 'author'=>$diary->user->toArray(), 'user'=>$user], function($m) use($user){
                  $m->to($user['email'], $user['name'])->subject("A new diary was published! Welcome to nahid.co ");
            });
        }

    }
}
