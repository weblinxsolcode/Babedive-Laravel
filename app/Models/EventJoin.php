<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventJoin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userInfo() {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function eventInfo()
    {
        return $this->belongsTo(Event::class, "event_id");
    }
}
