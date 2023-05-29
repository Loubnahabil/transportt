<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;



class VehiculeController extends Controller
{
    
    public function allVehicules()
    {
        $allVehicules = DB::table('vehicules')->get();
        return view('formvehicules.allvehicules',compact('allVehicules'));
    }
 // add Customer
 public function addVehicule()
 {
     return view('formvehicules.addvehicule');
 }
  // save record
  public function saveVehicule(Request $request)
  {
    


      $request->validate([
          'matricule'   => 'required|string|max:255',
          'marque'     => 'required|string|max:255',
          'type' => 'required|string|max:255',
          'genre' => 'required|string|max:255',
          'proprietaire' => 'required|string|max:255',
          'date_circulation'  => 'required|string|max:255',
          'mc' => 'required|string|max:255',
          'mutation'      => 'required|string|max:255',
          'validite_date'  => 'nullable|string|max:255',
          'modele'    => 'required|string|max:255',
          'carburant' => 'nullable|string|max:255',
          'n_chassis' => 'required|string|max:255',
          'poids' => 'required|string|max:255',
          'ptac'  => 'required|string|max:255',
          'puissance' => 'required|string|max:255',
          'nbre_cylindres'      => 'required|string|max:255',
          'ptmct'  => 'nullable|string|max:255',
          
      ]);

      DB::beginTransaction();
      try {
        

        

         
         
          $vehicule = new Vehicule;
          $vehicule->matricule = $request->matricule;
          $vehicule->marque     = $request->marque ;
          $vehicule->type  = $request->type;
          $vehicule->genre  = $request->genre;
          $vehicule->proprietaire  = $request->proprietaire;
          $vehicule->date_circulation  = $request->date_circulation;
          $vehicule->mc  = $request->mc ;
          $vehicule->mutation       = $request->mutation  ;
          $vehicule->validite_date   = $request->validite_date;
          $vehicule->modele     = $request->modele;
          $vehicule->carburant     = $request->carburant;
          $vehicule->n_chassis = $request->n_chassis;
          $vehicule->poids  = $request->poids;
          $vehicule->ptac  = $request->ptac;
          $vehicule->puissance  = $request->puissance;
          $vehicule->nbre_cylindres = $request->nbre_cylindres;
          $vehicule->ptmct = $request->ptmct;
          $vehicule->save();
          
          
          DB::commit();
          Toastr::success('Create new vehicule successfully :)','Success');
          return redirect()->route('form/allvehicules/page');
          
      } catch(\Exception $e) {
          DB::rollback();
          Toastr::error('Add Vehicule fail :)','Error');
          return redirect()->back();
      }
  }
  public function updateVehicule($id)
  {
      $vehiculeEdit = DB::table('vehicules')->where('id',$id)->first();
      return view('formvehicules.editvehicule',compact('vehiculeEdit'));
  }

  // update record
  public function updateRecord(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'matricule'   => 'required|string|max:255',
        'marque'     => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'proprietaire' => 'required|string|max:255',
        'date_circulation'  => 'required|string|max:255',
        'mc' => 'required|string|max:255',
        'mutation'      => 'required|string|max:255',
        'validite_date'  => 'nullable|string|max:255',
        'modele'    => 'required|string|max:255',
        'carburant' => 'nullable|string|max:255',
        'n_chassis' => 'required|string|max:255',
        'poids' => 'required|string|max:255',
        'ptac'  => 'required|string|max:255',
        'puissance' => 'required|string|max:255',
        'nbre_cylindres'      => 'required|string|max:255',
        'ptmct'  => 'nullable|string|max:255',
        
    ]);
    if ($validator->fails()) {
        Toastr::error('Validation failed', 'Error');
        
        // Clear the input values
        $request->replace($request->except('_token'));

        return redirect()->back()->withErrors($validator);
    }
    DB::beginTransaction();
    try {
        $vehicule = Vehicule::findOrFail($id); // Find the record by the given ID

        // Update the fields with the new values
        $vehicule->matricule  = $request->matricule;
        $vehicule->marque = $request->marque;
        $vehicule->type = $request->type;
        $vehicule->genre = $request->genre;
        $vehicule->proprietaire = $request->proprietaire;
        $vehicule->date_circulation = $request->date_circulation;
        $vehicule->mc = $request->mc;
        $vehicule->mutation = $request->mutation;
        $vehicule->validite_date = $request->validite_date;
        $vehicule->modele = $request->modele;
        $vehicule->carburant = $request->carburant;
        $vehicule->n_chassis = $request->n_chassis;
        $vehicule->poids = $request->poids;
        $vehicule->ptac = $request->ptac;
        $vehicule->puissance = $request->puissance;
        $vehicule->nbre_cylindres = $request->nbre_cylindres;
        $vehicule->ptmct = $request->ptmct;

        $vehicule->save(); // Save the changes

        DB::commit();

        Toastr::success('Updated vehicule successfully', 'Success');
        return redirect()->route('form/allvehicules/page');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Update vehicule failed', 'Error');
        return redirect()->back();
    }
}
// delete record
public function deleteRecord(Request $request)
{
    try {

        Vehicule::destroy($request->id);
        Toastr::success('Vehicule deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('Vehicule delete fail :)','Error');
        return redirect()->back();
    }
}
public function viewVehicule($id)
{
    $vehicule = Vehicule::find($id);
    return view('formvehicules.viewvehicule', compact('vehicule'));
}


}