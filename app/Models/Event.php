<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images() {
        return $this->hasMany(EventImage::class, 'event_id');
    }

    public function comments() {
        return $this->hasMany(EventComment::class, 'event_id')->with(['userInfo' => function ($query) {
	        $query->select('id', 'profile', 'name');
	    }]);
    }

    public function joins() {
        return $this->hasMany(EventJoin::class, 'event_id')->with('userInfo');
    }

    public function diverInfo() {
        return $this->belongsTo(DiveUser::class, 'diver_id')->with('followerCount', 'images', 'userInfo');
    }

    public function savedTrips()
    {
        return $this->hasMany(savedTrips::class, 'event_id');
    }
}
