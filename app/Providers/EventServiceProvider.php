<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\CommentSentEvent' => [
            'App\Listeners\SendCommentMailListener',
        ],
        'App\Events\MessageSentEvent' => [
                'App\Listeners\SendMessageMailListener'

        ],
        'App\Events\ChangeRoleEvent' => [
                'App\Listeners\SendRoleChangeMailListener'

        ],
        'App\Events\NewUserEvent' => [
                'App\Listeners\SendNewUserMailListener'

        ],
        'App\Events\NewDiaryEvent' => [
                'App\Listeners\SendMailAllUsersListener'

        ],
        'App\Events\MakeCommentsEvent' => [
                'App\Listeners\SendMailAllCommentersListener'

        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
