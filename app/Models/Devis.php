<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    // use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'devis';
    protected $fillable = [
        'email_client',
        'id_produit',
        'description',
        'id_etat',
        'dateDemande',
        'id_client',
        'nb_commande',
        'tel',
        'prixdevis',
        'datevalidite',
        'societe'
    ];
}
