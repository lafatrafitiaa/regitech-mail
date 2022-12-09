<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlController extends Controller
{
    //
    public function getDetailClient(Request $request){
        $idClient = $request->idclient;

        $client['detail'] = Utilisateur::where('id', $idClient)
                                ->get();
                                
        return view('Rendezvous', compact('client'));
    }
}
