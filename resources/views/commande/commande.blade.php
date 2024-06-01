@extends('page')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Application</title>
    <link rel="stylesheet" href="{{ asset('assets/style/commade.css') }}">
</head>
<body>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Achat de Produits</h1>
    </div>
 <hr class="sidebar-divider">
    <div class="container-fluid g-0">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('Erreur'))
            <div class="alert alert-danger">
                {{ session('Erreur') }}
            </div>
        @endif
        <form action='/addCommande' method="POST">
            @csrf
            <div class="d-flex content-page">
               <div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Information clients</h1>
                    </div>
                    <label>Nom</label>
                     <select name="nom" class="form-select" id="nom">
                        <option value="">Selection le nom du client</option>
                        @foreach ($clients as $client)
                            <option value="{{$client->nom}}" data-id="{{$client->id}}" data-prenom="{{$client->prenom}}" data-adresse="{{$client->adresse}}" data-telepone="{{$client->telepone}}">{{ $client->nom }}</option>
                        @endforeach
                    </select>
                    <label>Id Client</label>
                    <input type="text" name="client_id" placeholder="Id...." id="client_id" class="form-control" readonly required>
                    <label>Prenom</label>
                    <input type="text" name="prenom" placeholder="prenom...." id="prenom" class="form-control" readonly>
                    <label>Adresse</label>
                    <input type="text" name="adresse" placeholder="adresse...." id="adresse" class="form-control" readonly>
                    <label>Telephone</label>
                    <input type="text" name="telephone" placeholder="Telephone...." id="telepone" class="form-control" readonly>
               </div>
                <div>
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Information de procduit Acheter</h1>
                    </div>
                    <label>Produits</label>
                    <select name="reference" class="form-select" id="produit">
                        <option value="">Choisir des produits</option>
                        @foreach ($produit as $produits)
                            <option value="{{$produits->reference}}" data-id="{{ $produits->id }}" data-quantite="{{ $produits->quantite_stock }}" data-prix="{{ $produits->prix_unit }}">{{ $produits->designation }}</option>
                        @endforeach
                    </select>
                    <input type="text" style="display: none" name="id" id="id_produit">
                    <label>Quantite en stock</label>
                    <input type="text" name="quantite_stock" id="quantite_stock" placeholder="Stock...." class="form-control" readonly>
                    <label>Prix Unitaire (Ariary)</label>
                    <input type="text" name="prix_unit" id="prix" placeholder="Prix Unitaire...." class="form-control" readonly>
                    <label>Quantite</label>
                    <input type="number" required min="1" value='1' name="quantite_commande" placeholder="Quantite commander...." class="form-control">
                    <label>Date</label>
                    <input type="date" name="date_commande" class="form-control" required>
               </div>
            </div>
            <br>
             <button class="btn btn-primary" type="submit" id="button"><i class="fa fa-plus">Sauvegarder</i></button>
        </form>
    </div>

    <script>
       document.getElementById('produit').addEventListener('change', function() {
            var selectValue = this.value;
            var selectedOption = this.options[this.selectedIndex];
            var prix = selectedOption.getAttribute('data-prix');
            var quantite = selectedOption.getAttribute('data-quantite');
            var id = selectedOption.getAttribute('data-id');
            document.getElementById('prix').value = prix;
            document.getElementById('quantite_stock').value = quantite;
            document.getElementById('id_produit').value = id;

            if(quantite <= 10){
                var texte = document.getElementById('quantite_stock');
                texte.style.color = 'red';
                texte.style.size = '25px';
            } else {
                var texte = document.getElementById('quantite_stock');
                 texte.style.color = 'green';
                texte.style.size = '25px';
            }

        });

        document.getElementById('nom').addEventListener('change', function(){
            let selectValue = this.value;
            let selectedOption = this.options[this.selectedIndex];
            let id = selectedOption.getAttribute('data-id');
            let prenom = selectedOption.getAttribute('data-prenom');
            let adresse = selectedOption.getAttribute('data-adresse');
            let telephone = selectedOption.getAttribute('data-telepone');

            document.getElementById('client_id').value = id;
            document.getElementById('prenom').value = prenom;
            document.getElementById('adresse').value = adresse;
            document.getElementById('telepone').value = telephone;

        });
    </script>

    
</body>
</html>
@endsection