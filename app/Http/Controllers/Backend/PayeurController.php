<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event\Participant;
use App\Models\Event\Payeur;
use Illuminate\Support\Facades\DB;

class PayeurController extends Controller
{
    public function storePayeur(Request $request)
    {
        
        Payeur::create($request->all());
        $payeur = DB::table('payeurs')->latest('updated_at')->first();
        $participants = Participant::where('adherent_id',$request->input('adherent_id'))->where('event_id',$request->input('event_id'))->get();
        foreach ($participants as $participant) {
            $participant->payeur_id = $payeur->id;
            $participant->update();
        };
        $data = ''.$payeur->nom_payeur.''.$payeur->prenom_payeur.'';


        return response()->json($data);
    }

    public function editPayeur($id){
        
        $payeur = Payeur::find($id);

        return response()->json(['payeur'=>$payeur]);

    }

    public function updatePayeur(Request $request,$id){

        $payeur = Payeur::find($id);
        $payeur->update($request->all());

        return redirect()->to(route('admin.event.index'));

    }

    public function getPayeurForm($id)
    {
        $data = Payeur::find($id);

        return response()->json(['data'=>$data]);
    }
}
