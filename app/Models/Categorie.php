<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    // use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'v_categoriemodele';
    protected $fillable = [
        'id',
        'categorie',
        'photocategorie',
        'idmodele',
        'modele',
        'config'
       
    ];
}
