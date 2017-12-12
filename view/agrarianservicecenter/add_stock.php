<?php
	require '../../controller/connect.php';
	session_start();
$sessionID=$_SESSION["username"];


	if(!empty($_POST))
	{
		$output = '';
		$message = '';

		if(isset($_POST['submit']))
		{
			$An_ID=$_POST['deletedata'];
			$query = "DELETE FROM announcement WHERE An_ID = '$An_ID'";
			$res=mysqli_query($conn, $query);

 			header('location:agrarianannouncement.php');
		}
	}


			if($_POST['update_ID'] != '')
		{
			$category = mysqli_real_escape_string($conn,$_POST['category']);
			$topic = mysqli_real_escape_string($conn,$_POST['topic']);
			$editor1 = mysqli_real_escape_string($conn,$_POST['editor1']);
			
			$query = "UPDATE announcement SET Paddy_price = '$price1', Paddy_quantity = '$newqty' WHERE Paddy_ID = '".$_POST['paddyID1']."'";
			$message = "Data Updated";
				
		}

?>