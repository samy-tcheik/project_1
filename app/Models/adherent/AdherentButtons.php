<?php
/**
 * Created by PhpStorm.
 * User: Morti
 * Date: 12/06/2019
 * Time: 10:40
 */

namespace App\Models\adherent;


trait AdherentButtons
{
public  function archiveButtons( $adh){

  return  $adh->archive ?  '<button data-toggle="modal" data-target="#confirmArchive" data-id="' .$adh->id.
        '"class="btn btn-pill btn-warning">archivé a ' .$adh->archived_at.'</button>'  : '<button data-toggle="modal" data-target="#confirmArchive" data-id="' .$adh->id.
      '"class="btn btn-pill btn-success">non archivé </button>'  ;
}
public function Actions($adh){
return

    "<a href=".route('admin.adherents.show' ,$adh->id)." type='button' class='btn-lg btn-primary icon-eye' data-toggle='tooltip' title='voir'></a> " .
    "<a href=".route('admin.adherents.edit' ,$adh->id) . " type='button' class='btn-lg btn-secondary icon-pencil' data-toggle='tooltip' title='modifier'></a> " .
    "<button class='btn-lg btn-danger icon-close' data-toggle='modal' data-target='#confirmDelete' data-id='".$adh->id."' data-name='".$adh->name."' </button>";

}

    public function ActionsProspect($adh){
        return
            "<a href=".route('admin.adherents.show' ,$adh->id)."  class='btn-lg btn-primary icon-eye' data-toggle='tooltip' title='voir'></a> " .
            "<a href=".route('admin.adherents.edit' ,$adh->id) . " class='btn-lg btn-secondary icon-pencil' data-toggle='tooltip' title='modifier'></a> " .
            "<button  class='btn-lg  icon-action-redo btn-warning' data-id='".$adh->id."' data-toggle='modal' data-target='#makeAdherent' title='Mettre en tant que adhérent'></button>".
            "<button class='btn-lg btn-danger icon-close' data-toggle='modal' data-target='#confirmDelete' data-id='".$adh->id."' data-name='".$adh->name."' </button>";

    }

    public function payStat($adh){

    $cotisation =  $adh->cotiser()->latest()->first();
    $dateDebut = strtotime($cotisation["debut_date"]);
    $expired = strtotime("+ 1 year",$dateDebut);

    return date('Y-m-d') > date("Y/m/d",$expired) ?
            '<span class="font-lg badge badge-danger"> expiré </span>' : '<span class="font-lg badge badge-success"> A jour </span>'  ;



    }



}
