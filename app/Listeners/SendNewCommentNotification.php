<?php

namespace App\Listeners;

use App\Notifications\NewCommentNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SendNewCommentNotification
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

        Notification::send($artis, new NewCommentNotification($event->user));
    }
}
