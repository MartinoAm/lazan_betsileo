<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class factureController extends Controller
{
    public function createFacture()
    {

        $resultats = Client::join('commandes', 'clients.id', '=', 'commandes.client_id')
            ->join('produits', 'commandes.reference', '=', 'produits.reference')
            ->select('clients.nom', 'clients.prenom', 'clients.adresse', 'clients.telepone', 'produits.reference', 'produits.designation', 'produits.prix_unit', 'commandes.quantite_commande', 'commandes.date_commande', DB::raw('produits.prix_unit * commandes.quantite_commande as montant'))
            ->orderByDesc('commandes.id')
            ->get();

        return view('facture', compact('resultats'));
    }

    // public function facture(Request $request)
    // {
    //     $commande = Commande::find($request->id);

    //     $resultats = DB::table('clients')
    //         ->join('commandes', 'clients.id', '=', 'commandes.client_id')
    //         ->join('produits', 'produits.reference', '=', 'commandes.reference')
    //         ->select('clients.nom', DB::raw('SUM(commandes.quantite_commande) as quantite'), DB::raw('SUM(produits.prix_unit * commandes.quantite_commande) as somme'))
    //         ->where('commandes.date_commande', '=', $request->date_commande)
    //         ->groupBy('clients.nom')
    //         ->get();

    //     return view('facture', compact('resultats'));
    // }
}
