<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CotisationRequest;
use App\Models\adherent\Adherent;
use App\Models\Cotisation;
use App\Models\Montant;
use App\Models\Paiment_mode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;


class CotisationController extends Controller
{

    public function index()
    {
        return view('backend.cotisations.index');
    }



    public function ajaxIndex(){

        $cotisation = Cotisation::with("adhs" ,'tarif')->get();
        return DataTables::of($cotisation)
            ->rawColumns(['actions'])
            ->addColumn('actions',function ($cot){
                return $cot->actions($cot);
            })
           ->make(true);


    }



    public function create()
    {
        return view("backend.cotisations.create",array_merge($this->relativeData()));
    }



    public function store(CotisationRequest $request)
    {
        Cotisation::create( $request->all());
        return redirect()->back()->withFlashSuccess("Cotisation ajoutée.");
    }



    public function show(Cotisation $cotisation)
    {
        return view('backend.cotisations.show',compact("cotisation",$cotisation));
    }



    public function edit(Cotisation $cotisation)
    {
        $adhName = $cotisation->adhs->name;
        return view("backend.cotisations.edit", array_merge( $this->relativeData() ,compact('cotisation' , $cotisation),["name"=>$adhName]));
    }



    public function update(Request $request,Cotisation $cotisation)
    {
        $cotisation->update($request->all());
        return redirect()->back()->withFlashSuccess('cotisation updated');
    }



    public function destroy(Cotisation $cotisation)
    {
        $cotisation->delete();
        return redirect()->back()->withFlashSuccess('cotisation succefully deleted');
    }



    private function relativeData(){
        return [
            'montants'  =>   Montant::all()->pluck('designation','id'),
            'paiment_mode'    =>   Paiment_mode::all()->pluck('designation','id')
        ];
    }



    public  function ajaxAdherent(Request $request){

        $query = $request->get("search") ;

        $adher =  Adherent::with('juridic')
          ->where("prospect",0)
          ->where("name","LIKE","%".$query."%")->get();


      echo json_encode($adher) ;
    }
}
