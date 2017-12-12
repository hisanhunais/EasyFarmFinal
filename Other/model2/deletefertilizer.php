<?php

		require "../controller/connect.php";



			$fertilizer_id =$_GET['id'];
			$sql="DELETE FROM `fertilizer` WHERE Fer_ID='$fertilizer_id'";
			$res=mysqli_query($conn,$sql);
			if($res){
				echo'<script language ="javascript">';
		        echo'alert("Deleted succesfully")';
		        echo'</script>';
			}else{
				echo'<script language ="javascript">';
		        echo'alert("Cannot Delete . Try Again")';
		        echo'</script>';
			}

header('location:../view/viewfertilizer.php');
?>