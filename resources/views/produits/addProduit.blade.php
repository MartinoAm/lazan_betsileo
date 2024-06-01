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
    </head>
    <body>
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Ajout production</h1>
             </div>
        <hr class="sidebar-divider">
           @if (session('status'))
               <div class="alert alert-success">
                    {{ session('status') }}
               </div>
           @endif
            <form action="/add" method="POST">
                @csrf
                <label for="">Reference</label>
                <input type="text" class="form-control" name="reference" class="form-control bg-light border-0 small">

                <label for="">designation</label>
                <input type="text" class="form-control" name="designation" class="form-control bg-light border-0 small">

                <label for="">type de produit</label>
                <input type="text" class="form-control" name="type_produit" class="form-control bg-light border-0 small">

                <label for="">Quantite en stock</label>
                <input type="number" class="form-control" name="quantite_stock" class="form-control bg-light border-0 small">

                <label for="">prix unitaire</label>
                <input type="text" class="form-control" name="prix_unit" class="form-control bg-light border-0 small">
                <br>
               <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-plus fa-sm">Sauvegarder</i>
                    </button>
                </div>
            </form>

            
        </div>
    </body>
    </html>
@endsection