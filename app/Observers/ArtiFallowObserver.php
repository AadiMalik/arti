<?php

namespace App\Observers;

use App\ArtiFallow;
use App\Notifications\NewCommentNotification;
use App\User;
use Illuminate\Support\Facades\Notification;

class ArtiFallowObserver
{
    public function created(ArtiFallow $artiFallow){
        $artis = User::whereHas('roles', function ($query) {
            $query->where('id', 3);
        })->get();

        Notification::send($artis, new NewCommentNotification($artiFallow));
    }
}
