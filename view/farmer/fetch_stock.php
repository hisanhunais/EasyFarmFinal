<?php
	require '../../controller/connect.php';

	if(isset($_POST['paddyID']))
	{
		$query = "SELECT * FROM paddy WHERE Paddy_ID = '".$_POST['paddyID']."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
?>