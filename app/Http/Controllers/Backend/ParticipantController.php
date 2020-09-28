<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\adherent\Adherent;
use App\Models\Event\Event;
use App\Models\Event\Event_montants;
use App\Models\Event\Participant;
use Illuminate\Support\Facades\DB;
use App\Models\Event\Payeur;
use DataTables;
use Illuminate\Support\Facades\Request as IlluminateRequest;
use Validator;

class ParticipantController extends Controller
{
    public function storeParticipant(Request $request){

        $validator = Validator::make($request->all(),[
            'nom_participant' => ['required','unique:participants,nom_participant']
        ]);

        Participant::create($request->all());

        $data = ''.$request->input('nom_participant').' '.$request->input('prenom_participant').'';

        return response()->json($data);
        
    }

    public function delete($id){

        $participant = Participant::find($id);

        $totalParticipant = Participant::where('adherent_id',$participant->adherent_id)
        ->where('event_id',$participant->event_id)->count();

        if ($totalParticipant == 1) {

            $payeur = Payeur::where('adherent_id',$participant->adherent_id)->where('event_id',$participant->event_id);
            $payeur->delete();

        }

        $participant->delete();

    }

    public function edit($id){

        $participant = Participant::find($id);

        $event_montant = Event_montants::where('event_id',$participant->event_id)
        ->pluck('designation','id');

    }

    public function update(Request $request,$id){

        $participant = Participant::find($id);

        $participant->update($request->all());

        return redirect()->to(route('admin.event.index'))
        ->withFlashSuccess('Le participant a bien etait modifié');

    }

    public function presence(Request $request, $id)
    {

        $participe = Participant::find($id);

        $participe->update($request->all());

    }

    public function ajaxDatatable($id){
        //Emargement Datatable
        
        $participant = Participant::all()->whereIn('event_id',$id);

        function isChecked($participant){if($participant->presence == 1){

            return 'checked';

        }}

        return DataTables::of($participant)
        ->addColumn('action',function($participant){

            return '<input type="checkbox" class="participation" data-id="'.$participant->id.'" '.isChecked($participant).' name="presence" id="participation">';
        
        })->make(true);

    }
    // getAdherent and getMontant populate the select2 dropdown in participant create form
    public function getAdherent(Request $request){
        
        $adh = Adherent::where('name','LIKE', '%'.$request->input('term', '').'%')
        ->get(['id','name as text']);

        return ['results'=>$adh];

    }

    public function getMontant($event_id){
        
        $montant = Event_montants::where('event_id',$event_id)
        ->get(['id','designation as text'])->toarray();

        return ['results'=>$montant];

    }

    public function getParticipantForm($id){

        //populate participant edit form

        $participant = Participant::find($id);

        /*$montant = Event_montants::where('event_id',$participant->event_id)
        ->get(['id','designation as text'])->toarray();*/

        $montant = Event_montants::where('id',$participant->montant_id)->get(['id','designation as text']);
        
        $adherent = Adherent::where('id',$participant->adherent_id)->get(['id','name']);
        
        return response()->json(['participant'=>$participant,'montant'=>$montant,'adherent'=>$adherent]);

    }

    //Gestion participant Datatable
    public function gestionParticipant($id){

        $participant = Participant::all()->whereIn('event_id',$id);

        $payeur = Payeur::all();

        return DataTables::of($participant)
        ->addColumn('adherent',function($participant){

            return ''.$participant->adherent->name.'';

        })
        ->addColumn('participant',function($participant){
            
            return ''.$participant->nom_participant.' '.$participant->prenom_participant.'<div class="btn-group btn-group-sm mr-0">
            <button class="btn btn-primary edit_participant" data-event_id="'.$participant->event_id.'" data-id="'.$participant->id.'" data-toggle="modal" data-target="#participantEditModal"><i class="fas fa-cog"></i></button>
            <button class="btn btn-danger delete_participant" data-id="'.$participant->id.'"><i class="fas fa-trash"></i></button>
            </div>';

        })
        ->addColumn('payeur',function($participant)use($payeur){

            $payeurs = $payeur->where('event_id',$participant->event_id)
            ->where('adherent_id',$participant->adherent_id);
            
            foreach ($payeurs as $item) {

                return ''.$item->nom_payeur.' '.$item->prenom_payeur.'<button class="btn btn-primary btn-sm edit_payeur" data-toggle="modal" data-id="'.$item->id.'" data-target="#payeurEditModal"><i class="fas fa-cog"></i></button>';
            
            }
        })
        ->addColumn('montant',function($participant){

            $montants = Event_montants::all()->where('id',$participant->montant_id);

            foreach ($montants as $montant) {

                return ''.$montant->designation.'';

            }

        })
        ->addColumn('presence',function($participant){

            if ($participant->presence) {

                return '<h5><span class="badge badge-success">Présent</span></h5>';
            
            } else {

                return '<h5><span class="badge badge-danger">Absent</span></h5>';
            }

        })->rawColumns(['participant','payeur','presence'])->make(true);

    }

    
}
