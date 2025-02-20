<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiverFollower extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userInfo() {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function diverInfo() {
        return $this->belongsTo(DiveUser::class, 'diver_id');
    }
}
