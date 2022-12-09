<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Produit;
use App\Models\Produits;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function goAjoutProduit(){
        $choix['categorie'] = Categorie::get();
        $choix['marque'] = Marque::get();
        return view('Crud/Ajout', compact('choix'));
    }

    public function exeAjoutProduit(Request $request){
        $produit = new Produits();
        $produit->designation = $request->designation;
        $produit->idcategorie = $request->categorie;
        $produit->idmarque = $request->marque;
        $produit->prix = $request->prix;
        $produit->puissance = $request->puissance;
        $produit->photo = $request->photo;
        $produit->fiche = $request->fiche;
        $produit->caracteristique = $request->caracteristique;
        $produit->save();

        return redirect('/crudAjout');
    }

    public function deleteProduit(Request $request){
        $id = $request->id;
        $produit = Produits::findOrFail($id);
        $produit->delete();
        return redirect('/listeProduit');
    }

    public function goModifProduit(Request $request){
        $idProduit = $request->idProduit;
        $prod['produit']=Produit::where('id',$idProduit)->get();
        $prod['categorie'] = Categorie::get();
        $prod['marque'] = Marque::get();
        return view('Crud/Modif', compact('prod'));
    }

    public function exeModifProduit(Request $request){
        $id = $request->idProduit;
        $produit = Produits::find($id);
        $produit->designation = $request->designation;
        $produit->idcategorie = $request->categorie;
        $produit->idmarque = $request->marque;
        $produit->prix = $request->prix;
        $produit->puissance = $request->puissance;
        $produit->photo = $request->photo;
        $produit->fiche = $request->fiche;
        $produit->caracteristique = $request->caracteristique;
        $produit->update();
        return redirect('/crudModifProduit-'.$id);
    }

    public function listes(){
        $liste['produit'] = Produit::get();
        return view('Crud/Liste', compact('liste'));
    }

    public function goTest(){
        return view('Crud/Test');
    }

    public function detailProduitCrud(Request $request){
        $idProduit= $request->idProduit;
        $prod['produit']=Produit::where('id',$idProduit)->get();

        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protection']=Categorie::where("config",1)->get();
        $prod['bureautique']=Categorie::where("config",2)->get();
        $prod['inforamtique']=Categorie::where("config",3)->get();
        $prod['grandFormat']=Categorie::where("config",4)->get();
        $prod['modele']=Modele::get();
        $prod['marques']=Marque::get();
        return view('Crud/Detail',compact('prod'));
    }
}
