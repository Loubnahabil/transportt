<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use App\Models\Client;
use App\Models\Marchandise;
use Illuminate\Support\Facades\Log;


class VoyageController extends Controller
{
    public function allVoyages()
{
    $allVoyages = Voyage::with('vehicules', 'chauffeurs','clients','marchandises')->get(); // Eager load the 'vehicules' relation
    return view('formvoyages.allvoyages', compact('allVoyages'));
}

 public function addVoyage()
 {
    // Fetch all vehicules
    // Fetch all vehicules that are not linked with any voyage
    $vehicules = Vehicule::doesntHave('voyages')->get();

    // Fetch all chauffeurs that are not linked with any voyage
    $chauffeurs = Chauffeur::doesntHave('voyages')->get();

    // Fetch all clients that are not linked with any voyage
    $clients = Client::doesntHave('voyages')->get();

    // Fetch all marchandises that are not linked with any voyage
    $marchandises = Marchandise::doesntHave('voyages')->get();
     // Pass the vehicules to your view
    return view('formvoyages.addvoyage', compact('vehicules', 'chauffeurs','clients','marchandises'));
 }
  // save record
  public function saveVoyage(Request $request)
  {
      $request->validate([
          'voyage_name'   => 'required|string|max:255',
          'vehicules'     => 'required|array|min:1',  // new validation rule for vehicules
          'chauffeurs'    => 'required|array|min:1', // new validation rule for chauffeurs
          'clients'    => 'required|array|min:1',
          'marchandises'    => 'required|array|min:1',
          'con' => 'required|string|max:255',
    'provenance' => 'nullable|string|max:255',
    'destination' => 'nullable|string|max:255',
    'date_sortie' => 'nullable|string|max:255',
    'date_arrivee' => 'nullable|string|max:255',
    'j_maroc' => 'nullable|string|max:255',
    'kilometrage' => 'nullable|string|max:255',
    'j_etranger' => 'nullable|string|max:255',
    'scelles' => 'nullable|string|max:255',
    'observation' => 'nullable|string|max:255',


      ]);
      DB::beginTransaction();
      try {
        
          $voyage = new Voyage;
          $voyage->voyage_name = $request->voyage_name;
          $voyage->con = $request->con;
$voyage->provenance = $request->provenance;
$voyage->destination = $request->destination;
$voyage->date_sortie = $request->date_sortie;
$voyage->date_arrivee = $request->date_arrivee;
$voyage->j_maroc = $request->j_maroc;
$voyage->kilometrage = $request->kilometrage;
$voyage->j_etranger = $request->j_etranger;
$voyage->scelles = $request->scelles;
$voyage->observation = $request->observation;

          $voyage->save();
          // Sync vehicules
        $voyage->vehicules()->sync($request->vehicules);
        $voyage->chauffeurs()->sync($request->chauffeurs); // Sync chauffeurs
        $voyage->clients()->sync($request->clients);
        $voyage->marchandises()->sync($request->marchandises);

         
          DB::commit();
          Toastr::success('Create new voyage successfully :)','Success');
          return redirect()->route('form/allvoyages/page');
          
      } catch(\Exception $e) {
          DB::rollback();
          Log::error($e);
          Toastr::error('Add Voyage fail :)','Error');
          return redirect()->back();
      }
  }
  public function updateVoyage($id)
  {
    {
        $voyageEdit = Voyage::with('vehicules','chauffeurs','clients')->where('id',$id)->first(); // Using Eloquent with eager loading of vehicules
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::all(); // Fetch all chauffeurs
        $clients = Client::all();
        $marchandises = Marchandise::all();

        $selectedVehicules = $voyageEdit->vehicules->pluck('id')->toArray(); // This will give you an array of ids of vehicules associated with the voyage.
        $selectedChauffeurs = $voyageEdit->chauffeurs->pluck('id')->toArray(); // This will give you an array of ids of chauffeurs associated with the voyage.
        $selectedClients = $voyageEdit->clients->pluck('id')->toArray(); 
        $selectedMarchandises = $voyageEdit->marchandises->pluck('id')->toArray(); 
        return view('formvoyages.editvoyage', compact('voyageEdit', 'vehicules', 'selectedVehicules','chauffeurs','selectedChauffeurs','clients','selectedClients','marchandises','selectedMarchandises'));
    }
  }

  // update record
  public function updateRecord(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'voyage_name'   => 'required|string|max:255',
        'vehicules'     => 'required|array|min:1', // new validation rule for vehicules
        'chauffeurs'    => 'required|array|min:1', // new validation rule for chauffeurs
        'clients'    => 'required|array|min:1',
        'marchandises'    => 'required|array|min:1',
        'con' => 'required|string|max:255',
    'provenance' => 'nullable|string|max:255',
    'destination' => 'nullable|string|max:255',
    'date_sortie' => 'nullable|string|max:255',
    'date_arrivee' => 'nullable|string|max:255',
    'j_maroc' => 'nullable|string|max:255',
    'kilometrage' => 'nullable|string|max:255',
    'j_etranger' => 'nullable|string|max:255',
    'scelles' => 'nullable|string|max:255',
    'observation' => 'nullable|string|max:255',

    
    ]);
    if ($validator->fails()) {
        Toastr::error('Validation failed', 'Error');
        
        // Clear the input values
        $request->replace($request->except('_token'));

        return redirect()->back()->withErrors($validator);
    }
    DB::beginTransaction();
    try {
        $voyage = Voyage::findOrFail($id); // Find the record by the given ID
       
        // Update the fields with the new values
        $voyage->voyage_name = $request->voyage_name;
        $voyage->con = $request->con;
$voyage->provenance = $request->provenance;
$voyage->destination = $request->destination;
$voyage->date_sortie = $request->date_sortie;
$voyage->date_arrivee = $request->date_arrivee;
$voyage->j_maroc = $request->j_maroc;
$voyage->kilometrage = $request->kilometrage;
$voyage->j_etranger = $request->j_etranger;
$voyage->scelles = $request->scelles;
$voyage->observation = $request->observation;
        $voyage->save(); // Save the changes
        // Sync vehicules
        $voyage->vehicules()->sync($request->vehicules);
        $voyage->chauffeurs()->sync($request->chauffeurs); // Sync chauffeurs
        $voyage->clients()->sync($request->clients);
        $voyage->marchandises()->sync($request->marchandises);

        DB::commit();

        Toastr::success('Updated voyage successfully', 'Success');
        return redirect()->route('form/allvoyages/page');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Update voyage failed', 'Error');
        return redirect()->back();
    }
}
// delete record
public function deleteRecord(Request $request)
{
    try {

        Voyage::destroy($request->id);
        Toastr::success('Voyage deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('Voyage delete fail :)','Error');
        return redirect()->back();
    }
}
public function viewVoyage($id)
{
    $voyage = Voyage::find($id);
    return view('formvoyages.viewvoyage', compact('voyage'));
}



}
