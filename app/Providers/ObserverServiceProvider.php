<?php

namespace App\Providers;

use App\Models\adherent\Adherent;
use App\Models\Auth\User;
use App\Observers\AdherentObserver;
use App\Observers\User\UserObserver;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider.
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Adherent::observe(AdherentObserver::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
