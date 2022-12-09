<?php

namespace App\Http\Controllers;

use App\Models\Nbcommandecategorie;
use App\Models\Produits;
use App\Models\Suivicommande;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    //
    public function prixProduit(Request $request){
        $soffset = $request->get('offset');
        $offset = 0;
        if(!empty($soffset)) $offset = intval($soffset);
        $produits['liste'] = Produits::where('prix', '>', 0)
                                ->orderBy('prix', 'desc')
                                ->limit(5)
                                ->offset($offset)
                                ->get();
        return response()->json($produits['liste']);
    }

    public function commandeProduit(Request $request){
        $soffet = $request ->get('offset');
        $offset = 0;
        if(!empty($soffset)) $offset = intval($soffset);
        // $produits['stat'] = Suivicommande::where('id_etat','>', '0')
        //                         ->groupBy('categorie')
        //                         ->get();
        $produits['stat'] = Nbcommandecategorie::get();
        return response()->json($produits['stat']);
    }
}
