<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\adherent\Adherent;
use App\Models\Event\Event;
use App\Models\Event\Participant;
use Illuminate\Support\Facades\DB;
use App\Models\Event\Payeur;
use DataTables;
use Illuminate\Support\Facades\Request as IlluminateRequest;

class ParticipantController extends Controller
{
    public function create($id){
        $adherent = Adherent::pluck('name', 'id');
        $event = $id;
        return view('backend.event.participant.create', compact('adherent','event'));
    }

    public function storeParticipant(Request $request){
        Participant::create($request->only('nom_participant','prenom_participant','mobile_participant','fonction','email','adherent_id','event_id'));
        return redirect()->to(route('admin.event.index'))
        ->withFlashSucces('Le participant a bien etait ajouté');
        
    }

    public function storePayeur(Request $request)
    {
        Payeur::create($request->only('prenom_payeur','nom_payeur','mobile_payeur','telephone','observation','adresse','event_id','adherent_id'));
        return redirect()->to(route('admin.event.index'))
        ->withFlashSucces('Le payeur a bien etait ajouté');
    }

    public function list()
    {
        //$participants = Participant::all()->whereIn('event_id',$id);
        return view('backend.event.participant.list');
    }

    public function presence(Request $request, $id)
    {
        $participe = Participant::find($id);
        $participe->update($request->all());
    }

    public function ajaxDatatable($id){
        $participant = Participant::all()->whereIn('event_id',$id);
        function isChecked($participant){if ($participant->presence === 1) {
            return 'checked';
        } else {

        }
        }
        return DataTables::of($participant)
        ->addColumn('action',function($participant){
            $route = route('admin.participant.presence',$participant->presence);
            
            return '<input type="checkbox" class="participation" data-id="'.$participant->id.'" '.isChecked($participant).' name="presence" id="participation">';
        })->make(true);
        
    }
}
