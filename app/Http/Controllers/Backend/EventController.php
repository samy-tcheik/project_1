<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use App\Models\Event\EventType;
use App\Models\Auth\User;
use App\Models\Event\Event_montants;
use App\Models\Event\Participant;
use App\Models\Paiment_mode;
use DataTables;
use Validator;

class EventController extends Controller
{
    public function index(){
        
        $responsable = User::pluck('first_name','id');

        $type = EventType::pluck('type','id');

        view()->composer('backend.includes.modals.events.create_event',function($view)use($responsable,$type){
            
            $view->with('responsable',$responsable)->with('type',$type);

        });

    return view('backend.event.index');

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'theme' => ['required','unique:events,theme'],
        ]);

        $event = Event::create($request->all());

        $array_request = $request->get('designation');

        if ($array_request != null) {

            $array = array_chunk($array_request,1);
            $designation = array();

        foreach($array as $k => $v){

            $designation[$k]['designation'] = $v[0];
            
            }

            $event->montant()->createMany($designation);

        }

        return response()->json([1=>2]);
    }

    public function update(Request $request, $id){

        $event = Event::find($id);

        $event->update($request->all());

        return response()->json("Event Update successful");

    }


    public function destroy($id){
        
        $event = Event::find($id);
        
        $event->delete();

    }

    public function eventDatatable() {

        // this will create the main datatable in Event Index
        
        $event = Event::all();

        $participants = Participant::with('payeur')->withCount('payeur')->get();

        return DataTables::of($event)

        ->addcolumn('action',function($event){

            return '<div class="btn-group" role="group" aria-label="action">

            <a href="#" class="btn btn-success btn-sm" data-toggle="dropdown"><i class="fas fa-plus"></i></a>
            
            <div class="dropdown-menu">
            
                <button class="dropdown-item emargement" data-id="'.$event->id.'" data-toggle="modal" data-target="#emargementModal">Emargement</button>
                <button class="dropdown-item create-participant" data-id="'.$event->id.'" data-toggle="modal" data-target="#participantCreateModal">Ajouter Un Participant</button> 
                <button class="dropdown-item gestionParticipant" data-id="'.$event->id.'">Gérer les participants</button>
                <button class="dropdown-item creance" data-id="'.$event->id.'" data-toggle="modal" data-target="#creanceModal">Créance de évenment</button>
                </div>
                <button class="btn btn-primary btn-sm eventEdit" data-toggle="modal" data-id="'.$event->id.'" data-target="#eventEditModal"><i class="fas fa-cog"></i></button>
                <button class="btn btn-danger delete_event" data-id="'.$event->id.'"><i class="fas fa-trash"></i></button>
            
            </div>';

        })

        ->addColumn('mobile',function(){
            
        })
        ->addcolumn('inscrits',function($event) use($participants){

            foreach ($participants as $participant) {

                $totalParticipant = $participant->where('event_id',$event->id)->count();

                if ($totalParticipant !=0) {

                    return ''.$totalParticipant.'';

                }

            }
            
        })->addcolumn('responsable',function($event){

            return ''.$event->responsable->first_name.'';

        })->addColumn('presence',function($event)use($participants){

            if (!$participants->isEmpty()) 
                {

                foreach ($participants as $participant) {

                    $totalParticipant = $participant->where('event_id',$event->id)->count();
                    
                    $participant = $participant->where('event_id',$event->id)->where('presence',true)->count();
                    
                }
                    
                    $pourcentage = percentage($totalParticipant,$participant);
                        
                    if($pourcentage <= 30){
                            
                        return '<div class="progress" style="height: 30px;"><div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="'.$pourcentage.'" aria-valuemin="0" aria-valuemax="100">'.$pourcentage.'%</div></div>';
                        
                    }else {

                        return '<div class="progress" style="height:30px;"><div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: '.$pourcentage.'%;" aria-valuenow="'.$pourcentage.'" aria-valuemin="0" aria-valuemax="100">'.$pourcentage.'%</div></div>';
                        
                        }
                
                    }else {
                    
                        return '<div class="progress" style="height: 30px;"><div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div></div>';
                
                    }
            
            })->addColumn('payment',function($event)use($participants){
                
                $total = $participants->where('event_id',$event->id)->count();
                
                $paye = $participants->where('payeur_count',1)->where('event_id',$event->id)->count();
                
                if ($event->paiment_modes_id == 1) {
                    
                    return '<h5><span class="badge badge-primary">Non Payant</span></h5>';
                
                }else {
                    
                    $pourcentage = percentage($total,$paye);
                    
                    if($pourcentage <= 30){
                        
                        return '<div class="progress" style="height: 30px;"><div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="'.$pourcentage.'" aria-valuemin="0" aria-valuemax="100">'.$pourcentage.'%</div></div>';
                    
                    }else {
                        
                        return '<div class="progress" style="height:30px;"><div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: '.$pourcentage.'%;" aria-valuenow="'.$pourcentage.'" aria-valuemin="0" aria-valuemax="100">'.$pourcentage.'%</div></div>';
                    
                    }
                
                }
                
                
                
        })->rawColumns(['presence','action','payment'])->make(true);

    }

    public function getType()
    {
        
        $type = EventType::get(['id','type as text'])->toarray();
        
        return ['results'=>$type];

    }

    public function getMontant()
    {

        $montant = Event_montants::get(['id','designation as text'])->toarray();

        return ['results'=>$montant];

    }

    public function getResponsable()
    {

        $responsable = User::get(['id','first_name as text'])->toarray();

        return ['results'=>$responsable];

    }

    public function getEventForm($id)
    {

        $data = Event::find($id);

        $responsable = User::where('id',$data->responsable->id)->get(['id','first_name']);

        $type = EventType::where('id',$data->type)->get(['id','type as text']);

        $montant = Event_montants::where('event_id',$id)->get(['id','designation']);

        return response()->json(['data'=>$data,'type'=>$type,'responsable'=>$responsable,'montant'=>$montant]);

    }
}
