<?php

namespace App\Listeners;

use App\Notifications\NewFallowNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewFallowNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $artis = User::whereHas('roles', function ($query) {
            $query->where('id', 3);
        })->get();

        Notification::send($artis, new NewFallowNotification($event->user));
    }
}
