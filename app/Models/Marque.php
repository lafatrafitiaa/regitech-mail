<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    // use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'marque';
    protected $fillable = [
        'id',
        'photo',
        'marque',
      
    ];
}
