<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [
        'type',
        'responsable',

    ];
}
