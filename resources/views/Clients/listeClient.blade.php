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
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clients Listes</h1>
    </div>
     @if (session('status'))
               <div class="alert alert-success">
                    {{ session('status') }}
               </div>
           @endif
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ( $clients as $client )
            <tr>
                <td>{{ $client->id}}</td>
                <td>{{ $client->nom }}</td>
                <td>{{ $client->prenom }}</td>
                <td>{{ $client->adresse }}</td>
                <td>{{ $client->telepone }}</td>
                <td>
                    <a href="/client_update/{{$client->id}}"><i class="fa fa-edit btn btn-primary"></i></a>
                    <a href="/client_delete/{{$client->id}}"><i class="fa fa-trash btn btn-danger"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

@endsection