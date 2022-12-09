<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezvousReporter extends Model
{
    //use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'rendezvousreporter';
    protected $fillable = [
        'id',
        'idrendezvous',
        'daterdv',
        'heurerdv',
        'lieu'
    ];
}

