<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;



class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('Clients.client');
    }

    public function create()
    {
        //
    }

    public function ajouter_client(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telepone' => 'required'
        ]);

        $clients = new Client();
        $clients->nom = $request->nom;
        $clients->prenom = $request->prenom;
        $clients->adresse = $request->adresse;
        $clients->telepone = $request->telepone;

        $clients->save();
        return redirect('/client_ajouter')->with('status', 'Client bien ete enregistree');
    }

    public function get_clients()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        return view('Clients.listeClient', compact('clients'));
    }

    public function recupere_update_client($id)
    {
        $client = Client::find($id);
        return view('Clients.updateClient', compact('client'));
    }

    public function update_client(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telepone' => 'required'
        ]);

        $clients = Client::find($request->id);
        $clients->nom = $request->nom;
        $clients->prenom = $request->prenom;
        $clients->adresse = $request->adresse;
        $clients->telepone = $request->telepone;

        $clients->update();

        return redirect('/client_list')->with('status', 'Info Client bien etre modifier');
    }

    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/client_list')->with('status', 'Un Clent a ete Supprimee');
    }
}
