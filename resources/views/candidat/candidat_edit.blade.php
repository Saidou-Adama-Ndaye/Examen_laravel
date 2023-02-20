<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <div style="background:#AED6F1; border-radius:10px;padding:5px">
                <h1 style="font-size:50px; color:white">Formulaire Modification Candidat</h1>
            </div>
            <br>
            <form style="border: 5px solid #AED6F1;width:50%; background-color:#AED6F1" method="POST" action="{{route('candidat.update', $candidat)}}">
                <div style="background-color: white; width:50%">
                @csrf
                @method('PUT')
                <label for="">Nom</label><br>
                <input type="text" required name="nom" value="{{$candidat->nom}}" placeholder="Nom"><br><br>
                <label for="">Prenom</label><br>
                <input type="text" required name="prenom" value="{{$candidat->prenom}}" placeholder="prenom"><br><br>
                <label for="">email</label><br>
                <input type="email" required name="email" value="{{$candidat->email}}" placeholder="email"><br><br>
                <label for="">Age</label><br>
                <input type="number" required name="age" value="{{$candidat->age}}" placeholder="age"><br><br>
                <label for="">Niveau d'etude</label><br>
                <input type="text" required name="niveauEtude" value="{{$candidat->niveauEtude}}" placeholder="niveau d'etude"><br><br>
                <label for="">Sexe</label><br>
                <select name="sexe" id="">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                {{-- <input type="text" required name="sexe" value="{{$candidat->sexe}}" placeholder="sexe"><br><br> --}}
                <label for="">Formations</label><br>
                <select name="formations" id="">
                    @foreach ($formations as $formation )
                        <option value="{{$formation->id}}">{{$formation->nom}}</option>
                    @endforeach 
                </select><br><br>
                <label for="">Referentiels</label><br>
                <select name="referentiels" id="">
                    @foreach ($referentiels as $referentiel )
                        <option value="{{$referentiel->id}}">{{$referentiel->libelle}}</option>
                    @endforeach 
                </select><br><br>
                <label for="">Types</label><br>
                <select name="types" id="">
                    @foreach ($types as $type )
                        <option value="{{$type->id}}">{{$type->libelle}}</option>
                    @endforeach 
                </select><br><br>
                <input type="submit" name="" value="Modifier"><br>
            </div>

            </form>
        </center>
        
       
    </body>
</html>