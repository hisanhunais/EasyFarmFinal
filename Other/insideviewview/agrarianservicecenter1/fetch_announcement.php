<?php
	require '../../controller/connect.php';

	if(isset($_POST['An_ID']))
	{
		$query = "SELECT * FROM announcement WHERE An_ID = '".$_POST['An_ID']."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
?>