<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;
    protected $table = 'voyages';
    protected $fillable = [
        'voyage_name',
        'con',
        'provenance',
        'destination',
        'date_sortie',
        'date_arrivee',
        'j_maroc',
        'kilometrage',
        'j_etranger',
        'scelles',
        'observation',
    ];

    public function vehicules()
{
    return $this->belongsToMany(Vehicule::class, 'voyage_vehicule');
}
public function chauffeurs()
{
    return $this->belongsToMany(Chauffeur::class, 'voyage_chauffeur');
}   
public function clients()
{
    return $this->belongsToMany(Client::class, 'voyage_client');
}   
public function marchandises()
{
    return $this->belongsToMany(Marchandise::class, 'voyage_marchandise');
}  
}
