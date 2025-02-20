<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divingTransactions extends Model
{
    use HasFactory;

    public function eventInfo()
    {
        return $this->belongsTo(Event::class, 'event_id')->with("images");
    }

    public function userInfo()
    {
        return $this->belongsTo(Users::class, "user_id")->with("diveUserInfo", "followingDiver");
    }
}
