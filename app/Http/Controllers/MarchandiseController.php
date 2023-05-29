<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marchandise;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;

class MarchandiseController extends Controller
{
    public function allMarchandises()
    {
        $allMarchandises = DB::table('marchandises')->get();
        return view('formmarchandises.allmarchandises',compact('allMarchandises'));
    }
    // add Customer
 public function addMarchandise()
 {
     return view('formmarchandises.addmarchandise');
 }
  // save record
  public function saveMarchandise(Request $request)
  {
    


      $request->validate([          
          'description'   => 'nullable|string',
          'poids_net'     => 'required|string|max:255',
          'poids_brut' => 'required|string|max:255',
          'longueur' => 'nullable|string|max:255',
          'largeur' => 'nullable|string|max:255',
          'hauteur'  => 'nullable|string|max:255',
          'nature' => 'required|string|max:255',
          'valeur'      => 'required|string|max:255',
          'origine'  => 'required|string|max:255',
          'destination' => 'required|string|max:255',
          
          
      ]);

      DB::beginTransaction();
      try {
        

        

         
         
          $marchandise = new Marchandise;
          $marchandise->description = $request->description;
          $marchandise->poids_net = $request->poids_net;
          $marchandise->poids_brut = $request->poids_brut;
          $marchandise->longueur = $request->longueur;
          $marchandise->largeur = $request->largeur;
          $marchandise->hauteur = $request->hauteur;
          $marchandise->nature = $request->nature;
          $marchandise->valeur = $request->valeur;
          $marchandise->origine = $request->origine;
          $marchandise->destination = $request->destination;
          $marchandise->save();
          
          
          DB::commit();
          Toastr::success('Create new marchandise successfully :)','Success');
          return redirect()->route('form/allmarchandises/page');
          
      } catch(\Exception $e) {
          DB::rollback();
          Toastr::error('Add Marchandise failed: '.$e->getMessage(), 'Error');
    return redirect()->back();
      }
  }

  public function updateMarchandise($id)
  {
      $marchandiseEdit = DB::table('marchandises')->where('id',$id)->first();
      return view('formmarchandises.editmarchandise',compact('marchandiseEdit'));
  }
// update record
public function updateRecord(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'description'   => 'nullable|string',
        'poids_net'     => 'required|string|max:255',
        'poids_brut' => 'required|string|max:255',
        'longueur' => 'nullable|string|max:255',
        'largeur' => 'nullable|string|max:255',
        'hauteur'  => 'nullable|string|max:255',
        'nature' => 'required|string|max:255',
        'valeur'      => 'required|string|max:255',
        'origine'  => 'required|string|max:255',
        'destination' => 'required|string|max:255',
        
    ]);
    if ($validator->fails()) {
        Toastr::error('Validation failed', 'Error');
        
        // Clear the input values
        $request->replace($request->except('_token'));

        return redirect()->back()->withErrors($validator);
    }
    DB::beginTransaction();
    try {
        $marchandise = Marchandise::findOrFail($id); // Find the record by the given ID

        // Update the fields with the new values
        $marchandise->description = $request->description;
        $marchandise->poids_net = $request->poids_net;
        $marchandise->poids_brut = $request->poids_brut;
        $marchandise->longueur = $request->longueur;
        $marchandise->largeur = $request->largeur;
        $marchandise->hauteur = $request->hauteur;
        $marchandise->nature = $request->nature;
        $marchandise->valeur = $request->valeur;
        $marchandise->origine = $request->origine;
        $marchandise->destination = $request->destination;

        $marchandise->save(); // Save the changes

        DB::commit();

        Toastr::success('Updated marchandise successfully', 'Success');
        return redirect()->route('form/allmarchandises/page');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Update marchandise failed'.$e->getMessage(), 'Error');
        return redirect()->back();
    }
}
// delete record
public function deleteRecord(Request $request)
{
    try {

        Marchandise::destroy($request->id);
        Toastr::success('Marchandise deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('Marchandise delete fail :)','Error');
        return redirect()->back();
    }
}
public function viewMarchandise($id)
{
    $marchandise = Marchandise::find($id);
    return view('formmarchandises.viewmarchandise', compact('marchandise'));
}

}
