<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;
    protected $table = 'chauffeurs';
    protected $fillable = [
        /*there are 27 here too*/
        'Nom',
        'Prenom',
        'Date_de_naissance',
        'CIN',
        'Télé',
        'Sexe',
        'Adresse',
        'Nombre_enfants',
        'Nombre_déduction',
        'Nationalité',
        'Transport',
        'Ville',
        'Matricule',
        'Date_embauche',
        'Date_départ',
        'Salaire_de_base',
        'Taux_Horaire',
        'Banque',
        'N_Camp_banc',
        'Mode_de_réglement',
        'Prime_présentaion',
        'Prime_de_panier',
        'Prime_de_logement',
        'Retraite',
        'CNSS',
        'Date_affiliation',
        'Situation_familiale',
        'type',
        'image',


    ];
    public function voyages()
    {
        return $this->belongsToMany(Voyage::class, 'voyage_chauffeur');
    }

}
