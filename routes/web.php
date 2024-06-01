<?php

use App\Http\Controllers\addProduitController;
use App\Http\Controllers\ApiSendMailController;
use App\Http\Controllers\authController;
use App\Http\Controllers\chartController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\dashBoardController;
use App\Http\Controllers\factureController;
use App\Http\Controllers\SendFeedBackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

/* POST - GET PRODUIT */

Route::get("/produit_ajout", [addProduitController::class, 'index']);
Route::get('/update_produit/{id}', [addProduitController::class, 'produit_update']);
Route::get('/delete_produit/{id}', [addProduitController::class, 'delete_produit']);
Route::get("/produit_list", [addProduitController::class, 'create']);

Route::post('/add', [addProduitController::class, 'produit_add']);
Route::post('/update', [addProduitController::class, 'produit_update_traitement']);


/* POST - GET Commandes */

Route::get("/commande", [commandeController::class, 'get_donnee']);
Route::get('/table_commande', [commandeController::class, 'get_commande']);

Route::post('/addCommande', [commandeController::class, 'add_commande']);


/* POST - GET CLIENT */

Route::get('/clients', [clientController::class, 'index']);
Route::get('/client_ajouter', [clientController::class, 'index']);
Route::get('/client_list', [clientController::class, 'get_clients']);
Route::get('/client_update/{id}', [clientController::class, 'recupere_update_client']);
Route::get('/client_delete/{id}', [clientController::class, 'delete']);

Route::post('/addClient', [clientController::class, 'ajouter_client']);
Route::post('/clientUpdate', [clientController::class, 'update_client']);


/* DASHBOARD GET */

Route::get('/dashboard', [dashBoardController::class, 'get_stat']);


/* REGISTER & LOGIN */

Route::controller(authController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerSave')->name('register.save');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginAction')->name('login.action');

    Route::get('/logout', 'logOut')->middleware('auth')->name('logout');

    Route::get('/dashboard', [dashBoardController::class, 'get_stat'])->name('dashboard');
});


Route::get('/facture', [factureController::class, 'createFacture']);
