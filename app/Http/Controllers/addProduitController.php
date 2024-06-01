<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class addProduitController extends Controller
{

    public function index()
    {
        return view('produits.addProduit');
    }

    public function create()
    {
        $produits = Produit::orderBy('id', 'desc')->get();
        return view('produits.listeProduit', compact('produits'));
    }

    public function produit_add(Request $request)
    {
        $request->validate([
            'reference' => 'required',
            'designation' => "required",
            'type_produit' => "required",
            'quantite_stock' => "required",
            'prix_unit' => "required",
        ]);

        $produit = new Produit();
        $produit->reference = $request->reference;
        $produit->designation = $request->designation;
        $produit->type_produit = $request->type_produit;
        $produit->quantite_stock = $request->quantite_stock;
        $produit->prix_unit = $request->prix_unit;

        $produit->save();
        return redirect('/produit_ajout')->with('status', 'Produit bien ete enregistree');
    }


    public function produit_update($id)
    {
        $produit = Produit::find($id);
        return view('produits.updateProduit', compact('produit'));
    }

    public function produit_update_traitement(Request $request)
    {
        $request->validate([
            'reference' => 'required',
            'designation' => "required",
            'type_produit' => "required",
            'quantite_stock' => "required",
            'prix_unit' => "required",
        ]);

        $produit = Produit::find($request->id);
        $produit->reference = $request->reference;
        $produit->designation = $request->designation;
        $produit->type_produit = $request->type_produit;
        $produit->quantite_stock = $request->quantite_stock;
        $produit->prix_unit = $request->prix_unit;

        $produit->update();

        return redirect('/produit_list')->with('status', 'Produit bien ete modifiee');
    }

    public function delete_produit($id)
    {
        $produit = Produit::find($id);
        $produit->delete();
        return redirect('/produit_list')->with('status', 'Produit bien ete supprimee');
    }
}
