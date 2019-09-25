<?php

namespace App\Http\Controllers\Backend;




use App\Http\Controllers\Backend\Uses\CheckArchive;
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
use http\Exception;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Backend\ChangeProspect;




class AdherentController extends Controller
{
    use CheckArchive ;

    public function index($prospect){
        return view('backend.adherent.index')
            ->with('prospect' ,$prospect);

    }

    public function archive(Adherent $adherent){


       return $adherent->archive ?  self::unarchive($adherent):self::MakeArchive($adherent);


    }


    public function change(ChangeProspect $request ,Adherent $adherent){

        $adherent->prospect = 0 ;
        $adherent->dossier = $request->get("numeroDossier");
        $adherent->save();

        return  redirect()->to(route("admin.adherents.index",1))
            ->withFlashSuccess("prospect changé vers adhérent avec success");

    }


    public function trashed($prospect){

            return  view('backend.adherent.archive')
                ->with('adherents' ,Adherent::with('statu','juridic','activity')
                ->where('prospect' , $prospect )
                ->onlyTrashed()
                ->simplePaginate(10));

        }


    public function create($adherent){


            return  view('backend.adherent.create'  ,array_merge($this->relativeData(), ['adherent' => $adherent]));


    }


    public function store(StoreAdherentRequest $request){

        $this->validate($request,['name' =>'required|unique:adherents|max:191']);
        $prospect = '0' ;

        if (!$request->exists('dossier') )
        {
            $request = $request->merge(['prospect' => "1"] );
            $prospect = 1 ;

            }

        Adherent::create($request->all());


        return redirect()->to(route('admin.adherents.index' , $prospect))
            ->withFlashSuccess(  ' adhérent etait ajouté ');

    }


    public function show( $adherent)
    {


        $adherent = Adherent::find($adherent);
            return  view('backend.adherent.show')->with("adherent",$adherent);



    }


    public function edit($adherent)
    {
        $adherent = Adherent::find($adherent);


        return  view('backend.adherent.edit',
            array_merge( $this->relativeData() ,compact('adherent' , $adherent)));




    }


    public function update(StoreAdherentRequest $request,  $adherent)
    {
        $adherent =  Adherent::find($adherent);
        $this->validate($request,['name' =>"required|unique:adherents,name,$adherent->id|max:191"]);
        $request->merge(['regime_annee_civile'=>$request->input('regime_annee_civile') ? 1:0]);
        $adherent->update($request->all()) ;

        return redirect()->to(route('admin.adherents.index', $adherent->prospect))
            ->withFlashSuccess(' adherent successfully updated');
    }


    public function destroy($id)
    {
        try{
            Adherent::find($id)->delete();
            return redirect()->back()->withFlashSuccess('ahderent succefully deleted');
        }

        catch (QueryException $e){
            return redirect()->back()->withFlashDanger('vous ne pouvez pas supprimer champs utilisé  !!!');
        }

        catch (Exception $e){
            return redirect()->back()->withFlashDanger('erreur produit ...');
        }

    }


    public function restore($id)
    {
        $adh = Adherent::withTrashed()->find($id);

           if (! $adh->prospect){
               if  (!in_array($adh->dossier , $this->used())){
                   $adh->restore();
                   return redirect()->to(route('admin.adherent.trashed', 0))
                       ->withFlashSuccess(' adherent successfully restored');
               }else{
                   return redirect()->back()->withFlashWarning('numéro dossier utilisé echec restauration');
               }
           }else{
               $adh->restore();
               return redirect()->to(route('admin.adherent.trashed', 1))
                   ->withFlashSuccess(' prospect restauré avec succes');
           }





    }


    public function ajaxDataTables($prospect){

        $adherents = Adherent::select("adherents.id","name" ,"dossier" ,"archive",'juridic_form_id','statu_id','activity_id','archived_at')
        ->with('juridic',"statu" ,'activity');


        if (!$prospect){

            $adherents = $adherents->where('prospect',0);

            return   DataTables::of($adherents)
                ->rawColumns(['paimentStat','archive','actions'])
                ->editColumn('archive' , function($adh){
                    return $adh->archiveButtons($adh);
                })->addColumn('actions' ,function ($adh ){
                    return $adh->Actions($adh); } )
                ->addColumn('paimentStat',function ($adh){
                    return $adh->payStat($adh);
                })
                ->make(true) ;
            }
         else
            {
                $adherents = $adherents->where("prospect",1);

                return DataTables::of($adherents)->rawColumns(['actions'])
                 ->addColumn('actions' ,function ($adh ){
                     return $adh->ActionsProspect($adh); } )
                 ->make(true) ;
                }



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


    private function used(){
        return  Adherent::select('dossier')->where('prospect',0)
            ->get()
            ->pluck('dossier')->toarray();
    }

}

