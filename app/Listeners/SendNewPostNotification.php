<?php

namespace App\Listeners;

use App\Notifications\NewPostNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewPostNotification
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
        $user = User::whereHas('roles', function ($query) {
            $query->where('id', 2);
        })->get();

        Notification::send($user, new NewPostNotification($event->user));
    }
}
