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
    <h2>Liste de poduit existant</h2>
        @if (session('status'))
               <div class="alert alert-success">
                    {{ session('status') }}
               </div>
           @endif
    <table class="table">
        <thead>
            <th>Refernce</th>
            <th>Designation</th>
            <th>Type produits</th>
            <th>quantite</th>
            <th>Prix unitaire</th>
            <th>Action</th>
        </thead>

        <tbody>
            @foreach ( $produits as $produit )
                <tr>
                    <td>{{ $produit->reference }}</td>
                    <td>{{ $produit->designation }}</td>
                    <td>{{ $produit->type_produit }}</td>
                    <td>{{ $produit->quantite_stock }}</td>
                    <td>{{ $produit->prix_unit }}</td>
                    <td>
                        <a href="/update_produit/{{$produit->id}}"><i class="fa fa-edit btn btn-primary"></i></a>
                        <a href="/delete_produit/{{$produit->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

@endsection