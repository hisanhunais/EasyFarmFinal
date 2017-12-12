<?php
require '../../controller/connect.php';
// $sessionID=$_SESSION["username"];
$sessionID="KamalPerera";
//get the current year
$today=Date("Y-m-d");
list($yr,$month,$day) = explode('-', $today);
$year_new=$yr+1;
$select_year=$yr."/".$year_new;

//select queries for charts
//pie chart_production
$qur = "SELECT * FROM paddytype_graph WHERE year LIKE '$select_year' AND username='$sessionID'";
$result = mysqli_query($conn, $qur);
//pie chart sales
//$qur_sales = "SELECT * FROM sales_typegraph WHERE year_sales LIKE '$select_year' AND username='$sessionID'";
//$result_sales = mysqli_query($conn, $qur_sales);
$qur_sales = "SELECT * FROM sales_typegraph WHERE year_sales LIKE '$select_year'";
$result_sales = mysqli_query($conn, $qur_sales);
//column chart season
$qur_season = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE '$select_year' AND username='$sessionID'";
$result_season = mysqli_query($conn, $qur_season);
////Line chart season
//$qur_line = "SELECT * FROM fertilizer_purchases WHERE status='Completed' AND buyer_username LIKE '%$sessionID%'";
//$result_line = mysqli_query($conn, $qur_line);

?>

<?php
//session_start();
//?>
<?php
include ('../../controller/func_farmerpaddy.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Farmer</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="../../css/bootstrap.min.css" rel="stylesheet">-->

    <link href="../../css/homepage.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>-->



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
                while ($row=mysqli_fetch_array($result_line)){
                                echo "['".$row['year_purchases']."',".$row['purchases']."],";
                            }
                ?>
            ]);

            var options = {
                chart: {
                    title: 'Seasonal Production for the period',

                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_fertilizer'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>

<body>
<!--<nav class = "navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="homefe.php">EasyFarm</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">WELCOME</a></li>
                <li><a href="index.php">LogOut</a></li>
            </ul>
        </div>
    </div>
</nav>

<header id="header" style="background: #333333; color: #ffffff; padding-bottom: 10px; margin-bottom: 10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Home <small>Farmer</small></h1>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
</header>

<section id="breadcrumb">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="active">Farmer Profile</li>
        </ol>
    </div>
</section>-->
<?php
require_once '../../controller/connect.php'

?>
<?php include 'header.php'; ?>

<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <?php include 'sidebar.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                      <h3 class="panel-title">Farmer Report</h3>

                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class = "col-md-12" id="loadSection">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#farmers">Production Report</a></li>
                                    <li><a data-toggle="tab" href="#sales">Paddy Sales</a></li>
                                    <li><a data-toggle="tab" href="#fertilizerSellers">Fertilizer Purchases</a></li>



                                </ul>
                            <?php
                            require '../../controller/connect.php';
                            include 'include_agrarian.php';
                            ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<footer id="footer" style="background: #333333; color: #ffffff; text-align: center; padding: 30px; margin-top: 30px;">
	<p>Copyright Group 40, &copy; 2017</p>
</footer>-->
<?php include 'footer.php'; ?>




<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
</body>
</html>



<!--<!DOCTYPE html>-->
<!--<html>-->

<!--<head>-->
<!--	<title></title>-->
<!--	<meta charset="UTF-8">-->
<!--    <title>Paddy Dashboard </title>-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>-->
<!---->
<!--</head>-->
<!--<body>-->


<!--</body>-->
<!--</html>-->
