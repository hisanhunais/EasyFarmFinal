<?php
	require '../../dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Transporter</title>
<link rel="stylesheet" href="../../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function PreviewImage()
	{
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("imgLink1").files[0]);
		oFReader.onload = function(oFREvent)
		{
			document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
	};
</script>
</head>
<body style="background-color:#7f8c8d">

	<div id = "main-wrapper">
		<form class="myform" action="vehicleRegistration.php" method="post" enctype="multipart/form-data">
		<center>
			<h2>Vehicle Registration Form</h2>
			<div>
				<img id="uploadPreview" src="http://placehold.it/320x150" alt="" width="320px" height="150px">
				<input type="hidden" name="attachdata" id="attachdata">
				<br>
				<input type="file" id="imgLink1" name="imgLink1" accept=".jpg,.jpeg,.png" onchange="PreviewImage();">
			</div>
		</center>
		<br>
		<label><b>Vehicle Number</b></label>
		<input name="vehno" type="text" class="form-control" placeholder="Ex: AA-1234, 432-1432" required/><br>
		<label><b>Make</b></label>
		<input name="make" type="text" class="form-control" placeholder="Ex: Mitsubhishi, Nissan" required/><br>
		<label><b>Model</b></label>
		<input name="model" type="text" class="form-control" placeholder="Ex: Canter, Cargo" required/><br>
		<label><b>Capacity</b></label>
		<input name="capacity" type="number" class="form-control" placeholder="Enter Capacity in Kg" required/><br><br>
		
		<input name="reg_btn" type="submit" id="signup2_btn" value="Register" /><br>
		<a href = "../../index.php"><input type="button" id="back_btn" value="Back"/></a>
	</form>
	 
	<?php
		if(isset($_POST['reg_btn']))
		{

			// echo '<script type = "text/javascript">alert("dsa")</script>';

			$img_name = $_FILES['imgLink1']['name'];
			$img_size = $_FILES['imgLink1']['size'];
			$img_tmp = $_FILES['imgLink1']['tmp_name'];
			$directory = "uploads/";
			$target_file = $directory.$img_name;
			$db_file = "../../".$target_file;

			move_uploaded_file($img_tmp, $db_file);
			
			$vehno = $_POST['vehno'];
			$make = $_POST['make'];
			$model = $_POST['model'];
			$capacity = $_POST['capacity'];
			$username = "Saman";

			 	$query = "SELECT * FROM vehicle WHERE vehicle_No ='$vehno'";
			 	$query_run = mysqli_query($con,$query);
				
				
			 	if(mysqli_num_rows($query_run)>0)
			 	{
			 		echo '<script type = "text/javascript">alert("Vehicle Number exists.... Please Check again!!!")</script>';
			 	}
			 	else
			 	{
			 		$query = "INSERT INTO vehicle VALUES('$vehno','$make','$model','$capacity','$target_file','$username')";
					$query_run = mysqli_query($con,$query);
					
			 		if($query_run)
			 		{
			 			header("location:../../index.php");
			 			echo '<script type = "text/javascript">alert("Vehicle Registered.")</script>';
						
			 		}
			 		else
			 		{
			 			echo '<script type = "text/javascript">alert("Error!!!")</script>';
			 		}
			 	}
			
		}
	?>
	
	</div>
</body>
</html>