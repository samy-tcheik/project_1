<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class Event_montants extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class,'event_id', 'id');
    }

    protected $fillable = [
        'designation'
    ];
}
