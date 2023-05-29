<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;


class ChauffeurController extends Controller
{

    public function allChauffeurs()
    {

        $allChauffeurs = DB::table('chauffeurs')->get();
        return view('formchauffeurs.allchauffeurs', compact('allChauffeurs'));
    }
    public function addChauffeur()
    {
        return view('formchauffeurs.addchauffeur');
    }
    public function saveChauffeur(Request $request)
    {
        $request->validate([
            /*5required rest is nullable*/

            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Date_de_naissance' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'Télé' => 'nullable|string|max:255',
            'Sexe' => 'nullable|string|max:255',
            'Adresse' => 'nullable|string|max:255',
            'Nombre_enfants' => 'nullable|string|max:255',
            'Nombre_déduction' => 'nullable|string|max:255',
            'Nationalité' => 'nullable|string|max:255',
            'Transport' => 'nullable|string|max:255',
            'Ville' => 'nullable|string|max:255',
            'Matricule' => 'required|string|max:255',
            'Date_embauche' => 'nullable|string|max:255',
            'Date_départ' => 'nullable|string|max:255',
            'Salaire_de_base' => 'nullable|string|max:255',
            'Taux_Horaire' => 'nullable|string|max:255',
            'Banque' => 'nullable|string|max:255',
            'N_Camp_banc' => 'nullable|string|max:255',
            'Mode_de_réglement' => 'nullable|string|max:255',
            'Prime_présentaion' => 'nullable|string|max:255',
            'Prime_de_panier' => 'nullable|string|max:255',
            'Prime_de_logement' => 'nullable|string|max:255',
            'Retraite' => 'nullable|string|max:255',
            'CNSS' => 'nullable|string|max:255',
            'Date_affiliation' => 'nullable|string|max:255',
            'Situation_familiale' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'


        ]);
        DB::beginTransaction();
        try {

            $chauffeur = new Chauffeur;
            $chauffeur->Nom = $request->input('Nom');
            $chauffeur->Prenom = $request->input('Prenom');
            $chauffeur->Date_de_naissance = $request->input('Date_de_naissance');
            $chauffeur->CIN = $request->input('CIN');
            $chauffeur->Télé = $request->input('Télé');
            $chauffeur->Sexe = $request->input('Sexe');
            $chauffeur->Adresse = $request->input('Adresse');
            $chauffeur->Nombre_enfants = $request->input('Nombre_enfants');
            $chauffeur->Nombre_déduction = $request->input('Nombre_déduction');
            $chauffeur->Nationalité = $request->input('Nationalité');
            $chauffeur->Transport = $request->input('Transport');
            $chauffeur->Ville = $request->input('Ville');
            $chauffeur->Matricule = $request->input('Matricule');
            $chauffeur->Date_embauche = $request->input('Date_embauche');
            $chauffeur->Date_départ = $request->input('Date_départ');
            $chauffeur->Salaire_de_base = $request->input('Salaire_de_base');
            $chauffeur->Taux_Horaire = $request->input('Taux_Horaire');
            $chauffeur->Banque = $request->input('Banque');
            $chauffeur->N_Camp_banc = $request->input('N_Camp_banc');
            $chauffeur->Mode_de_réglement = $request->input('Mode_de_réglement');
            $chauffeur->Prime_présentaion = $request->input('Prime_présentaion');
            $chauffeur->Prime_de_panier = $request->input('Prime_de_panier');
            $chauffeur->Prime_de_logement = $request->input('Prime_de_logement');
            $chauffeur->Retraite = $request->input('Retraite');
            $chauffeur->CNSS = $request->input('CNSS');
            $chauffeur->Date_affiliation = $request->input('Date_affiliation');
            $chauffeur->Situation_familiale = $request->input('Situation_familiale');
            $chauffeur->type = $request->input('type');
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);  // you might need to create a directory "images" under public
        
                $chauffeur->image = $filename;
            }


            $chauffeur->save();

