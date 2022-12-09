<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_envoye extends Model
{
    //use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'commande_envoye';
    protected $fillable = [
        'id',
        'id_client',
        'id_produit',
        'id_etat',
        'datedemande',
        'email_client',
        'tel',
        'societe',
        'nb_commande',
        'description',
        'etat',
        'designation',
        'photo',
        'puissance',
        'prix',
        'prixdevis',
        'datevalidite'
    ];
}
