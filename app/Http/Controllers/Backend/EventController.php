<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use App\Models\Event\EventType;
use App\Models\Auth\User;

class EventController extends Controller
{
    public function index(){
        return view('backend.event.index');
    }

    public function create(){
        $responsable = User::all()->pluck('first_name', 'id');
        $type = EventType::all()->pluck('type', 'id');
        return view ('backend.event.create', compact('responsable', 'type'));
    }

    public function store(Request $request){
        Event::create($request->all());
        
        return redirect()->to(route('admin.event.index'))
        ->withFlashSuccess('L\'éventment a bien etait ajouté');
    }
}
