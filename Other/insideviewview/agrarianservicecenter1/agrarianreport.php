<?php
require '../../controller/connect.php';
session_start();
$sessionID=$_SESSION{"username"};
//get the current year
$today=Date("Y-m-d");
list($yr,$month,$day) = explode('-', $today);
$year_new=$yr+1;
$select_year=$yr."/".$year_new;
//select queries for charts
//pie chart_production
    $qur = "SELECT * FROM paddytype_graph WHERE year LIKE '$select_year' AND username='total'";
    $result = mysqli_query($conn, $qur);
//pie chart sales
$qur_sales = "SELECT * FROM sales_typegraph WHERE year_sales LIKE '$select_year'";
$result_sales = mysqli_query($conn, $qur_sales);
//column chart sales
$qur_season = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE '$select_year' and username='total'";
$result_season = mysqli_query($conn, $qur_season);


?>
<?php
  include ('../../controller/func_agcnew.php');
//include ('../../controller/func_agcgraph.php');
//<?php
//  //session_start();
//>>>>>>> dda8576583d5497a92bfbe8a7eef899180552343
//?>





<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>Agrarian Service Center</title>
        <!--pie chart for total paddytype prodction-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Paddy Type', 'Production'],
                    <?php
                    while ($row=mysqli_fetch_array($result)){

                        echo "['".$row['Paddy_type']."',".$row['production_inton']."],";
                    }
                    ?>
                ]);

                var options = {
                    title: 'Percentage of paddy production for the period',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>
        <!--pie chart for total paddytype sales-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Paddy Type', 'Sales'],
                    <?php
                    while ($row=mysqli_fetch_array($result_sales)){
                        echo "['".$row['Paddy_type']."',".$row['in_ton']."],";
                    }
                    ?>
                ]);

                var options = {
                    title: 'Percentage of paddy sales for the period',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart_sales'));
                chart.draw(data, options);
            }
        </script>
        <!-- column chart  for seasonal production-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Paddy Season', 'Production'],
                    <?php
                    while ($row=mysqli_fetch_array($result_season)){
                        if ($row['season']!='all') {
                            echo "['" . $row['season'] . "'," . $row['Total_Pro'] . "],";
                        }
                    }
                    ?>
                ]);

                var options = {
                    chart: {
                        title: 'Seasonal Production for the period',

                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>

    <!-- Bootstrap core CSS -->
      <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../css/homepage.css" rel="stylesheet">

    <script

        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous">

      </script>
        <style type="text/css">
            #chart-container{
                width: 640px;
                height:auto;
            }
        </style>



    </head>

    <body>

    <?php include 'header.php'; ?>

    <section id="main">
        <div class="container-fluid">
            <div class="row">
              <!-- include side bar -->
                <div class="col-md-3">
                     <?php include 'sidebar.php'; ?>
                </div>

          <div class="col-md-9">
            <div class="panel panel-default">
                      <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Reports</h3>

                      </div>

                <div class="panel-body">
                <div class="row">

                  <div class = "col-md-12" id="loadSection">

                      <div>

                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#farmers">Production Report</a></li>
                              <li><a data-toggle="tab" href="#sales">Paddy Sales</a></li>
                              <li><a data-toggle="tab" href="#other">Farmer Profiles and Other</a></li>



                          </ul>
                          <?php
                          require '../../controller/connect.php';
                          include 'include_tabs.php';
                          ?>



                  </div>
                  </div>


    </section>

    <?php include 'footer.php'; ?>



    <!-- Placed at the end of the document so the pages load faster -->
<!---->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<!---->
<!--    <script src="js/bootstrap.min.js"></script>-->
                  </div>

                </div>

                </div>
    </body>
</html>

