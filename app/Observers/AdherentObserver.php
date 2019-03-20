<?php

namespace App\Observers;

use Auth;
use App\Models\adherent\Adherent;
use phpDocumentor\Reflection\Types\Null_;

class AdherentObserver
{
    /**
     * Handle the adherent "created" event.
     *
     * @param  \App\Adherent  $adherent
     * @return void
     */
    public function creating(Adherent $adherent){
        $adherent->created_by = Auth::id();
    }

    /**
     * Handle the adherent "updated" event.
     *
     * @param  \App\Adherent  $adherent
     * @return void
     */
    public function updating(Adherent $adherent)
    {

    }

    /**
     * Handle the adherent "deleted" event.
     *
     * @param  \App\Adherent  $adherent
     * @return void
     */
    public function deleted(Adherent $adherent)
    {
        //
    }

    /**
     * Handle the adherent "restored" event.
     *
     * @param  \App\Adherent  $adherent
     * @return void
     */
    public function restored(Adherent $adherent)
    {
        //
    }

    /**
     * Handle the adherent "force deleted" event.
     *
     * @param  \App\Adherent  $adherent
     * @return void
     */
    public function forceDeleted(Adherent $adherent)
    {
        //
    }
}
