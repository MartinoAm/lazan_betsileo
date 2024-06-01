<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;
use SebastianBergmann\Environment\Console as EnvironmentConsole;

class commandeController extends Controller
{
    public function index()
    {
        return view('commande.commande');
    }

    public function table()
    {
        return view('commande.tableCommande');
    }

    // public function passer_commande(Request $request)
    // {
    //     $commande = new Commande();
    //     $produit = Produit::findOrFail($request->id);
    //     $request->validate([
    //         'client_id' => 'required',
    //         'reference' => 'required',
    //         'quantite_commande' => 'required',
    //         'date_commande' => 'required',
    //         'quantite_stock' => 'required'
    //     ]);
    //     $produit->quantite_stock = $request->quantite_stock;
    //     $commande->client_id = $request->client_id;
    //     $commande->reference = $request->reference;
    //     $commande->quantite_commande = $request->quantite_commande;
    //     $commande->date_commande = $request->date_commande;

    //     if ($request->quantite_stock <= $request->quantite_commande) {
    //         return redirect('/commande')->with('status', 'Achat impossible stock insuffisant');
    //     } else {
    //         return redirect('/commande')->with('status', 'Achat bien ete enregistree');
    //     }


    //     if ($produit->quantite_stock >= $request->quantite_commande) {
    //         $produit->quantite_stock -= $request->quantite_commande;
    //         $produit->save();
    //         $commande->reference = $request->reference;
    //         $commande->quantite_commande = $request->quantite_commande;
    //         $commande->date_commande = $request->date_commande;

    //         $commande->save();
    //         return redirect('/commande')->with('status', 'Achat bien ete enregistree');
    //     } else {
    //         return redirect('/commande')->with('status', 'Achat impossible stock insuffisant');
    //     }
    //     // $commande = new Commande();

    //     // $commande

    //     // $commande->reference = $request->reference;
    //     // $commande->quantite_commande = $request->quantite_commande;
    //     // $commande->date_commande = $request->date_commande;

    //     // $commande->save();

    //     // return redirect('/commande')->with('status', 'Achat bien ete enregistree');
    // }

    public function get_donnee()
    {
        $produit = Produit::orderBy('id', 'desc')->get();
        $clients = Client::orderBy('id', 'desc')->get();
        return view('commande.commande', compact('produit', 'clients'));
    }

    public function add_commande(Request $request)
    {

        $request->validate([
            'client_id' => 'required',
            'reference' => 'required',
            'quantite_commande' => 'required',
            'date_commande' => 'required',
        ]);

        $commandes = new Commande();
        $produit = Produit::find($request->id);

        if ($produit->quantite_stock <= $request->quantite_commande) {
            return redirect('/commande')->with('Erreur', "Stock insuffisant!");
        }
        $produit->quantite_stock -= $request->quantite_commande;

        $produit->update();

        $commandes->client_id = $request->client_id;
        $commandes->reference = $request->reference;
        $commandes->quantite_commande = $request->quantite_commande;
        $commandes->date_commande = $request->date_commande;

        $commandes->save();
        return redirect('/commande')->with('status', "Achat enreistrrer");
    }

    public function get_commande()
    {
        $resultats = Client::join('commandes', 'clients.id', '=', 'commandes.client_id')
            ->join('produits', 'commandes.reference', '=', 'produits.reference')
            ->select('clients.nom', 'clients.prenom', 'clients.adresse', 'clients.telepone', 'produits.reference', 'produits.prix_unit', 'commandes.quantite_commande', 'commandes.date_commande', DB::raw('produits.prix_unit * commandes.quantite_commande as montant'))
            ->orderByDesc('commandes.id')
            ->get();

        return view('commande.tableCommande', compact('resultats'));
    }

    // public function get_achat()
    // {
    //     $data = Client::join('commandes', 'clients.id', '=', 'commandes.client_id')
    //         ->join('produits', 'commandes.reference', '=', 'produits.reference')
    //         ->select('clients.nom', 'clients.prenom', 'clients.adresse', 'clients.telepone', 'produits.reference', 'produits.prix_unit', 'commandes.quantite_commande', 'commandes.date_commande')
    //         ->orderByDesc('commandes.id')
    //         ->groupBy('commandes.client_id')
    //         ->groupBy('clients.id')
    //         ->get();

    //     $resultats = Client::select(DB::raw('sum(commandes.quantite_commande) as quantite'), DB::raw('sum(produits.prix_unit*commandes.quantite_commande) as montant',))
    //         ->join('commandes', 'clients.id', '=', 'commandes.client_id')
    //         ->join('produits', 'commandes.reference', '=', 'produits.reference')
    //         ->groupBy('commandes.client_id')
    //         ->get();

    //     return view('commande.tableCommande', compact('resultats', 'data'));
    // }
}
