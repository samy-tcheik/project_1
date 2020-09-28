<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Event\Event;
use App\Models\Event\EventType;
use App\Models\Event\Participant;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function responsableChart(){

        $labels = User::all()->pluck('first_name');
        $responsable_id = User::all()->pluck('id');
        foreach ($responsable_id as $id) {
            $event_id = Event::where('user_id',$id)->pluck('id');
            $impaye = Participant::whereIn('event_id',$event_id)->where('payeur_id',null)->count();
            $paye = Participant::whereIn('event_id',$event_id)->whereNotNull('payeur_id')->count();
            $paye_array[] = $paye;
            $impaye_array[] = $impaye;
            
        }
        $returnData = array(
            'labels' => $labels,
            'datasets' => array(
                array(
                    'label' => 'creance payé',
                    'backgroundColor' => 'rgb(50,205,50)',
                    'data' => $paye_array,
                ),
                array(
                    'label' => 'creance impayé',
                    'backgroundColor' => 'rgb(255,0,0)',
                    'data' => $impaye_array,
                )
            )
        );
        
        return response()->json(compact('returnData'));

    }

    public function typeChart(){

        $event_type = EventType::with('event')->withCount('event')->get();
        $labels = $event_type->where('event_count','>',0)->pluck('type');

        $types = $event_type->where('event_count','>',0)->pluck('id');
        foreach ($types as $id) {
            $event_id = Event::where('type',$id)->pluck('id');
            $impaye = Participant::whereIn('event_id',$event_id)->where('payeur_id',null)->count();
            $paye = Participant::whereIn('event_id',$event_id)->whereNotNull('payeur_id')->count();
            $paye_array[] = $paye;
            $impaye_array[] = $impaye;
            
        }

        $returnData = array(
            'labels' => $labels,
            'datasets' => array(
                array(
                    'label' => 'creance payé',
                    'backgroundColor' => 'rgb(50,205,50)',
                    'data' => $paye_array,
                ),
                array(
                    'label' => 'creance impayé',
                    'backgroundColor' => 'rgb(255,0,0)',
                    'data' => $impaye_array,
                )
            )
        );
        
        return response()->json(compact('returnData'));
    }
}
