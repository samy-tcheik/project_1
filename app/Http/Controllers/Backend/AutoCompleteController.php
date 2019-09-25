<?php

namespace App\Http\Controllers\Backend;

use App\Models\adherent\Adherent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoCompleteController extends Controller
{
    public function used(){
      return  Adherent::select('dossier')
          ->where('archive',0)
          ->where('prospect',0)
          ->get()
          ->pluck('dossier');
    }



    public function verifierDossier(Request $request){
        if ($request->get('id')){

            $adherents = Adherent::select("dossier")
                ->where("id","<>",$request->get('id'))
                ->where('archived_at' , NULL)->pluck('dossier');

            echo $adherents->contains($request->get('dossier')) ? "false" : "true";

        }else {

            $query = $request->get("dossier");
            echo in_array($query, $this->used()->toarray()) ? "false" : "true";

        }

    }



    public function fetch(Request $request){

        $used = $this->used();

        $archived = Adherent::select('dossier')
            ->where('archive',1)
            ->distinct()
            ->get();

        $avaliable = $archived
            ->whereNotIn('dossier',$used)
            ->pluck('dossier');


        echo($avaliable->tojson());
    }
}
