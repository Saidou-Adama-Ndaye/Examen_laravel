<!DOCTYPE html>
<html lang="en">
<head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Candidat', 'Age'],
            <?php echo $datas ?>
        ]);

        var options = {
          title: 'Graphe représentant le tranche d\'âge'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color:whitesmoke">
   
    <div style="background:#AED6F1; border-radius:10px;padding:5px">
        <h1 style="font-size:50px; color:white; text-align:center">Dashbord </h1>
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="{{route('candidat.create')}}">Postuler</a>
            <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="{{route('candidat.index')}}">Etdiant List</a>
            <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="{{route('formation.create')}}">Add Formation</a>
            <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="{{route('type.create')}}">Add Type</a>
            <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="{{route('referentiel.create')}}">Add Referentiel</a>
            <a class="flex-sm-fill text-sm-center nav-link bg-success text-white" href="{{route('login')}}">Se connecter</a>
            <a class="flex-sm-fill text-sm-center nav-link bg-warning text-white" href="{{route('register')}}">S'inscrire</a>
        </nav>
    </div> 
    <br><br><br>
    <center>
    <section style="background:grey; border-radius:10px;padding:5px; width:95%">
        <h2 style="font-weight:bold;font-size:20px; color:white; text-align:center">Nombre de candidats par formation </h2>      
    </section>
    <br><br>
    <div style="display:flex">
    @foreach ($formations as $formation)
        <span hidden>{{$cpt = 0}}</span>
        <span hidden>{{$c = "Candidats"}}</span>
        <div style="background:#AED6F1; border-radius:10px;padding:5px; width:30%; margin-left:5%">
        <h4>{{$formation->nom}}</h4>
        <div style="background:whitesmoke; border-radius:10px;padding:5px; width:50%; font-weight:bold; ">
            @foreach ($formation->candidats as $f)
                <span hidden>{{$cpt = $cpt + 1}}</span>
            @endforeach 
            {{$cpt." ".$c}}       
        </div>
        </div><br><br>
    @endforeach
    </div>
    <br><br>
    <section style="background:grey; border-radius:10px;padding:5px; width:95%;">
        <h2 style="font-weight:bold;font-size:20px; color:white; text-align:center">Nombre de formations par referentiel </h2>      
    </section>
    <br><br>
    <div style="display: flex; width:80%">
    @foreach ($referentiels as $referentiel)
        <span hidden>{{$c = "Formations"}}</span>
        <div style="background:#AED6F1; border-radius:10px;padding:5px; width:30%; margin-left:5%">
        <h4>{{$referentiel->libelle}}</h4>
        <div style="background:whitesmoke; border-radius:10px;padding:5px; width:50%; font-weight:bold">
            @foreach ($referentiel->formations as $f)
                <span hidden>{{$cpt = $cpt + 1}}</span>
            @endforeach 
            {{$cpt." ".$c}}       
        </div>
        </div><br><br>
    @endforeach
    </div>
    <br><br>
    <section style="background:grey; border-radius:10px;padding:5px; width:95%">
        <h2 style="font-weight:bold;font-size:20px; color:white; text-align:center">Repartition des formations par type </h2>      
    </section>
    <br><br>
    <div style="display: flex; width:80%">
    @foreach ($types as $type)
        <span hidden>{{$c = "Formations"}}</span>
        <div style="background:#AED6F1; border-radius:10px;padding:5px; width:40%; margin-left:5%">
        <h4>{{$type->libelle}}</h4>
        <div style="background:whitesmoke; border-radius:10px;padding:5px; width:50%; font-weight:bold">
            @foreach ($type->referentiels as $f)
                @foreach ($f->formations as $t)
                    <ul>
                        <li>{{$t->nom}}</li>
                    </ul>
                @endforeach
            @endforeach 
        </div>
        </div><br><br>
    @endforeach
    </div>
    <br><br>
    <section style="background:grey; border-radius:10px;padding:5px; width:95%">
        <h2 style="font-weight:bold;font-size:20px; color:white; text-align:center">Repartition des candidats par sexe </h2>      
    </section>
    <br><br>
        <div style="display: flex; width:80%">
        <span hidden>{{$cpt = 0}}</span>
        <span hidden>{{$for = "Hommes"}}</span>
        <div style="background:#AED6F1; border-radius:10px;padding:5px; width:40%; margin-left:5%">
        <h4>Homme</h4>
        <div style="background:whitesmoke; border-radius:10px;padding:5px; width:50%; font-weight:bold">
            @foreach ($candidats as $candidat)
                @if ($candidat->sexe == "Homme")
                <span hidden>{{$cpt = $cpt + 1}}</span>
                @endif
            @endforeach
            {{$cpt." ".$for}}
            
        </div>
        </div><br><br>

        <span hidden>{{$cpt1 = 0}}</span>
        <span hidden>{{$fore = "Femmes"}}</span>
        <div style="background:#AED6F1; border-radius:10px;padding:5px; width:40%; margin-left:5%">
        <h4>Femmes</h4>
        <div style="background:whitesmoke; border-radius:10px;padding:5px; width:50%; font-weight:bold">
            @foreach ($candidats as $candidat)
                @if ($candidat->sexe == "Femme")
                <span hidden>{{$cpt1 = $cpt1 + 1}}</span>
                @endif
            @endforeach
            {{$cpt1." ".$fore}}
            
        </div>
        </div><br><br>
        </div>
        <br><br>
        <div style="background:grey; border-radius:10px;padding:5px; width:95%">
        <h2 style="font-weight:bold;font-size:20px; color:white; text-align:center">Graphe représentant la tranche d'âge </h2>    
        </div>  
        <br><br>
        <div style="width: 70%; background:#AED6F1; padding:5%; border-radius:10px">
            <div id="piechart" style="width: 900px; height: 500px"></div>
        </div>
    </center>
</body>
</html>