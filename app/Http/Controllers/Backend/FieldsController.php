<?php

namespace App\Http\Controllers\Backend;




use App\Models\City;
use App\Models\Statu;
use App\Models\Region;
use App\Models\Sector;
use App\Models\Country;
use App\Models\Activity;
use App\Models\Juridic_form;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreFieldsRequest;
use App\Http\Requests\Backend\DeleteFieldsRequest;


class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
        $table = DB::table($request->get("table"))->get();
        return view('backend.foreignFields.index' ,["data"=>$table,"table"=>$request->get("table")]);
    }




    private function relativeData(){
        return [
            'juridics'  =>   Juridic_form::all('designation','id'),
            'status'    =>   Statu::all('designation','id'),
            'regions'   =>   Region::all('designation','id'),
            "cities"    =>   City::all('designation','id'),
            'countries' =>   Country::all('designation','id'),
            'sectors'   =>   Sector::all('designation','id'),
            'activity'  =>   Activity::all('designation','id')
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = $request['table'];
        try{
            DB::table($table)->insert(['designation' =>$request['designation']]);
        }
        catch (QueryException $e){
            return redirect()->back()->withFlashDanger('erreur produit ...');
        }

        return redirect()->back()->withFlashSuccess('successfully inserted');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = $table = $request['table'];
        try{
            DB::table($table)->where('id',$id)->update(['designation'=>$request['designation']]);
        }
        catch (Exception $e){
            return redirect()->back()->withFlashDanger('erreur produit ...');
        }

        return redirect()->back()->withFlashSuccess('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        try{
            DB::table($request['table'])->delete($id);

        }
        catch (QueryException $e){

            return redirect()->back()->withFlashDanger('vous ne pouvez pas supprimer champs utilisé  !!!');
        }
        catch (Exception $e){

            return redirect()->back()->withFlashDanger('erreur produit ...');
        }
        return redirect()->back()->withFlashSuccess('successfully deleted');
    }

}
