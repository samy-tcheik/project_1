<?php

namespace App\Http\Controllers\Backend;

use App\Charts\AdherentsChart;
use App\Http\Controllers\Controller;
use App\Models\adherent\Adherent;


/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
   private function BarChart(){
       $prospect = Adherent::all()->where("prospect",1)->count();
       $actifAdh = Adherent::all()->where("archive",0)->where("prospect",0)->count();
       $ArchiveAdh = Adherent::all()->where("archive",1)->where("prospect",0)->count();

       $chart = new AdherentsChart;
       $chart->title("Nombre Adhérents selon l'activité ")->labels(["Adhérents"]);
       $chart->dataset("Adhérents Actifs",'bar',[$actifAdh])->backgroundcolor("RGBA(46,204,113,0.6)");
       $chart->dataset("Adherents Archivés",'bar',[$ArchiveAdh])->backgroundcolor("RGBA(241,196,15,0.5)");
       $chart->dataset("Les prospect",'bar',[$prospect])->backgroundColor("RGBA(52,152,219,0.53)");
       $chart->height = 700;
       return $chart;
   }

    private function LineChart(){

    }


    public function index()
    {

        $bar = $this->BarChart();
        $line = $this->LineChart();

        return view('backend.dashboard',compact(['bar',"line"]));
    }
}
