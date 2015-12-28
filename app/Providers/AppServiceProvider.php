<?php

namespace App\Providers;

use Event;
use App\Models\Comments;
use App\Models\Messages;
use App\Models\User;

use Illuminate\Support\ServiceProvider;

use App\Events\CommentSentEvent;
use App\Events\MessageSentEvent;
use App\Events\ChangeRoleEvent;
use App\Events\NewUserEvent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Comments::created(function($comment){
            Event::fire(new CommentSentEvent($comment));
        });

        Messages::created(function($message){
            Event::fire(new MessageSentEvent($message));
        });

        User::updated(function($user){
            Event::fire(new ChangeRoleEvent($user));
        });

        User::created(function($user){
            Event::fire(new NewUserEvent($user));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
