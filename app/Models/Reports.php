<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    public function userInfo()
    {
        return $this->belongsTo(Users::class, "reported_by");
    }

    public function againstInfo()
    {
        return $this->belongsTo(Users::class, "reported_to");
    }
}
