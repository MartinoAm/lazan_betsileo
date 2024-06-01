@extends('page')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Facture</title>
</head>
<body>
    <div class="d-flex content-page">
               <div>
                    <div >
                   <div>
                      <select name="nom" class="form-select" id="nom">
                        <option value="">Selection le nom du client</option>
                        @foreach ($resultats as $resultat)
                            <option value="{{$resultat->nom}}" data-nom="{{$resultat->nom}}" data-prenom="{{$resultat->prenom}}" data-adresse="{{$resultat->adresse}}" data-telepone="{{$resultat->telepone}}"
                                data-designation='{{$resultat->designation}}' data-qte='{{$resultat->quantite_commande}}' data-montant='{{$resultat->montant}}'>{{ $resultat->nom }}</option>
                        @endforeach
                    </select>
                   </div>
                    <hr>
                        <h1 class="h3 mb-0 text-gray-800">Facture d'achat</h1>
                        <hr>
                    </div>
                    <div>
                     <input type="text" name="client_id" id="nom_set" class="form-control" readonly>
                    </div>
           
                   <div>
                       <input type="text" name="client_id" id="prenom" class="form-control" readonly>
                   </div>
                   <div>
                       <input type="text" name="client_id" id="adresse" class="form-control" readonly>
                   </div>
                   <div>
                      <input type="text" name="client_id" id="telepone" class="form-control" readonly>
                   </div>

                <hr>
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Produit </h1>
                    </div>
                   
                    <table class="table">
                        <thead>
                            <th>designation</th>
                            <th>Quantite</th>
                        </thead>
                        <tbody>
                            <td><input type="text" name="client_id" id="des" class="form-control" readonly></td>
                            <td> <input type="text" name="client_id" id="qte" class="form-control" readonly></td>
                        </tbody>

                    </table>

                    <div>
                          <input type="text" name="client_id" id="montant" class="form-control" readonly>
                    </div>
           

                
               </div>
            </div>
</body>


<script>
     document.getElementById('nom').addEventListener('change', function(){
            let selectValue = this.value;
            let selectedOption = this.options[this.selectedIndex];
            let nom = selectedOption.getAttribute('data-nom');
            let prenom = selectedOption.getAttribute('data-prenom');
            let adresse = selectedOption.getAttribute('data-adresse');
            let telephone = selectedOption.getAttribute('data-telepone');
            let des = selectedOption.getAttribute('data-designation');
            let qt = selectedOption.getAttribute('data-qte');
            let montant = selectedOption.getAttribute('data-montant');

            document.getElementById('nom_set').value = nom;
            
document.getElementById('prenom').value = prenom;
            document.getElementById('adresse').value = adresse;
            document.getElementById('telepone').value = telephone;
            document.getElementById('des').value = des;
            document.getElementById('qte').value = qt;
            document.getElementById('montant').value = montant;
        });
</script>
</html>

@endsection
