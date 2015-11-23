<?php

namespace App\Listeners;

use App\Events\ChangeRoleEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

class SendRoleChangeMailListener
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
     * @param  ChangeRoleEvent  $event
     * @return void
     */
    public function handle(ChangeRoleEvent $event)
    {
       $user = $event->user;

       Mail::send('email.change_role', ['user'=>$user], function ($m) use ($user){
           $m->to($user->email, $user->name)->subject('Changed User Role | nahid.co');
       });

    }
}
