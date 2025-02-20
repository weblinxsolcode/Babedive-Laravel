<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiveUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userInfo()
    {
        return $this->belongsTo(Users::class, "user_id");
    }

    public function images() {
        return $this->hasMany(DiveUserImage::class, 'diver_id');
    }

    public function followerCount() {
        return $this->hasMany(DiverFollower::class, 'diver_id')->with('userInfo');
    }

    public function events()
    {
        return $this->hasMany(Event::class, "diver_id");
    }

    public function reviews()
    {
        return $this->hasMany(DiverFeedback::class, "diver_id")->with("user");
    }

    public function toUser()
    {
        return $this->hasMany(UserFeedback::class, "diver_id")->with("userInfo");
    }
}
