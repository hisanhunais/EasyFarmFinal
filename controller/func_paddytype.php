<?php
	require '../controller/connect.php';

//Paddy type
	function insertpaddytype(){
		if(isset($_POST['addPaddyType"'])){
			$Type_eng = mysqli_real_escape_string($conn, $_REQUEST['paddy_type']);
			$Type_sin = mysqli_real_escape_string($conn, $_REQUEST['paddytype']);

			$sql = "INSERT INTO paddytype (`Paddy_date`,`Paddy_type`,`Type_Sinhala`) VALUES (now(),'$Type_eng','$Type_sin')";
			if(mysqli_query($conn, $sql)){
			   echo "successfull"; 
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			// header('location:../view/viewpaddytype.php');
			// Close connection
			mysqli_close($conn);
		}
	}

	function deletepaddytype(){
		if(isset($_POST['DeletePaddyType'])){
			$paddytype_id = $_GET['id'];
			$sql="DELETE FROM `paddy` WHERE Paddy_ID='$paddytype_id'";
			$res=mysqli_query($conn,$sql);
			header('location:../view/viewpaddytype.php');
		}	
	}


?>