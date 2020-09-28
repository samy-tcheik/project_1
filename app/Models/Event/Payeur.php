<?php

namespace App\Models\Event;

use App\Models\adherent\Adherent;
use Illuminate\Database\Eloquent\Model;

class Payeur extends Model
{
    public function adherent()
    {
        return $this->belongsTo(Adherent::class,'adherent_id');
    }

    protected $guarded = [
        'id',
    ];  
    
}
