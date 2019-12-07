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

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('backend.event.index', compact('events'));
    }

    public function create(){
        $responsable = User::pluck('first_name','id');
        $type = EventType::pluck('type','id');
        $paiment = Paiment_mode::pluck('id');
        return view ('backend.event.create', compact('responsable', 'type', 'paiment'));
    }

    public function store(Request $request){
        $validator = $request->validate([
            'theme' => ['required','unique:events,theme'],
        ]);
        Event::create($request->except('designation'));
        Event_montants::create($request->only('designation','id'));
        return redirect()->to(route('admin.event.index'))
        ->withFlashSuccess('L\'éventment a bien etait ajouté');
    }

    public function edit($event){
        $event = Event::find($event);
        $responsable = User::pluck('first_name','id');
        $type = EventType::pluck('type','id');
        return view('backend.event.edit', compact('responsable', 'type', 'event'));
    }

    public function update(Request $request, $event){
        $event = Event::find($event);
        $event->update($request->all());
        return redirect()->to(route('admin.event.index'))
        ->withFlashSucces('L\'éventment a bien etait modifié');
    }

    public function destroy($id){
        $event = Event::find($id);
        $event->delete();
    }

    public function ajaxDatatable() {
        $event = Event::all();

        return DataTables::of($event)
        ->addcolumn('action',function($event){
            $routecreate = route('admin.participant.create',$event->id);
            $routelist = route('admin.participant.list',$event->id);
            $routeedit = route('admin.event.edit', $event->id);
            return '<div class="btn-group" role="group" aria-label="action">
            <a href="#" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fas fa-plus mr-0"></i></a>
            <div class="dropdown-menu">
                <a href="'.$routecreate.'" class="dropdown-item">Ajouter un participant</a>
                <a href="'.$routelist.'" class="dropdown-item">Emargement</a>
                </div>
                <a href="'.$routeedit.'" class="btn btn-primary btn-sm"><i class="fas fa-cog"></i></a>
                <button class="btn btn-danger delete_event" data-id="'.$event->id.'"><i class="fas fa-trash"></i></button>
            </div>';
        })
        ->addcolumn('inscrits',function($event){
            $countParticipant = Participant::all()->whereIn('event_id',$event->id)->count();
            return ''.$countParticipant.'';
        })->addcolumn('responsable',function($event){
            return ''.$event->responsable->first_name.'';
        })->make(true);
    }
}
