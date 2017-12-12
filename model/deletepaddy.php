<?php

		require "../dbconfig/config.php";



			$paddy_id = $_GET['id'];
			$sql="DELETE FROM `paddy` WHERE Paddy_ID='$paddy_id'";

			$res=mysqli_query($con,$sql);
			if($res){
				echo'<script language ="javascript">';
		        echo'alert("Record deleted succesfully")';
		        echo'</script>';

			}else{
				echo'<script language ="javascript">';
		        echo'alert("Cannot Delete. Try Again")';
		        echo'</script>';
			}
            header('location:../harvestScreen.php');
?>