<?php

namespace App\Http\Controllers\Backend;



use App\Http\Requests\Backend\DeleteFieldsRequest;
use App\Models\City;
use App\Models\Statu;
use App\Models\Region;
use App\Models\Sector;
use App\Models\Country;
use App\Models\Activity;
use App\Models\Juridic_form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreFieldsRequest;


class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        return view('backend.foreignFields.index' , $this->relativeData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function store(StoreFieldsRequest $request)
    {
        try{
            DB::table($request['table'])->insert(['designation' =>$request['designation']]);
        }
        catch (Exception $e){

        }
        return redirect()->back()->withFlashSuccess('successfully inserted');
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
    public function edit($id)
    {
        //
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
        try{
          \DB::table($request['table'])->where('id',$id)->update(['designation'=>$request['designation']]);
        }
        catch (Exception $e){

        }
        return redirect()->back()->withFlashSuccess('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteFieldsRequest $request , $id)
    {
        try{
            \DB::table($request['table'])->delete($id);

        }
        catch (Exception $e){

        }
        return redirect()->back()->withFlashSuccess('successfully deleted');
    }

}
