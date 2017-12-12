<?php
	require "dbconfig/config.php";

		if(isset($_POST['submitLoc']))
		{
			$latitude = $_POST['lat'];
			$longitude = $_POST['lng'];
			$username = "KamalPerera";
			$query = "UPDATE loginaa SET latitude = '$latitude', longitude = '$longitude' WHERE username = '$username'";
			$query_run = mysqli_query($con,$query);
			
			if ($query_run){
				header("location: index.php");
			}
				
			
			
			else
			{
				echo '<script type = "text/javascript">alert("Error Occured.")</script>';
			}


		}
?>