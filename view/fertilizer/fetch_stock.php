<?php
	require '../../controller/connect.php';
	
	if(isset($_POST['fertilizerID1'])){

		$query = "SELECT * FROM fertilizer WHERE Fer_ID = '".$_POST['fertilizerID1']."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
	
?>