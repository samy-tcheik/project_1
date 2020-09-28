<?php
namespace App\Models\adherent;

use App\Models\Event\Participant;
use App\Models\Event\Payeur;

trait AdherentRelationship{
    public function cotiser(){
        return $this->hasMany('App\Models\Cotisation',"adherents_id");
    }

    public function statu(){
        return  $this->belongsTo('App\Models\Statu','statu_id');
    }

    public function juridic(){
        return  $this->belongsTo('App\Models\Juridic_form' , 'juridic_form_id');
    }

    public function activity(){
        return $this->belongsTo('App\Models\Activity','activity_id');
    }

    public  function region(){
        return $this->belongsTo('App\Models\Region', 'region_id');
    }

    public function city(){
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country','country_id');
    }

    public function sector(){
        return  $this->belongsTo('App\Models\Sector','sector_id');
    }

    public function participant(){
        return $this->hasMany(Participant::class,'adherent_id');
    }

    public function payeur(){
        return $this->hasMany(Payeur::class,'adherent_id');
    }

}