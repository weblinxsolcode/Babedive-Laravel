<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function diveUserInfo()
    {
        return $this->hasOne(DiveUser::class, 'user_id')->with('followerCount', 'images', 'events');
    }

    public function diverUserInfo2()
    {
        return $this->hasOne(DiveUser::class, 'user_id')->with('followerCount', 'images', 'events');
    }

    public function followingDiver()
    {
        return $this->hasMany(DiverFollower::class, 'user_id')->with('diverInfo', 'userInfo');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, "user_id");
    }

    public function getEvents()
    {
        return $this->hasMany(EventJoin::class, "user_id")->with("eventInfo");
    }

    public function followers()
    {
        return $this->hasMany(DiverFollower::class, "user_id")->with("diverInfo");
    }

    public function feedbacks()
    {
        return $this->hasMany(UserFeedback::class, "user_id")->with("diverInfo", "infoDiver");
    }
}
