<?php
	require '../../controller/connect.php';

	if(isset($_POST['fertilizerID']))
	{
		$query = "SELECT * FROM announcement WHERE An_ID = '".$_POST['fertilizerID']."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
?>