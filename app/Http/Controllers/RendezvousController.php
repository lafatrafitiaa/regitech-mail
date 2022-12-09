<?php

namespace App\Http\Controllers;

use App\Mail\RendezvousAnnuler;
use App\Mail\RendezvousReport;
use App\Mail\RendezvousReporter;
use App\Mail\RendezvousValider;
use App\Models\Rendezvous;
use App\Models\RendezvousReporter as ModelsRendezvousReporter;
use App\Models\Samerdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RendezvousController extends Controller
{
    //
    public function formulaireRendezvous(){
        return view('Rendezvous');
    }

    public function ajoutRdv(Request $request){
        $rdv = new Rendezvous();

        $doublerdv = Rendezvous::where('daterdv', $request->date)
                        ->where('heurerdv', $request->heure)
                        ->where('etat', 1)
                        ->get();

        if(count($doublerdv)>0){
            $rdv->etat = 2;
        }

        $rdv->daterdv = $request->date;
        $rdv->heurerdv = $request->heure;
        $rdv->lieu = $request->lieu;
        $rdv->mailclient = $request->mail;
        $rdv->motif = $request->motif;
        $rdv->societe = $request->societe;
        $rdv->tel = $request->tel;
        $rdv->save();

        return redirect('formulaireRendezvous');
    }

    public function getNotifRdv(Request $request){
        $etatRdv = $request->get('etat');
        $rdv['nonvalide'] = Rendezvous::where('etat', $etatRdv)
                                ->get();
        return response()->json($rdv['nonvalide']);
    }

    public function getAllRdv(){
        $rdv['allrdv'] = Rendezvous::get();
        return response()->json($rdv['allrdv']);
    }

    public function rendezvousDetail(Request $request){
        $idRdv = $request->get('idRdv');
        $rdv['detail'] = Rendezvous::where('id', $idRdv)
                            ->get();
        return response()->json($rdv['detail']);
    }

    public function rendezvousParDate(Request $request){
        $dateRdv = $request->get('daterdv');
        $rdv['pardate'] = Rendezvous::where('daterdv', $dateRdv)
                            ->get();
        return response()->json($rdv['pardate']);
    }

    public function action(Request $request){
        $idRdv = $request->idRdv;
        $etat = $request->etat;
        $mail = $request->mail;

        $rendezvous = Rendezvous::find($idRdv);
        $daterdv = $rendezvous->daterdv;
        $heurerdv = $rendezvous->heurerdv;
        $double = Rendezvous::where('daterdv', $daterdv)
                    ->where('heurerdv', $heurerdv)
                    ->where('etat', 0)
                    ->get();

        $mail = array(
            'mailclient' => $rendezvous['mailclient'],
            'societe' => $rendezvous['societe'],
            'lieu' => $rendezvous['lieu'],
            'daterdv' => $rendezvous['daterdv'],
            'heurerdv' => $rendezvous['heurerdv']
        );

        if(count($double) > 1){

            for ($i=1; $i <count($double) ; $i++) {
                # code...
                $autrerdv = Rendezvous::find($double[$i]->id);
                if($etat == 1) $autrerdv->etat = 2;
                $autrerdv->update();
            }
            $rendezvous->etat = $etat;
            $rendezvous->update();
        }

        else {
            $rendezvous->etat = $etat;
            $rendezvous->update();

            if($etat == 1){
                $rendezvous['action'] = Rendezvous::where('id', $idRdv)
                                        ->where('etat', 1)
                                        ->get();
                if(! $rendezvous['action']) return ["Result"=>"Failed"];
                else{
                    Mail::to($rendezvous['mailclient'])->send(new RendezvousValider($mail));
                    return ["Result"=>"Validate success"];
                }
            }

            if($etat == 2){
                $rendezvous['action'] = Rendezvous::where('id', $idRdv)
                ->where('etat', 2)
                ->get();

                if(! $rendezvous['action']) return ["Result"=>"Failed"];
                else{
                    Mail::to($rendezvous['mailclient'])->send(new RendezvousAnnuler($mail));
                    return ["Result"=>"Cancel success"];
                }

            }
        }

    }

    public function getdoublerdv(){
        $rendezvous['samerdv'] = Samerdv::where('duplication', '>', 1)
                                    ->get();
        $rendezvous['double'] = array();
        foreach ($rendezvous['samerdv'] as $i => $rdv) {
            # code...
            $doublerdv = Rendezvous::where('daterdv', $rdv->daterdv)
                                    ->where('heurerdv', $rdv->heurerdv)
                                    ->get();
            array_push($rendezvous['double'], $doublerdv);
        }
        return response()->json($rendezvous['double']);
    }

    public function reportRdv(Request $request){
        $id = $request->id;
        $daterdv = $request->daterdv;
        $heurerdv = $request->heurerdv;
        $lieu = $request->lieu;

        $rendezvous = Rendezvous::find($id);

        $rdvreport = new ModelsRendezvousReporter();
        $rdvreport->idrendezvous = $id;
        $rdvreport->daterdv = $rendezvous['daterdv'];
        $rdvreport->heurerdv = $rendezvous['heurerdv'];
        $rdvreport->lieu = $rendezvous['lieu'];
        $rdvreport->save();

        $rendezvous->daterdv = $daterdv;
        $rendezvous->heurerdv = $heurerdv;
        $rendezvous->lieu = $lieu;
        $rendezvous->etat = 1;
        $rendezvous->update();

        $mail = array(
            'mailclient' => $rendezvous['mailclient'],
            'societe' => $rendezvous['societe'],
            'lieu' => $rendezvous['lieu'],
            'daterdv' => $rendezvous['daterdv'],
            'heurerdv' => $rendezvous['heurerdv'],
            'lieunouveau' => $lieu,
            'datenouveau' => $daterdv,
            'heurenouveau' => $heurerdv
        );

        Mail::to($rendezvous['mailclient'])->send(new RendezvousReport($mail));

        return ["Result"=>"Success"];
    }
}
