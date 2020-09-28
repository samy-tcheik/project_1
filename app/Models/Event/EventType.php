<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class EventType extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function event(){
        return $this->hasMany(Event::class,'type');
    }

    protected $fillable = [
        'type',
        'prefix',
        'date'
    ];
}
