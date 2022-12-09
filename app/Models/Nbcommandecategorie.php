<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nbcommandecategorie extends Model
{
    //use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'nbcommandecategorie';
    protected $fillable = [
        'quantite',
        'categorie'
    ];
}
