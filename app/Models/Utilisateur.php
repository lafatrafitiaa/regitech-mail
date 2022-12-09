<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    // use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'clients';
    protected $fillable = [
        'id',
        'nom',
        'email',
        'tel',
        'pass',
        'societe',
        'activite',
        'iduserrole'
    ];

    public function messages() {
        return $this->hasMany(Messages::class);
    }

}
