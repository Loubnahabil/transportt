<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use DB;
use App\Models\Voyage;
use App\Models\Chauffeur;
use App\Models\Client;
use App\Models\Vehicule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // home page
    public function index()
    {
        $allVehicules = DB::table('vehicules')->count();
        $allVoyages = DB::table('voyages')->count();
        $allChauffeurs = DB::table('chauffeurs')->count();
        $allClients = DB::table('clients')->count();
        $today = now()->startOfDay();
        $expiredVehicules = Vehicule::whereDate('validite_date', '<', $today)->get();
        $arrivedVoyages = Voyage::whereDate('date_arrivee', '<', $today)->get();
    

        return view('dashboard.home', compact('allVehicules', 'expiredVehicules', 'allVoyages', 'allChauffeurs', 'allClients','arrivedVoyages'));

    }

    // profile
    public function profile()
    {
        return view('profile');
    }
}
