<?php
// php artisan make:controller ProductController --resource --model=Product
namespace App\Http\Controllers;

// use App\Mail\MyTestMail;

use App\Mail\MailGf;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Modele;

use App\Models\Categorie;
use App\Models\Produit;

use App\Models\Marque;
use App\Models\Devis;

use App\Models\Utilisateur;

use App\Mail\MyTestMail;
use App\Mail\MailInline;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->protection=1;
        $this->admin=env('admin_email');

    }


    public function insertMain(){
        $categorie=new Categorie();
        $categorie->categorie="Batterie";
        $categorie->idmodele=0;
        $categorie->photocategorie="photocat";

        $produit=new Produit();
        $produit->idcategorie=0;
        $produit->designation="nom";
        $produit->photo="photo";
        $produit->idmarque=0;
        $produit->puissance=0;
        $produit->prix=0;
        $produit->caracteristique="caracteristique";
    }


    public function index(){

        $prod['protection']=Categorie::where("config",1)->get();
        $prod['bureautique']=Categorie::where("config",2)->get();
        $prod['informatique']=Categorie::where("config",3)->get();
        $prod['grandFormat']=Categorie::where("config",4)->get();

        $prod['modele']=Modele::get();
        $prod['marques']=Marque::get();
// echo "acc";
       return view('Accueil', compact('prod'));

    }


    public function contact(){
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Contact',compact('prod'));
    }


    public function modele(Request $request){
        $idModele=$request->idModele;
        $prod['produit']=Produit::where('idmodele',$idModele)->get();
        $prod['active']=$idModele;
        $data=Modele::where("id",$idModele)->get();
        $modele=$data[0]['modele'];
        $prod['activemodele']=$modele;
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Produit',compact('prod'));
    }


    public function categorie(Request $request){
        $idCategorie=$request->idCategorie;
        $prod['produit']=Produit::where('idcategorie',$idCategorie)->get();
        $data=Categorie::where("idcategorie",$idCategorie)->get();
        $idmodele=$data[0]['idmodele'];
        $modele=$data[0]['modele'];
        $categorie=$data[0]['categorie'];
        $prod['active']=$idmodele;
        $prod['activemodele']=$modele;
        $prod['activecategorie']=$categorie;

        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Produit',compact('prod'));
    }


    public function devis(Request $request){
        $idP= $request->idProduit;
        $prod['produit']=Produit::where('id',$idP)->get();

        $config= $prod['produit'][0]['config'];

        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        $prod['marques']=Marque::get();

        if($config==1){
            return view('Devis/DevisOnduleur',compact('prod'));
        }
        if($config==2 || $config==4){
            $mytime =Carbon::now("m");
            $date=$mytime->year;
            $prod['year']=$date;
            return view('Devis/DevisGf',compact('prod'));
        }
        if($config==3){
            return view('Devis/DevisInfo', compact('prod'));
        }
    }


    public function devisGf(Request $request){
         $idP= $request->idProduit;

         $mytime =Carbon::now("m");
         $date=$mytime->year;
        $prod['year']=$date;
        $prod['produit']=Produit::where('id',$idP)->get();

        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Devis/DevisGf',compact('prod'));
   }


   public function devisInfo(Request $request){
        $prod['idProduit']=$request->idProduit;
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Devis/DevisInfo',compact('prod'));
    }




    public function cart(Request $request){
        $id= $request->idProduit;

        $session = $request->session()->get('idP');
        //$session= Session::get('idP');
        if($session!=null){
           $arraySession=array();
            $arraySession= $session;

            // Session::forget('idP');
            $check= 0;
            // $c=0;
            for($i=0; $i<count($arraySession); $i++){
                // echo $arraySession[$i][0]['id'];
                // $c++;
                if($arraySession[$i][0]['id']==$id){
                    $check=$id;
                    $arraySession[$i][0]['quantite']= $arraySession[$i][0]['quantite'] + 1;
                    break;
                }else{

                        if($i >= count($arraySession) -1 ){
                            $data=Produit::where('id',$id)->get();
                            $data[0]['quantite']= 1;
                            $data[0]['idclient'] = $request->session()->get('id');
                            $actuel=$request->session()->get('idP');
                            //$actuel=Session::get('idP');
                            array_push($actuel,$data);
                            $request->session()->put('idP',$actuel);
                        }else{
                        }

                }
                // echo $c;

            }


        }else{
            $data=Produit::where('id',$id)->get();
            $data[0]['quantite']=1;
            $tab=array();
            array_push($tab,$data);
            $request->session()->put('idP',$tab);
        }
        $actuel=$request->session()->get('idP');
        // foreach($actuel as $as){
        //     echo $as[0]['quantite'];
        // }
        $produit=Produit::where('id',$id)->get();
        $idCategorie=$produit[0]['idcategorie'];
        $data=Categorie::where("idcategorie",$idCategorie)->get();
        $idmodele=$data[0]['idmodele'];
        $modele=$data[0]['modele'];
        $categorie=$data[0]['categorie'];
        $prod['active']=$idmodele;
        $prod['activemodele']=$modele;
        $prod['activecategorie']=$categorie;
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['produit']=Produit::where('idcategorie',$idCategorie)->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Produit',compact('prod'));
    }


    public function etatCart(Request $request){
        $session= $request->session()->get('idP');
        $prod['panier']=$session;
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        $prod['marques']=Marque::get();
        return view('Cart',compact('prod'));
        //var_dump(json_encode($prod['panier']));
    }


    public function deleteFromCart(Request $request){
        $idProduit= $request->idProduit;
        $panier=$request->session()->get('idP');
        $val=array(count($panier)-1);
        // var_dump($panier);
        $count=0;
            for($i=0; $i<count($panier); $i++){

                    if($panier[$i][0]['id']==$idProduit){

                    }else{
                        $val[$count]=$panier[$i];
                        $count++;
                    }
            }
            $request->session()->put('idP',$val);
            $actuel=$request->session()->get('idP');
            $prod['panier']=$actuel;
            $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
            $prod['protec']=Categorie::where('config',1)->get();
            $prod['bureau']=Categorie::where('config',2)->get();
            $prod['info']=Categorie::where('config',3)->get();
            $prod['grand']=Categorie::where('config',4)->get();
            $prod['modele']=Modele::get();
            $prod['marques']=Marque::get();
            return view('Cart',compact('prod'));
    }


    public function editFromCart(Request $request){
        $idProduit= $request->idProduit;
        $prod['produit']=Produit::where('id',$idProduit)->get();

        //$panier=Session::get('idP');
        $panier = $request->session()->get('idP');
        // var_dump($panier);
        $quantite=0;
            for($i=0; $i<count($panier); $i++){

                    if($panier[$i][0]['id']==$idProduit){
                       $quantite=$panier[$i][0]['quantite'];
                    }else{
                    }
            }
            $prod['idProduit']=$idProduit;
        $prod['quantite']=$quantite;
        // fiche
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protection']=Categorie::where("config",1)->get();
        $prod['bureautique']=Categorie::where("config",2)->get();
        $prod['inforamtique']=Categorie::where("config",3)->get();
        $prod['grandFormat']=Categorie::where("config",4)->get();
        $prod['modele']=Modele::get();
        $prod['marques']=Marque::get();
        return view('Fiche',compact('prod'));
    }


    public  function modifPanier(Request $request)
    {
        $idProduit= $request->idProduit;
       $quantite= $request->quantite;
       $panier=$request->session()->get('idP');
       // var_dump($panier);

           for($i=0; $i<count($panier); $i++){

                   if($panier[$i][0]['id']==$idProduit){
                      $panier[$i][0]['quantite']=$quantite;
                   }else{
                   }
           }

           $session= $request->session()->get('idP');

           $prod['panier']=$session;
           $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
           $prod['protec']=Categorie::where('config',1)->get();
           $prod['bureau']=Categorie::where('config',2)->get();
           $prod['info']=Categorie::where('config',3)->get();
           $prod['grand']=Categorie::where('config',4)->get();
           $prod['modele']=Modele::get();
           $prod['marques']=Marque::get();
           return view('Cart',compact('prod'));

    }


    public function deleteCart(){
        //FacadesSession::forget('idP');
        Session::forget('idP');

            $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
            $prod['protec']=Categorie::where('config',1)->get();
            $prod['bureau']=Categorie::where('config',2)->get();
            $prod['info']=Categorie::where('config',3)->get();
            $prod['grand']=Categorie::where('config',4)->get();
            $prod['modele']=Modele::get();
            $idCategorie=1;
            $prod['produit']=Produit::where('idcategorie',$idCategorie)->get();
            $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
              return view('Produit',compact('prod'));
    }

    public function checkPass(Request $request){
        echo "No pass";
    }


    public function devisClientCmt(Request $request){
        $remarque= $request->remarques;
        $materiel= $request->materiel;
        $puissance= $request->puissance;
        $frequence= $request->frequence;
        $phase= $request->phase;

        $idProduit= $request->idProduit;
        $data=Produit::where('id',$idProduit)->get();
       $modele= $data[0]['modele'];
       $categorie= $data[0]['categorie'];
       $marque= $data[0]['marque'];
       $designation= $data[0]['designation'];
        $email=$request->email;
        $pass=$request->mdp;
        $tel = $request->tel;
        if($request->session()->get('userConnected')!=null){
            $client=$request->session()->get('userConnected');
            // echo "session exist";
            // envoie devis email
            try{
               $mail=array(

                    'subject' =>$categorie,
                    'client'=>$email,
                    'produit'=>$designation,
                    'modele' => $modele,
                    'marque' => $marque,
                    'puissance' => $puissance,
                    'frequence' => $frequence,
                    'phase' => $phase,
                    'materiel' => $materiel,
                    'remarque' => $remarque

                );

                        // Mail::to($this->admin)->send(new MyTestMail($mail));
                        $commande =new Devis();
                        $commande->email_client= $email;
                        $commande->id_produit= $idProduit;
                        $commande->description="demande sur protéction électrique onduleur online, régulateur";
                        $commande->tel = $tel;
                        // $commande->save();


                        $idCategorie= $data[0]['idcategorie'];
                        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
                        $idmodele=$data[0]['idmodele'];
                        $modele=$data[0]['modele'];
                        $categorie=$data[0]['categorie'];
                        $prod['active']=$idmodele;
                        $prod['activemodele']=$modele;
                        $prod['activecategorie']=$categorie;
                        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
                        $prod['produit']=Produit::where('idcategorie',$idCategorie)->get();
                        $prod['protec']=Categorie::where('config',1)->get();
                        $prod['bureau']=Categorie::where('config',2)->get();
                        $prod['info']=Categorie::where('config',3)->get();
                        $prod['grand']=Categorie::where('config',4)->get();
                        $prod['modele']=Modele::get();
            //    return view('Produit',compact('prod'));
             }
            catch(Exception $e){
                // return redirect('create')->with('failed',"operation failed");
            }
        }else{

            if(isset($email)){
                // echo $email;

                $user=Utilisateur::where("email",$email)->where("pass",$pass)->get();
                if(count($user)!=0){
                        echo $user[0]['nom'];
                        $request->session()->put('userConnected',$email);
                        // envoie devis email
                }else{
                    $idCategorie= $data[0]['idcategorie'];
                    $data=Categorie::where("idcategorie",$idCategorie)->get();
                    $idmodele=$data[0]['idmodele'];
                    $modele=$data[0]['modele'];
                    // $categorie=$data[0]['categorie'];
                    // $prod['active']=$idmodele;
                    // $prod['activemodele']=$modele;
                    // $prod['activecategorie']=$categorie;
                    $prod['categorie']=Categorie::get();
                    $prod['produit']=Produit::where('idcategorie',$idCategorie)->get();
                    $prod['protec']=Categorie::where('config',1)->get();
                    $prod['bureau']=Categorie::where('config',2)->get();
                    $prod['info']=Categorie::where('config',3)->get();
                    $prod['grand']=Categorie::where('config',4)->get();
                    $prod['modele']=Modele::get();
                    $prod['errorPass']="Identifiant ou mot de passe incorrect";
                    return view('Devis/DevisOnduleur',compact('prod'));
                }
            }
        }
    }


    public function devisClient(Request $request){
        $remarque= $request->remarques;
        $materiel= $request->materiel;
        $puissance= $request->puissance;
        $frequence= $request->frequence;
        $phase= $request->phase;
        $email=$request->emailClient;
        $societe=$request->societe;
        $tel = $request->tel;
        $quantite = $request->nbcommande;
        $idProduit= $request->idProduit;

        $data=Produit::where('id',$idProduit)->get();
        $modele= $data[0]['modele'];
        $categorie= $data[0]['categorie'];
        $marque= $data[0]['marque'];
        $designation= $data[0]['designation'];

        $mail=array(
            'subject' =>$categorie,
            'client'=>$email,
            'produit'=>$designation,
            'modele' => $modele,
            'marque' => $marque,
            'puissance' => $puissance,
            'frequence' => $frequence,
            'phase' => $phase,
            'materiel' => $materiel,
            'remarque' => $remarque,
            'societe' => $societe,
            'tel' => $tel
        );

        Mail::to($this->admin)->send(new MyTestMail($mail));

        $commande =new Devis();
        $commande->email_client= $email;
        $commande->id_produit= $idProduit;
        $commande->description="Demande sur protéction électrique onduleur online ou régulateur";
        $commande->tel = $tel;
        $commande->nb_commande = $quantite;
        $commande->societe = $societe;
        $commande->save();


        $idCategorie= $data[0]['idcategorie'];
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $idmodele=$data[0]['idmodele'];
        $prod['active']=$idmodele;
        $prod['activemodele']=$modele;
        $prod['activecategorie']=$categorie;
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['produit']=Produit::where('idcategorie',$idCategorie)->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Produit',compact('prod'));
    }


    public function sendinfo(Request $request){
         $mail=array(

            'subject' =>$request->produit,
            'client'=>$request->nomClient,
            'email'=>$request->emailClient,
            'tel' => $request->tel,
            'societe' => $request->societe,
            'poste' => $request->poste,
            'activite' => $request->activite,
            'description' => $request->remarques
        );
        Mail::to($this->admin)->send(new MailInline($mail));
        // insert commande
        $commande =new Devis();
        $commande->email_client= $request->emailClient;
        $commande->id_produit= $request->idProduit;
        $commande->description="Demande informatique";
        $commande->tel = $request->tel;
        $commande->nb_commande = $request->nbcommande;
        $commande->societe = $request->societe;
        $commande->save();
        return redirect()->back();
    }

    public function sendDevisGf(Request $request){
        $idproduit = $request->idProduit;

        //besoin
        $impression=$request->impression;
        $formatImpression=$request->formatImpression;

        $photocopie=$request->photocopie;
        $formatPhotocopie=$request->formatPhotocopie;

        $nbUser=$request->nbUser;
        $volumePage=$request->volumePage;

        $compatibilte=$request->compatibilte;
        $modalite=$request->modalite;

        $reprise=$request->reprise;
        $typeMateriel=$request->typeMateriel;

        $qt = $request->nbcommande;

        $desc = "Devis grand format; Impression:".$impression."; FormatImpression:".$formatImpression."; Photocopie:".$photocopie."; FormatPhotocopie:".$formatPhotocopie."; Utilisateur:".$nbUser."; Page:".$volumePage."; Compatibilite:".$compatibilte."; Modalite:".$modalite."; Reprise?:".$reprise."; Type materiel:".$typeMateriel;


        //send mail
        $mail=array(
            'subject' =>$qt." ".$request->produit,
            'client'=>$request->nomClient,
            'email'=>$request->emailClient,
            'tel' => $request->tel,
            'societe' => $request->societe,
            'poste' => $request->poste,
            'activite' => $request->activite,
            'description' => $desc
        );
        Mail::to($this->admin)->send(new MailInline($mail));

        //insert commande
        $commande =new Devis();
        $commande->email_client= $request->emailClient;
        $commande->id_produit= $idproduit;
        $commande->description=$desc;
        $commande->tel = $request->tel;
        $commande->nb_commande = $qt;
        $commande->societe = $request->societe;
        $commande->save();

        return redirect()->back();
    }



    public function goOtherDevis(){
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protection']=Categorie::where("config",1)->get();
        $prod['bureautique']=Categorie::where("config",2)->get();
        $prod['inforamtique']=Categorie::where("config",3)->get();
        $prod['grandFormat']=Categorie::where("config",4)->get();
        $prod['modele']=Modele::get();
        $prod['marques']=Marque::get();
        return view('Devis/DevisFormulaireVierge',compact('prod'));

    }

    public function otherDevis(Request $request){
        $mail=array(
            'subject' =>"Autre devis",
            'client'=>$request->nomClient,
            'email'=>$request->emailClient,
            'tel' => $request->tel,
            'societe' => $request->societe,
            'poste' => $request->poste,
            'activite' => $request->activite,
            'description' => $request->remarques
        );
        Mail::to($this->admin)->send(new MailInline($mail));
        // insert commande
        $commande =new Devis();
        $commande->email_client= $request->emailClient;
        $commande->id_produit= $request->idProduit;
        $commande->description="Autre devis";
        $commande->tel = $request->tel;
        $commande->societe = $request->societe;
        $commande->save();
        return redirect()->back();
    }


    public function sinscrire(){
        return view('Inscription');
    }


    public function inscription(Request $request){
        $INVALID_EMPTY_ERROR = "Veuillez remplir tous les champs.";
        $INVALID_PATTERN_ERROR = "Un des champs ne respecte pas le format demandé.";
        $nom=trim($request->nom);
        if (empty($nom)) {
            $data['errorInscription'] = $INVALID_EMPTY_ERROR;
            $data['invalidNom'] = true;
            return view('Inscription', $data);
        }
        $data['typedNom'] = $nom;

        $email=trim($request->email);
        if (empty($email)) {
            $data['errorInscription'] = $INVALID_EMPTY_ERROR;
            $data['invalidMail'] = true;
            return view('Inscription', $data);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $data['errorInscription'] = $INVALID_PATTERN_ERROR;
            $data['invalidMail'] = true;
            $data['invalidMailMessage'] = "L'email doit être conforme au norme. Exemple: <i>abc@exemple.com</i> .";
            return view('Inscription', $data);
        }
        $checkMail=Utilisateur::where("email",$email)->get();
        if(count($checkMail) > 0){
            $data['errorInscription']="L'adresse email est déjà utilisé par un autre compte.";
            $data['invalidMail'] = true;
            $data['invalidMailMessage'] = "Veuillez utiliser un autre adresse ou connectez-vous au compte lié à l'email.";
            return view('Inscription', $data);
        }
        $data['typedMail'] = $email;

        $tel=strtr($request->tel, " ", "");
        if(empty($tel)){
            $data['errorInscription'] = $INVALID_EMPTY_ERROR;
            $data['invalidTel'] = true;
            return view('Inscription', $data);
        }
        // "^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"
        if(!is_numeric($tel) || strlen($tel) != 10) {
            $data['errorInscription'] = $INVALID_PATTERN_ERROR;
            $data['invalidTel'] = true;
            $data['invalidTelMessage'] = "Le numéro doit suivre le format suivant: xxx xx xxx xx (10 chiffres). Les espaces sont optionnels."; // TODO
            return view('Inscription', $data);
        }
        $data['typedTel'] = $tel;

        $mdp=$request->mdp;
        if(empty($mdp)){
            $data['errorInscription'] = $INVALID_EMPTY_ERROR;
            $data['invalidMdp'] = true;
            return view('Inscription', $data);
        }
        if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $mdp) === false) {
            $data['errorInscription'] = $INVALID_PATTERN_ERROR;
            $data['invalidMdp'] = true;
            return view('Inscription', $data);
        }

        $societe=$request->societe;
        if(empty($societe)){
            $data['errorInscription'] = $INVALID_EMPTY_ERROR;
            $data['invalidSociete'] = true;
            return view('Inscription', $data);
        }
        $data['typedSociete'] = $societe;


        $activite=$request->activite;
        if(empty($activite)){
            $data['errorInscription'] = $INVALID_EMPTY_ERROR;
            $data['invalidActivite'] = true;
            return view('Inscription', $data);
        }



        $cli=new Utilisateur();
        $cli->nom=$nom;
        $cli->email=$email;
        $cli->tel=$tel;
        $cli->societe=$societe;
        $cli->activite=$activite;
        $cli->pass=md5($mdp);
        $cli->iduserrole = 1;
        // dd($data,$cli);
        $cli->save();

        return redirect('/espace-client?error=logfirst');
        //$this->index();

        // $prod['protection']=Categorie::where("config",1)->get();
        // $prod['bureautique']=Categorie::where("config",2)->get();
        // $prod['informatique']=Categorie::where("config",3)->get();
        // $prod['grandFormat']=Categorie::where("config",4)->get();
        // $prod['modele']=Modele::get();
        // $prod['marques']=Marque::get();
        // return view('Accueil',compact('prod'));

    }


    public function detailProduit(Request $request){
        $idProduit= $request->idProduit;
        $prod['produit']=Produit::where('id',$idProduit)->get();

        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protection']=Categorie::where("config",1)->get();
        $prod['bureautique']=Categorie::where("config",2)->get();
        $prod['inforamtique']=Categorie::where("config",3)->get();
        $prod['grandFormat']=Categorie::where("config",4)->get();
        $prod['modele']=Modele::get();
        $prod['marques']=Marque::get();
        return view('Fiche',compact('prod'));
    }


    public function recherche(Request $request){
        $recherche=$request->search;
        $idCategorie=$request->categorie;
       if($idCategorie!=0){
            $prod['produit']=Produit::where('designation','like','%'.$recherche.'%')->where('idcategorie',$idCategorie)->get();

       }else{
            $prod['produit']=Produit::where('designation','like','%'.$recherche.'%s')->get();
       }

       $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
       $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();
        return view('Produit',compact('prod'));
    }


    public function validCommande(Request $request){
        $nom= $request->nomClient;
        $email= $request->emailClient;
        $tel= $request->tel;
        $nom= $request->nomClient;
        $societe=$request->societe;
        $activite=$request->activite;
        $poste=$request->poste;

        $session=$request->session()->get('idP');

        // insert commande
        foreach ($session as $i => $panier) {
            # code...
            $commande =new Devis();
            $commande->email_client= $email;
            $commande->id_produit= $panier[0]->id;
            $commande->id_client = $panier[0]->idclient;
            $commande->nb_commande = $panier[0]->quantite;
            $commande->description="Demande sur protection electrique onduleur inline ou batterie";
            $commande->tel = $tel;
            $commande->societe = $request->societe;
            $commande->save();


        }


        $mail=array(

            'subject' =>"Onduleur Inline | Batterie | Prise",
            'client'=>$nom,
            'email'=>$email,
            'tel' => $tel,
            'societe' => $societe,
            'poste' => $poste,
            'activite' => $activite,
            'tabProduit' => $session,
            'description' => "Produits inline"
        );
        Mail::to($this->admin)->send(new MailInline($mail));


        $request->session()->forget('idP');
        return  $this->redirect_prod($session[0][0]->idcategorie);
        //echo $panier[0]->designation;
    }


    public function redirect_prod($idCategorie){
        $prod['produit']=Produit::where('idcategorie',$idCategorie)->get();
        $prod['categorie']=Categorie::orderBy('idcategorie','ASC')->get();
        $prod['protec']=Categorie::where('config',1)->get();
        $prod['bureau']=Categorie::where('config',2)->get();
        $prod['info']=Categorie::where('config',3)->get();
        $prod['grand']=Categorie::where('config',4)->get();
        $prod['modele']=Modele::get();

        $data=Categorie::where("idcategorie",$idCategorie)->get();
        $idmodele=$data[0]['idmodele'];
        $modele=$data[0]['modele'];
        $categorie=$data[0]['categorie'];
        $prod['active']=$idmodele;
        $prod['activemodele']=$modele;
        $prod['activecategorie']=$categorie;
        return view('Produit',compact('prod'));
    }


    public function login(){
        return view('Login');
    }
}
