<?php

namespace App\Models;

use App\Models\Event\Event;
use Illuminate\Database\Eloquent\Model;

class Paiment_mode extends Model
{
    public function event()
    {
        return $this->hasMany(Event::class,'paiment_modes_id');
    }
}
