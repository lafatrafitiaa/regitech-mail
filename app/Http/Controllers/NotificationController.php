<?php

namespace App\Http\Controllers;

use App\Mail\MailAnnulerCommande;
use App\Mail\MailValidation;
use App\Models\Commande_envoye;
use App\Models\Devis;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    //
    public function getNotificationSpeficique(Request $request){
        $etat = $request->get('etat');
        $notif['commande'] = Commande_envoye::where('id_etat', $etat)
                                ->get();
        return response()->json($notif['commande']);
    }

    public function getProduitDetail(Request $request){
        $id = $request->get('id');
        $produit['detail'] = Commande_envoye::where('id', $id)
                                ->get();
        return response()->json($produit['detail']);
    }

    public function validateProduit(Request $request){
        $idDevis = $request->idDevis;
        $mailClient = $request->mail;
        $devis = Devis::find($idDevis);
        $devis->id_etat = 2;
        $devis->update();

        $data = Commande_envoye::where('id', $idDevis)
                    ->get();

        $mail = array(
            'subject' => $data[0]['designation'],
            'datecommande' => $data[0]['datedemande'],
            'puissance' => $data[0]['puissance'],
            'prix' => $data[0]['prix'],
            'societe' => $data[0]['societe'],
            'prixdevis' => $data[0]['prixdevis'],
            'datevalidite' => $data[0]['datevalidite']
        );

        Mail::to($mailClient)->send(new MailValidation($mail));

        $devis['modif'] = Devis::where('id', $idDevis)
                            ->where('id_etat', 2)
                            ->get();

        //echo $data[0]['prixdevis'];

        return ["Result"=>"Success"];

        //return response()->json($devis->email_client);

    }

    public function cancelProduit(Request $request){
        $idDevis = $request->idDevis;
        $mailClient = $request->mail;
        $devis = Devis::find($idDevis);
        $devis->id_etat = 3;
        $devis->update();

        $data = Commande_envoye::where('id', $idDevis)
                    ->get();

        $mail = array(
            'subject' => $data[0]['designation'],
            'datecommande' => $data[0]['datedemande'],
            'puissance' => $data[0]['puissance'],
            'prix' => $data[0]['prix'],
            'societe' => $data[0]['societe']
        );

        $devis['modif'] = Devis::where('id', $idDevis)
                            ->where('id_etat', 3)
                            ->get();

        Mail::to($mailClient)->send(new MailAnnulerCommande($mail));

        return ["Result"=>"Success"];

        //return response()->json($devis->email_client);

    }

    public function confirmerDevis(Request $request){
        $idDevis = $request->idDevis;
        $mailClient = $request->mail;

        $devis = Devis::find($idDevis);
        $devis->prixdevis = $request->prixDevis;
        $devis->datevalidite = $request->dateValidite;
        $devis->id_etat = 2;
        $devis->update();

        $data = Commande_envoye::where('id', $idDevis)
                    ->get();

        $mail = array(
            'subject' => $data[0]['designation'],
            'datecommande' => $data[0]['datedemande'],
            'puissance' => $data[0]['puissance'],
            'prix' => $data[0]['prix'],
            'societe' => $data[0]['societe'],
            'prixdevis' => $data[0]['prixdevis'],
            'datevalidite' => $data[0]['datevalidite']
        );

        Mail::to($mailClient)->send(new MailValidation($mail));

        return ["Result"=>"Success"];
    }
}
