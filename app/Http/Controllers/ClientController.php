<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    
    public function allClients()
    {
        $allClients = DB::table('clients')->get();
        return view('formclients.allclients',compact('allClients'));
    }

    // add Customer
 public function addClient()
 {
     return view('formclients.addclient');
 }
  // save record
  public function saveClient(Request $request)
  {
    


      $request->validate([
        'name_society' => 'required|string|max:255',
        'nom' => 'nullable|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'adresse' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'Pays' => 'required|string|max:255',
        'ville' => 'nullable|string|max:255',
        'code_postal' => 'nullable|string|max:255',
        'date_relation' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
        'tele1' => 'required|string|max:255',
        'tele2' => 'nullable|string|max:255',
          
      ]);

      DB::beginTransaction();
      try {
        

        

         
         
          $client = new Client;
          $client->name_society = $request->name_society;
          $client->nom = $request->nom;
          $client->prenom = $request->prenom;
          $client->adresse = $request->adresse;
          $client->type = $request->type;
          $client->email = $request->email;
          $client->Pays = $request->Pays;
          $client->ville = $request->ville;
          $client->code_postal = $request->code_postal;
          $client->date_relation = $request->date_relation;
          $client->notes = $request->notes;
          $client->tele1 = $request->tele1;
          $client->tele2 = $request->tele2;
          $client->save();
          
          
          DB::commit();
          Toastr::success('Create new client successfully :)','Success');
          return redirect()->route('form/allclients/page');
          
      } catch(\Exception $e) {
          DB::rollback();
          Toastr::error('Add Client fail :)','Error');
          return redirect()->back();
      }
  }

  public function updateClient($id)
  {
      $clientEdit = DB::table('clients')->where('id',$id)->first();
      return view('formclients.editclient',compact('clientEdit'));
  }

  // update record
  public function updateRecord(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name_society' => 'required|string|max:255',
        'nom' => 'nullable|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'adresse' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'Pays' => 'required|string|max:255',
        'ville' => 'nullable|string|max:255',
        'code_postal' => 'nullable|string|max:255',
        'date_relation' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
        'tele1' => 'required|string|max:255',
        'tele2' => 'nullable|string|max:255',
        
    ]);
    if ($validator->fails()) {
        Toastr::error('Validation failed', 'Error');
        
        // Clear the input values
        $request->replace($request->except('_token'));

        return redirect()->back()->withErrors($validator);
    }
    DB::beginTransaction();
    try {
        $client = Client::findOrFail($id); // Find the record by the given ID

        // Update the fields with the new values
        $client->name_society = $request->name_society;
          $client->nom = $request->nom;
          $client->prenom = $request->prenom;
          $client->adresse = $request->adresse;
          $client->type = $request->type;
          $client->email = $request->email;
          $client->Pays = $request->Pays;
          $client->ville = $request->ville;
          $client->code_postal = $request->code_postal;
          $client->date_relation = $request->date_relation;
          $client->notes = $request->notes;
          $client->tele1 = $request->tele1;
          $client->tele2 = $request->tele2;

        $client->save(); // Save the changes

        DB::commit();

        Toastr::success('Updated client successfully', 'Success');
        return redirect()->route('form/allclients/page');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Update client failed', 'Error');
        return redirect()->back();
    }
}

// delete record
public function deleteRecord(Request $request)
{
    try {

        Client::destroy($request->id);
        Toastr::success('Client deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('Client delete fail :)','Error');
        return redirect()->back();
    }
}
public function viewClient($id)
{
    $client = Client::find($id);
    return view('formclients.viewclient', compact('client'));
}

}
