<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    use HasFactory;

    protected $table = 'user_feedbacks';

    protected $guarded = [];

    public function diverInfo()
    {
        return $this->hasMany(DiveUser::class, 'id', 'diver_id');
    }

    public function userInfo()
    {
        return $this->belongsTo(Users::class, "user_id")->with("diveUserInfo", "followingDiver");
    }

    public function infoDiver()
    {
        return $this->belongsTo(DiveUser::class, 'diver_id');
    }
}
