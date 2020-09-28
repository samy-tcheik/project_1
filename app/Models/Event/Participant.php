<?php

namespace App\Models\Event;

use App\Models\adherent\Adherent;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event\Event_montants;
use App\Models\Paiment_mode;
use App\Models\Event\Event;

class Participant extends Model
{
    public function eventMontant()
    {
        return $this->hasMany(Event_montants::class,'id','montant_id');
    }

    public function participantPaimentmode() 
    {
        return $this->hasOne(Paiment_mode::class,'paiment_mode_id','id');
    }

    public function participantEvent()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }

    public function adherent()
    {
        return $this->belongsTo(Adherent::class,'adherent_id','id');
    }

    public function payeur()
    {
        return $this->belongsTo(Payeur::class,'payeur_id');
    }


    protected $fillable = [
        'nom_participant',
        'prenom_participant',
        'mobile_participant',
        'fonction',
        'email',
        'montant_id',
        'event_id',
        'adherent_id',
        'paiment',
        'presence'
    ];
}
