<!DOCTYPE html>

<html>
    <head>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
    
          function drawChart() {
    
            var data = google.visualization.arrayToDataTable([
              ['Candidat', 'Age'],
                <?php echo $dats ?>
            ]);
    
            var options = {
              title: 'Graphe représentant les formations en cours et en attente'
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
            chart.draw(data, options);
          }
        </script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
    <body>
        <center>
            <div style="background:#AED6F1; border-radius:10px;padding:5px">
                <h1 style="font-size:50px; color:white">Formulaire Ajout Formation</h1>
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="{{route('welcome')}}">Accueil</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="{{route('candidat.index')}}">Candidats List</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" bg-primary text-white href="#">Link</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white">Disabled</a>
                  </nav>
            </div>
            <br>
            <form style="border: 5px solid #AED6F1;width:50%; background-color:#AED6F1" method="POST" action="{{route('formation.store')}}">
                <div style="background-color: white; width:50%">
                @csrf
                <label for="">Nom</label><br>
                <input type="text" required name="nom" placeholder="Nom"><br><br>
                <label for="">Duree</label><br>
                <input type="text" required name="duree" placeholder="Duree"><br><br>
                <label for="">Description</label><br>
                <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>
                <label for="">Is Started</label><br>
                <input type="number" required name="isStarted" ><br><br>
                <label for="">Date de debut</label><br>
                <input type="date" required name="date_debut" ><br><br>
                <input type="submit" name="" value="Ajouter"><br>
            </div>

            </form><br><br><br>
            <div style="background:grey; border-radius:10px;padding:5px; width:95%">
        <h2 style="font-weight:bold;font-size:20px; color:white; text-align:center">Graphe représentant les formations en cours et en attente </h2>    
        </div>  
        <br><br>
        <div style="width: 70%; background:#AED6F1; padding:5%; border-radius:10px">
            <div id="piechart" style="width: 900px; height: 500px"></div>
        </div>
        </center>
        
       
    </body>
</html>