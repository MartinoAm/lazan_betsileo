@extends('page')
@section('content')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My Application</title>
    </head>
    <body>
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Client</h1>
             </div>
        <hr class="sidebar-divider">
           @if (session('status'))
               <div class="alert alert-success">
                    {{ session('status') }}
               </div>
           @endif
            <form action="/addClient" method="POST">
                @csrf
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" class="form-control bg-light border-0 small">

                <label for="">Prenom</label>
                <input type="text" class="form-control" name="prenom" class="form-control bg-light border-0 small">

                <label for="">Adresse</label>
                <input type="text" class="form-control" name="adresse" class="form-control bg-light border-0 small">

                <label for="">Telepone</label>
                <input type="number" class="form-control" name="telepone" class="form-control bg-light border-0 small">
                <br>
               <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-plus fa-sm">Sauvegarder</i>
                    </button>
                </div>
            </form>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
    </html>


@endsection