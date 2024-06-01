<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashBoardController extends Controller
{
    public function page_dashBoard()
    {
        return view('stat.dashboard');
    }
    public function get_stat()
    {

        $clients = Client::all();

        $resultats = Client::join('commandes', 'clients.id', '=', 'commandes.client_id')
            ->join('produits', 'commandes.reference', '=', 'produits.reference')
            ->select('clients.nom', 'clients.prenom', 'clients.adresse', 'clients.telepone', 'produits.reference', 'produits.prix_unit', 'commandes.quantite_commande', 'commandes.date_commande', DB::raw('produits.prix_unit * commandes.quantite_commande as montant'))
            ->orderByDesc('commandes.id')
            ->get();

        $montants = $resultats->sum('montant');
        $clientNombre = $resultats->count('client.id');

        $progress = $clientNombre / 100;
        $countClients = $clients->count('id');
        return view('stat.dashboard', compact('resultats', 'montants', 'clientNombre', 'countClients', 'progress'));
    }
}
