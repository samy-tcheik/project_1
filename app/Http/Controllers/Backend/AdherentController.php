<?php

namespace App\Http\Controllers\Backend;


use App\Models\City;
use App\Models\Statu;
use App\Models\Region;
use App\Models\Sector;
use App\Models\Country;
use App\Models\Activity;
use App\Models\Juridic_form;
use App\Models\adherent\Adherent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreAdherentRequest;












class AdherentController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        $adherents = Adherent::with('statu','juridic','activity')->Simplepaginate(10);
        return  view('backend.adherent.index')->with('adherents' ,$adherents );
    }

    public function archive(){
        return  view('backend.adherent.archive')->with('adherents' ,Adherent::with('statu','juridic','activity')
            ->onlyTrashed()
            ->Simplepaginate(10) );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return  view('backend.adherent.create'  ,$this->relativeData());
    }

    private function relativeData(){
        return [
            'juridics'  =>   Juridic_form::all()->pluck('designation','id'),
            'status'    =>   Statu::all()->pluck('designation','id'),
            'regions'   =>   Region::all()->pluck('designation', 'id'),
            "cities"    =>   City::all()->pluck('designation','id'),
            'countries' =>   Country::all()->pluck('designation','id'),
            'sectors'   =>   Sector::all()->pluck('designation','id'),
            'activity'  =>   Activity::all()->pluck('designation','id')
        ];


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdherentRequest $request){

        try{
            Adherent::create($request->all());
        }  catch (Exception $e){
        //
        }
        return redirect()->to(route('admin.adherents.index'))
           ->withFlashSuccess('adherent successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Adherent $adherent)
    {
        return  view('backend.adherent.show' , compact('adherent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Adherent $adherent)
    {

        return  view('backend.adherent.edit',
            array_merge( $this->relativeData() ,compact('adherent' , $adherent)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdherentRequest $request, Adherent $adherent)
    {
        try{
            $adherent->update(array_merge($request->all() ,['regime_annee_civile'=>isset($request['regime_annee_civile']) ? 1:0]) ) ;
        }
        catch (Exception $exception){
            //
            }

        return redirect()->to(route('admin.adherents.index'))
            ->withFlashSuccess(' adherent successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Adherent::find($id)->delete();
        return redirect()->back()->withFlashSuccess('ahderent succefully deleted');

    }
    public function restore($id){

        Adherent::withTrashed()->find($id)->restore();
        return redirect()->to(route('admin.adherent.archive'))
            ->withFlashSuccess(' adherent successfully restored');
    }
}
