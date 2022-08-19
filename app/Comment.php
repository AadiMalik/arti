<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;
    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
