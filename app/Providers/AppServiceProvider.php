<?php

namespace App\Providers;

use Event;
use App\Models\Comments;
use App\Models\Messages;

use Illuminate\Support\ServiceProvider;

use App\Events\CommentSentEvent;
use App\Events\MessageSentEvent;

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
