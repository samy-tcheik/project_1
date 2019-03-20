<?php

namespace App\Models\adherent;


use Illuminate\Database\Eloquent\SoftDeletes ;
use Illuminate\Database\Eloquent\Model;


class Adherent extends Model
{
    use AdherentRelationship;
    use SoftDeletes ;

    protected $dates = ['deleted_at'] ;

    protected $guarded   = [
        'id',
        'created_at',
        'updated_at' ,
        'created_by'
    ]  ;


}
