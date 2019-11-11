<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event\EventType;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = EventType::all();
        return view('backend.eventType.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.eventType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = $request->validate([
            'type' => ['required', 'unique:event_types,type'],
            'prefix' => ['required', 'min:3', 'unique:event_types,prefix'],
        ]);
        EventType::create($request->all());
        return redirect()->to(route('admin.type.index'))
        ->withFlashSuccess(' Le type d\'eventment a etait ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {
        $type = EventType::find($type);

        return view('backend.eventType.edit',compact('type', $type));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        $validator = $request->validate([
            'type' => ['required', 'unique:event_types,type'],
            'prefix' => ['required', 'min:3', 'unique:event_types,prefix'],
        ]);
        $type = EventType::find($type);
        $type->update($request->all());

        return redirect()->to(route('admin.type.index'))
        ->withFlashSucces('Le Type A bien etait modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type)
    {
        $type = EventType::find($type)->first();
        $type->delete();

        return redirect()->to(route('admin.type.index'))->withFlashSucces('Le Type A Bien Etait Supprimé');
    }
}
