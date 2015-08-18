<?php

namespace App\Providers;

use Event;
use App\Models\Comments;

use Illuminate\Support\ServiceProvider;

use App\Events\CommentSentEvent;

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
