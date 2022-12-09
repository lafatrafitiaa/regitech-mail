<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        // 'http://localhost:8000/ajoutMessageAdmin-*-*',
        // 'http://localhost:8000/notif/valider?idDevis=*',
        // 'http://localhost:8000/rdv/actionBtn?idRdv=1&etat=1'
        "mobile/*"
    ];
}
