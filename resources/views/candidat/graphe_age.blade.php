<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Candidat', 'Age'],
          <?php echo $chartData;?>
        ]);

        var options = {
          title: 'Graphe représentant le tranche d\'âge'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body style="background-color:#AED6F1">
    <div id="piechart" style="width: 900px; height: 500px"></div>
  </body>
</html>
