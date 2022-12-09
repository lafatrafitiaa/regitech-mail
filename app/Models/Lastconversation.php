<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lastconversation extends Model
{
    //use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'lastconversation';
    protected $fillable = [
        'client',
        'dg',
        'maxdate',
        'messages',
        'idclientssent',
        'idclientsreceive',
        'id',
        'nom',
        'email',
        'tel',
        'societe',
        'iduserrole'
    ];
}
