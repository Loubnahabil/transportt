<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marchandise extends Model
{
    protected $table = 'marchandises';
    protected $fillable = [
        'description',
        'poids_net',
        'poids_brut',
        'longueur',
        'largeur',
        'hauteur',
        'nature',
        'valeur',
        'origine',
        'destination',
    ];

    use HasFactory;
    public function voyages()
    {
        return $this->belongsToMany(Voyage::class, 'voyage_marchandise');
    }

}

