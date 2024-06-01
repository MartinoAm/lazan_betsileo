@extends('page')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Application</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/produitStyle/listeProduit.css') }}">
</head>
<body>
    <h2>Liste des commandes passee</h2>
        @if (session('status'))
               <div class="alert alert-success">
                    {{ session('status') }}
               </div>
           @endif
    <table class="table">
        <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Produit</th>
            <th>Quantite</th>
            <th>Montant (Ariary)</th>
            <th>Date</th>
        </thead>

        <tbody>
            @foreach ( $resultats as  $resultat )
                <tr>
                    <td>{{ $resultat->nom }}</td>
                    <td>{{ $resultat->prenom }}</td>
                    <td>{{ $resultat->adresse }}</td>
                    <td>{{ $resultat->telepone }}</td>
                    <td>{{ $resultat->reference }}</td>
                    <td>{{ $resultat->quantite_commande }}</td>
                    <td>{{ $resultat->montant }}</td>
                    <td>{{ $resultat->date_commande }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection