<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{

    use HasFactory;
    protected $table = 'vehicules';
    protected $fillable = [
        'matricule',
        'marque',
        'type',
        'genre',
        'proprietaire',
        'depature_date',
        'email',
        'date_circulation',
        'mc',
        'mutation',
        'validite_date',
        'modele',
        'n_chassis',
        'poids',
        'ptac',
        'puissance',
        'nbre_cylindres',
        'ptmct',
        'pdf_file'
    ];
    public function voyages()
{
    return $this->belongsToMany(Voyage::class, 'voyage_vehicule');
}
}
