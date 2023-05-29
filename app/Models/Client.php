<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'name_society',
        'nom',
        'prenom',
        'adresse',
        'type',
        'email',
        'Pays',
        'ville',
        'code_postal',
        'date_relation',
        'notes',
        'tele1',
        'tele2',
    ];
    public function voyages()
    {
        return $this->belongsToMany(Voyage::class, 'voyage_client');
    }


}
