<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    #RELATIONSHIPS

    public function adhs(){
        return $this->belongsTo('App\Models\adherent\Adherent',"adherents_id");
    }

    public function tarif(){
        return $this->belongsTo("App\Models\Montant","montants_id");
    }

    public function modePay(){
        return $this->belongsTo("App\Models\Paiment_mode","paiment_mode_id");
    }

    #BUTTONS

    public function actions($cot){
        return
        '<a  href=' .route("admin.cotisation.show",$cot->id) .' class="btn btn-primary"><span class="icon-eye"></span></a>'.
            '<a href=' .route("admin.cotisation.edit",$cot->id) . ' class="btn btn-secondary"><span class="icon-pencil"></span></a>'.
            '<button data-toggle="modal" data-target="#confirmDelete" data-id="'. $cot->id .'" class="btn btn-danger"><span class="icon-trash"></span></button>';
    }

    protected $guarded =['id' , 'updated_at','created_at'];
}
