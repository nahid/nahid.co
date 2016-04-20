<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

class SendNewUserMailListener
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
     * @param  NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        $user=$event->user->toArray();

        Mail::queue('email.new_user', compact('user'), function($m) use($user){
            $m->to($user['email'], $user['name'])->subject("Congratulations! Welcome to nahid.co ");
        });
    }
}
