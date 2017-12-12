<!DOCTYPE html>
<html>
<head>
<title>Select Location</title>
<link rel="stylesheet" href="css/style.css">
<style type="text/css">
          #map{ width:700px; height: 500px; }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRM5CCp0gytfOJaxkwmqxDmyy6-FPPIws"></script>
</head>
<body style="background-color:#7f8c8d">

	<div>
		<center>
			<h2>Select Location</h2>
		
		<p>Click on a location on the map to select it. Drag the marker to change location.</p>
        
        <!--map div-->
        <div id="map"></div>

        <!--our form-->
        <h2>Chosen Location</h2>
        <form method="post" class="myform" action="setLocation.php">
            <input type="text" id="lat" name="lat" readonly="yes" class="form-control" required><br>
            <input type="text" id="lng" name="lng" readonly="yes" class="form-control" required><br>
            <a href = "index.php"><input type="button" id="back_btn" value="Back"/></a>
            <input name="submitLoc" type="submit" id="submitLoc" value="Submit" class="btn btn-primary" />
        </form>
    	</center>
        <script type="text/javascript" src="map.js"></script>
	</div>
</body>
</html>