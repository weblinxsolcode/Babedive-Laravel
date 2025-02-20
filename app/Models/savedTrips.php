<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class savedTrips extends Model
{
    use HasFactory;

    public function eventInfo()
    {
        return $this->belongsTo(Event::class, "event_id");
    }
    
}
