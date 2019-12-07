<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event\EventType;
use App\Models\Auth\User;
use App\Models\Paiment_mode;
use App\Models\Event\Participant;

class Event extends Model
{
    public function type()
    {
        return $this->belongsTo(EventType::class,'type','id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paiment()
    {
        return $this->belongsTo(Paiment_mode::class, 'paiment_modes_id', 'id');
    }

    public function participant()
    {
        return $this->hasMany(Participant::class,'event_id');
    }

    public function montant()
    {
        return $this->hasMany(Event_montants::class,'event_id');
    }
    
    
    
    protected $fillable = [
        'type',
        'user_id',
        'theme',
        'lieu',
        'date_debut',
        'date_fin',
        'depenses',
        'cout',
        'paiment_modes_id',
        'depenses_designation',
        'lien',
        'description',
        'observation'

    ];
}
