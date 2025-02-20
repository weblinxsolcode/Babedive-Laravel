<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiverFeedback extends Model
{
    use HasFactory;

    protected $table = 'diver_feedbacks';

    protected $guarded = [];

    public function userInfo() {
        return $this->hasMany(Users::class, 'id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, "user_id")->with("followingDiver", "diveUserInfo");
    }
}
