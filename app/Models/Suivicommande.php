<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivicommande extends Model
{
    //use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'suivicommande';
    protected $fillable = [
        'id',
        'designation',
        'prix',
        'categorie',
        'marque',
        'id_devis',
        'id_etat',
        'datedemande',
        'nb_commande'
    ];
}
