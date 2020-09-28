<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\adherent\Adherent;
use App\Models\Event\Participant;
use DataTables;
use PhpParser\Node\Stmt\Foreach_;

class CreanceController extends Controller
{
    public function creance($id){

        return view('backend.event.creance',compact('id'));

    }

    public function creanceDatatable($id){

        $participants = Participant::with('adherent','eventMontant','payeur')->withCount('payeur')->where('event_id',$id)->get();
        
        $adh = array();

        foreach ($participants as $participant){

            $adh[] = $participant->adherent()->get();

            $adherent = array_unique($adh);

        }

        return DataTables::collection($adherent)

        ->addColumn('Adherent', function($adherent){

            foreach ($adherent as $adh) {

                return ''.$adh->name.'';

            }
        })->addColumn('Nombre', function($adherent) use($participants){

            foreach ($adherent as $adh) {

                $nombre = $participants->where('adherent_id',$adh->id)->count();

                return ''.$nombre.'';

            }
            
        })->addColumn('Montant',function($adherent) use($participants){

            foreach ($adherent as $adh) {

                $participant = $participants->where('adherent_id',$adh->id);

            }
            
            $montant = 0;

            foreach ($participant as $particip) {

                $montant+= $particip->eventMontant[0]->designation;

            }

            return ''.$montant.'';

        })->addColumn('Payment',function($adherent)use($participants){

                foreach ($adherent as $adh) {

                    $nombre_payeur = $participants->where('payeur_count',1)
                    ->where('adherent_id',$adh->id)->count();

                    $nombre_participant = $participants->where('adherent_id',$adh->id)->count();

                }
                
                $pourcentage = percentage($nombre_participant,$nombre_payeur);  

            return ''.$pourcentage.'%';
            
        })->make(true);
    }
}
