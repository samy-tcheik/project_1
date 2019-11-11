<?php

namespace App\Observers;

use Auth;
use App\Models\Event\EventType;

class TypeObserver
{
    public function creating(EventType $type){
        $type->created_by = Auth::id();
    }
}