            DB::commit();
            Toastr::success('Création du nouveau chauffeur réussie :)', 'Success');
            return redirect()->route('form/allchauffeurs/page');
        } catch (\Exception $e) {
            DB::rollback();

            Toastr::error(' Echec de l ajout dun chauffeur :)' .$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }
    public function updateChauffeur($id)
    {
        $chauffeurEdit = DB::table('chauffeurs')->where('id', $id)->first();
        return view('formchauffeurs.editchauffeur', compact('chauffeurEdit'));
    }
    
    // update record
    public function updateRecord(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Date_de_naissance' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'Télé' => 'nullable|string|max:255',
            'Sexe' => 'nullable|string|max:255',
            'Adresse' => 'nullable|string|max:255',
            'Nombre_enfants' => 'nullable|string|max:255',
            'Nombre_déduction' => 'nullable|string|max:255',
            'Nationalité' => 'nullable|string|max:255',
            'Transport' => 'nullable|string|max:255',
            'Ville' => 'nullable|string|max:255',
            'Matricule' => 'required|string|max:255',
            'Date_embauche' => 'nullable|string|max:255',
            'Date_départ' => 'nullable|string|max:255',
            'Salaire_de_base' => 'nullable|string|max:255',
            'Taux_Horaire' => 'nullable|string|max:255',
            'Banque' => 'nullable|string|max:255',
            'N_Camp_banc' => 'nullable|string|max:255',
            'Mode_de_réglement' => 'nullable|string|max:255',
            'Prime_présentaion' => 'nullable|string|max:255',
            'Prime_de_panier' => 'nullable|string|max:255',
            'Prime_de_logement' => 'nullable|string|max:255',
            'Retraite' => 'nullable|string|max:255',
            'CNSS' => 'nullable|string|max:255',
            'Date_affiliation' => 'nullable|string|max:255',
            'Situation_familiale' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'



        ]);
        if ($validator->fails()) {
            Toastr::error('Validation failed', 'Error');

            // Clear the input values
            $request->replace($request->except('_token'));

            return redirect()->back()->withErrors($validator);
        }

        DB::beginTransaction();
        try {



            $chauffeur = Chauffeur::findOrFail($id);

            $chauffeur->Nom = $request->input('Nom');
            $chauffeur->Prenom = $request->input('Prenom');
            $chauffeur->Date_de_naissance = $request->input('Date_de_naissance');
            $chauffeur->CIN = $request->input('CIN');
            $chauffeur->Télé = $request->input('Télé');
            $chauffeur->Sexe = $request->input('Sexe');
            $chauffeur->Adresse = $request->input('Adresse');
            $chauffeur->Nombre_enfants = $request->input('Nombre_enfants');
            $chauffeur->Nombre_déduction = $request->input('Nombre_déduction');
            $chauffeur->Nationalité = $request->input('Nationalité');
            $chauffeur->Transport = $request->input('Transport');
            $chauffeur->Ville = $request->input('Ville');
            $chauffeur->Matricule = $request->input('Matricule');
            $chauffeur->Date_embauche = $request->input('Date_embauche');
            $chauffeur->Date_départ = $request->input('Date_départ');
            $chauffeur->Salaire_de_base = $request->input('Salaire_de_base');
            $chauffeur->Taux_Horaire = $request->input('Taux_Horaire');
            $chauffeur->Banque = $request->input('Banque');
            $chauffeur->N_Camp_banc = $request->input('N_Camp_banc');
            $chauffeur->Mode_de_réglement = $request->input('Mode_de_réglement');
            $chauffeur->Prime_présentaion = $request->input('Prime_présentaion');
            $chauffeur->Prime_de_panier = $request->input('Prime_de_panier');
            $chauffeur->Prime_de_logement = $request->input('Prime_de_logement');
            $chauffeur->Retraite = $request->input('Retraite');
            $chauffeur->CNSS = $request->input('CNSS');
            $chauffeur->Date_affiliation = $request->input('Date_affiliation');
            $chauffeur->Situation_familiale = $request->input('Situation_familiale');
            $chauffeur->type = $request->input('type');
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);  // you might need to create a directory "images" under public
        
                $chauffeur->image = $filename;
            }
            $chauffeur->save();





            DB::commit();
            Toastr::success(' Mise à jour du chauffeur effectuée avec succès:)', 'Success');
            return redirect()->route('form/allchauffeurs/page');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la mise à jour du chauffeur :)', 'Error');
            return redirect()->back();
        }
    }

  // delete record

    public function deleteRecord(Request $request)
    {
        try {

            Chauffeur::destroy($request->id);
            Toastr::success('Suppression du chauffeur effectuée avec succès :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('Échec de la suppression du chauffeur :)', 'Error');
            return redirect()->back();
        }
    }

    public function viewChauffeur($id)
{
    $chauffeur = Chauffeur::find($id);
    return view('formchauffeurs.viewchauffeur', compact('chauffeur'));
}
}
