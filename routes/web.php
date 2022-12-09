<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RendezvousController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Middleware\AdministrateurAuthorisation;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('Accueil');
// });
Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('/Produit-Cat00{idCategorie}', [SiteController::class, 'categorie'])->name('/categorie');
Route::get('/Produit-{idModele}', [SiteController::class, 'modele'])->name('/categ');

Route::get('/Produit/devis-{idProduit}', [SiteController::class, 'devis'])->name('devisProduit');
Route::get('/Produit/devis{idProduit}', [SiteController::class, 'devisGf'])->name('/devisGf');

Route::get('/Produit/devis/i00{idProduit}', [SiteController::class, 'devisInfo'])->name('/devisInfo');
Route::post('/devis-Produit/00{idProduit}', [SiteController::class, 'sendDevisGf'])->name('sendDevisGf');


Route::get('/cart{idProduit}', [SiteController::class, 'cart'])->name('addCart');
Route::get('/cart', [SiteController::class, 'etatCart'])->name('etatCart');
Route::get('/panier/00{idProduit}', [SiteController::class, 'deleteFromCart'])->name('removeFromCart');
Route::get('/produit', [SiteController::class, 'deleteCart'])->name('deleteCart');
Route::get('/panier/modifier-0{idProduit}', [SiteController::class, 'editFromCart'])->name('editCart');
Route::post('/panier/00-{idProduit}', [SiteController::class, 'modifPanier'])->name('modifPanier');


Route::post('/devis-client/010{idProduit}', [SiteController::class, 'devisClient'])->name('devisTemp');
Route::post('/devis-informatique/010{idProduit}', [SiteController::class, 'sendinfo'])->name('/sendInfo');

Route::get("/autreDevis", [SiteController::class, 'goOtherDevis']);
Route::post("/sendAutreDevis", [SiteController::class, 'otherDevis']);

Route::post('/espace-client', [SiteController::class, 'checkPass'])->name('checkPass');
Route::get('/vos-renseignements', [SiteController::class, 'sinscrire'])->name('sinscrire');

Route::post('/registre', [SiteController::class, 'inscription'])->name('inscription');

Route::get('/Produit{idProduit}', [SiteController::class, 'detailProduit'])->name('detailProduit');


Route::get('/espace-client', [SiteController::class, 'login'])->name('espace-client');
Route::post('/recherche', [SiteController::class, 'recherche'])->name('/recherche');

Route::post('/commande', [SiteController::class, 'validCommande'])->name('/validerCommande');

Route::get('/Regitech-contact', [SiteController::class, 'contact'])->name('contact');



Route::post("/mail", [SiteController::class, 'userLogin'])->name('mail');

Route::post("/login" ,[LoginController::class, 'userLogin']);
Route::get("/logout", function(Request $request){
    if($request->session()->has('id')){
        session()->pull('id');
    }
    $request->session()->pull('userlogged');
    return redirect('/espace-client');
});


Route::middleware([AdministrateurAuthorisation::class])->group(function () {
    Route::get("/crudAjout", [CrudController::class, 'goAjoutProduit']);
    Route::post("/exeCrudAjout", [CrudController::class, 'exeAjoutProduit']);
    Route::get("/listeProduit", [CrudController::class, 'listes']);
    Route::get("/testbe", [CrudController::class, 'goTest']);
    Route::get("/crudProduit-{idProduit}", [CrudController::class, 'detailProduitCrud']);
    Route::get("/deleteProduit-{id}", [CrudController::class, 'deleteProduit']);
    Route::get("/crudModifProduit-{idProduit}", [CrudController::class, 'goModifProduit']);
    Route::post("/exeModifProduit-{idProduit}", [CrudController::class, 'exeModifProduit']);
});

Route::get("mobile/statProduitsprix", [StatistiqueController::class, 'prixProduit']);
Route::get("mobile/statCommandeproduit", [StatistiqueController::class, 'commandeProduit']);

Route::get("/formulaireRendezvous", [RendezvousController::class, 'formulaireRendezvous']);
Route::post("/ajoutRdv", [RendezvousController::class, 'ajoutRdv']);

Route::post("/ajoutMessage", [ChatsController::class, 'saveMessage']);
Route::get("/testpusher", [ChatsController::class, 'index']);
Route::get("/sendMessage", [ChatsController::class, 'sendMessage']);

Route::get("/message", [ChatsController::class, 'getMessages']);
Route::get("mobile/listeMessage", [ChatsController::class, 'getListMessage']);
Route::get("mobile/messageAdmin", [ChatsController::class, 'getMessagesAdmin']);
Route::post("mobile/ajoutMessageAdmin", [ChatsController::class, 'saveMessageAdmin']);
Route::get("mobile/getclient", [ChatsController::class, 'getClient']);

Route::post("/pusher/auth", [ChatsController::class, 'getToken']);



Route::get("mobile/notif/commande", [NotificationController::class, 'getNotificationSpeficique']);
Route::get("mobile/notif/produit", [NotificationController::class, 'getProduitDetail']);
Route::post("mobile/notif/valider", [NotificationController::class, 'validateProduit']);
Route::post("mobile/notif/annuler", [NotificationController::class, 'cancelProduit']);
Route::post("mobile/notif/confirmerDevis", [NotificationController::class, 'confirmerDevis']);

Route::get('mobile/rdv/notif', [RendezvousController::class, 'getNotifRdv']);
Route::get("mobile/rdv/allRdv", [RendezvousController::class, 'getAllRdv']);
Route::get("mobile/rdv/rendezvous", [RendezvousController::class, 'rendezvousDetail']);
Route::get("mobile/rdv/rdvDate", [RendezvousController::class, 'rendezvousParDate']);
Route::post("mobile/rdv/actionBtn", [RendezvousController::class, 'action']);
Route::get("mobile/rdv/controleduplicata", [RendezvousController::class, 'getdoublerdv']);
Route::post("mobile/rdv/report", [RendezvousController::class, 'reportRdv']);

Route::post("mobile/log/login", [LoginController::class, 'loginApk']);
Route::get("mobile/log/token", [LoginController::class, 'getTokenApk']);


//Route::get("/loginpage", [LoginController::class, 'index']);



// Route::group(['middleware' => ['web']], function(Request $request){
//     $role = $request->session()->get('role');
//     if($role != 2) return redirect('/');

// });
