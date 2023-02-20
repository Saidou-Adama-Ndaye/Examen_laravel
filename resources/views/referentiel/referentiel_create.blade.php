<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
    <body>
        <center>
            <div style="background:#AED6F1; border-radius:10px;padding:5px">
                <h1 style="font-size:50px; color:white">Formulaire Ajout Referentiel</h1>
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="{{route('welcome')}}">Accueil</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="{{route('candidat.index')}}">Candidats List</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" bg-primary text-white href="#">Link</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white">Disabled</a>
                  </nav>
            </div>
            <br>
            <form style="border: 5px solid #AED6F1;width:50%; background-color:#AED6F1" method="POST" action="{{route('referentiel.store')}}">
                <div style="background-color: white; width:50%">
                @csrf
                <label for="">Libelle</label><br>
                <input type="text" required name="libelle" ><br><br>
                <label for="">Validated</label><br>
                <input type="number" required name="validated" ><br><br>
                <label for="">Horaire</label><br>
                <input type="number" required name="horaire" ><br><br>
                <label for="">Types</label><br>
                <select name="types" id="">
                    @foreach ($types as $type )
                        <option value="{{$type->id}}">{{$type->libelle}}</option>
                    @endforeach 
                </select><br><br>

                <input type="submit" name="" value="Ajouter"><br>
            </div>

            </form>
        </center>
        
       
    </body>
</html>