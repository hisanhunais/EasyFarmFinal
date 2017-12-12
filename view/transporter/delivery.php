<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Transporter</title>

    <style type="text/css">
      html, body{
        /*height: 100%;*/
      }
      #mapPlace{
        /*height: 100%;*/
      }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="../../css/homepage.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=geometry"></script>
  <script type="text/javascript">
  	var loadSection = new google.maps.Polyline({
  		path: [new google.maps.LatLng(37.4419,-122.1419), new google.maps.LatLng(37.4519,-122.1519)],
  		strokeColor: "#FF0000",
  		strokeOpacity: 1.0,
  		strokeWeight: 10,
  		geodesic: true,
  		map: map
  	});
  </script> -->
  

  </head>

  <body>
	
    <!--  <div class="col-md-9" id="loadSection">
          <?php
            //include 'get_delivery_items.php';
          ?>
        </div>-->
        
          
        
	<?php include 'header.php'; ?>
	
	<section id="main">
    <div class="container-fluid" id="cont">
      <div class="row">
        <div class="col-md-3">
                
          <?php include 'sidebar.php'; ?>
        </div>
			  <div class="col-md-9" id="loadSection">
	        <?php
            include 'get_delivery_items.php';
          ?>
        </div>
      </div>
    </div>
  </section>

<?php include 'footer.php'; ?>


	
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>
