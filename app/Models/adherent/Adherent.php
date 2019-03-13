<?php

namespace App\Models\adherent;


use Illuminate\Database\Eloquent\SoftDeletes ;
use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    use SoftDeletes ;
    protected $dates = ['deleted_at'] ;
    protected $fillable   = ['name'   ,
        'dossier'   ,
        'juridic_form_id' ,
        'statu_id'  ,
        'regime_annee_civile'  ,
        'description'  ,
        'tel1'  ,
        'tel2'  ,
        'fax1'  ,
        'fax2' ,
        'mobile',
        'email',
        'site_web',
        'boite_postal' ,
        'adress',
        'region_id',
        'city_id',
        'country_id',
        'code_postal',
        'sector_id'  ,
        'activity_id',
        'code_nae' ,
        'rc'  ,
        'effectif',
        'ca' ,
        'currency_ca',
        'cs' ,
        'currency_cs',
        'type',
        'adhesion_date',
        'created_by']  ;

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
