<?php

namespace App\Models\Event;

use App\Models\adherent\Adherent;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event\Event_montants;
use App\Models\Paiment_mode;
use App\Models\Event\Event;

class Participant extends Model
{
    public function eventMontant () {
        return $this->hasMany(Event_montants::class,'montant_id','id');
    }
    public function participantPaimentmode () 
    {
        return $this->hasOne(Paiment_mode::class,'paiment_mode_id','id');
    }
    public function participantEvent()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }
    public function participantAdherent()
    {
        return $this->belongsTo(Adherent::class,'adherent_id','id');
    }


    protected $fillable = [
        'nom_participant',
        'prenom_participant',
        'mobile_participant',
        'fonction',
        'email',
        'event_id',
        'adherent_id',
        'paiment',
        'presence'
    ];
}
