<?php
namespace App\Models\adherent;


trait AdherentRelationship{

    public function statu(){
        return  $this->belongsTo('App\Models\Statu');
    }

    public function juridic(){
        return  $this->belongsTo('App\Models\Juridic_form' , 'juridic_form_id');
    }

    public function activity(){
        return $this->belongsTo('App\Models\Activity');
    }

    public  function region(){
        return $this->belongsTo('App\Models\Region', 'region_id');
    }

    public function city(){
        return $this->belongsTo('App\Models\City');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function sector(){
        return  $this->belongsTo('App\Models\Sector');
    }

}