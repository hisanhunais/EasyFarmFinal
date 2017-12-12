<?php
	require '../../controller/connect.php';
 session_start();
$sessionID=$_SESSION["username"];

	if(isset($_POST['del_ID']))
	{
		$query = "SELECT * FROM login WHERE username= '".$_POST['del_ID']."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
?>