<?php

namespace App\Providers;

use App\Events\NewComment;
use App\Events\NewFallow;
use App\Events\NewLike;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendNewUserNotification;
use App\Listeners\SendNewCommentNotification;
use App\Listeners\SendNewFallowNotification;
use App\Listeners\SendNewLikeNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendNewUserNotification::class,
        ],
        NewComment::class => [
            SendNewCommentNotification::class,

        ],
        NewLike::class => [
            SendNewLikeNotification::class,

        ],
        NewFallow::class => [
            SendNewFallowNotification::class,

        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
