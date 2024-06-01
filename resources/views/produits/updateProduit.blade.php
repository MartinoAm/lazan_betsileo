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
        <h2> Modification de produit</h2>
        <hr class="sidebar-divider">
        <div class="container">
           @if (session('status'))
               <div class="alert alert-success">
                    {{ session('status') }}
               </div>
           @endif
            <form action="/update" method="POST">
                @csrf
                 <input type="text" name="id" style="display: none;" value="{{$produit->id}}">
                <label >Reference</label>
                <input type="text" class="form-control" name="reference" value="{{$produit->reference}}">

                <label for="">designation</label>
                <input type="text" class="form-control" name="designation" value="{{$produit->designation}}">

                <label for="">type de produit</label>
                <input type="text" class="form-control" name="type_produit" value="{{$produit->type_produit}}">

                <label for="">Quantite en stock</label>
                <input type="number" class="form-control" name="quantite_stock" value="{{$produit->quantite_stock}}">

                <label for="">prix unitaire</label>
                <input type="text" class="form-control" name="prix_unit" value="{{$produit->prix_unit}}">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit">Modifier</i></button>
            </form>

            
        </div>
    </body>
    </html>
@endsection