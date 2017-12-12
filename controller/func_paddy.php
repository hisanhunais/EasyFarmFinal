<?php
	require '../../controller/connect.php';

	function insertPaddy(){
		require '../../controller/connect.php';
		if(isset($_POST['insertpaddy']))
		{
			$paddytype = mysqli_real_escape_string($conn, $_REQUEST['paddy_type']);
			$paddyprice = mysqli_real_escape_string($conn, $_REQUEST['paddy_price']);
			$paddyquantity = mysqli_real_escape_string($conn, $_REQUEST['paddy_quantity']);
			 
			// attempt insert query execution

			$sql = "INSERT INTO paddy (`Paddy_type`,`Paddy_price`,`Paddy_quantity`,`Paddy_date`) VALUES ('$paddytype','$paddyprice','$paddyquantity',now())";
			if(mysqli_query($conn, $sql)){
			    
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			header('location:../view/paddy.php');
			// Close connection
			mysqli_close($conn);					
		}
	}
	function deletepaddy($paddyID){
			require '../../controller/connect.php';
			//$paddy_id = $_GET['id'];
			$paddy_id = $paddyID;
			$sql="DELETE FROM `paddy` WHERE Paddy_ID='$paddy_id'";
			$res=mysqli_query($conn,$sql);
			header('location:harvest.php');

	}
	function updatepaddy(){
		if(isset($_POST['updatepaddy'])){
			require '../../controller/connect.php';
			$paddy_id = $_POST['id'];
			$sql="UPDATE FROM `paddy` WHERE Paddy_ID='$paddy_id'";

			$res=mysqli_query($conn,$sql);
			header('location:../view/paddy.php');
		}

	}
	function updatepaddysinhala(){
		require '../controller/connect.php';
		if(isset($_POST['updatepaddy'])){
			$paddy_id = $_GET['id'];
			$sql="UPDATE FROM `paddy` WHERE Paddy_ID='$paddy_id'";

			$res=mysqli_query($conn,$sql);
			if($res){
				header('location:../view/viewpaddysinhala.php');
			}
		}
	}

?>