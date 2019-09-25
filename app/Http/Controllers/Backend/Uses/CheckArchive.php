<?php
/**
 * Created by PhpStorm.
 * User: lothbrock
 * Date: 23/03/19
 * Time: 05:54 م
 */

namespace App\Http\Controllers\Backend\Uses;


use App\Models\adherent\Adherent;

trait CheckArchive
{
    private function dossierCheck(Adherent $adherent){

    $archived = Adherent::where('archive',0)
        ->get()
        ->pluck('dossier')->toarray();

    return in_array($adherent->dossier, $archived);
}


    private  function MakeArchive(Adherent $adherent)
    {

    try {

     $adherent->update(['archive'=>1,'archived_at'=>date('Y-m-d' ,time())]);
     return redirect()->back()->withFlashSuccess('adherent successfully archived');

    }
    catch (\Exception $e){
     //
    }
    }


    private  function unarchive(Adherent $adherent)
    {
    try {

     if( $this->dossierCheck($adherent)) {

    return redirect()->back()
         ->withFlashWarning('Vous ne pouvez pas éffectuer cette action le numéro de dossier est déja utilisé..changer le !! ');
    }
     else{
         $adherent->update(['archive' => 0]);
        return redirect()->back()->withFlashSuccess('adherent successfully unarchived');

     }

    }
    catch (\Exception $e){
         //
    }
    }


}
