<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Vehicule;
use App\Models\Voyage;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.master', function ($view) {
            $expiredVehicules = Vehicule::where('validite_date', '<', now())->get();
            $view->with('expiredVehicules', $expiredVehicules);
        });
        View::composer('layouts.master', function ($view) {
            $arrivedVoyages = Voyage::where('date_arrivee', '<', now())->get();
            $view->with('arrivedVoyages', $arrivedVoyages);
        });
    }
}
