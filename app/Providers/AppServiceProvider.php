<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Event;

use App\Models\Comments;
use App\Models\Messages;
use App\Models\User;
use App\Models\Diary;

use App\Events\CommentSentEvent;
use App\Events\MessageSentEvent;
use App\Events\ChangeRoleEvent;
use App\Events\NewUserEvent;
use App\Events\NewDiaryEvent;
use App\Events\MakeCommentsEvent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      // this event fire when new message is created
        Messages::created(function($message){
            Event::fire(new MessageSentEvent($message));
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
