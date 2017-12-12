<?php 
	require '../../dbconfig/config.php';
	
	$ordno = $_GET['id'];
	$status = $_GET['status'];

	if($status == "Pending")
	{
		$sql1 = "UPDATE delivery SET status = 'Started' WHERE ord_ID = '".$ordno."'";
		$rs_result1 = mysqli_query($con,$sql1);

		$sql2 = "UPDATE ordertable SET status = 'Dispatched' WHERE Ord_No = '".$ordno."'";
		$rs_result2 = mysqli_query($con,$sql2);
	}
	
	if($status == "Started")
	{
		$sql1 = "UPDATE delivery SET status = 'Completed' WHERE ord_ID = '".$ordno."'";
		$rs_result1 = mysqli_query($con,$sql1);

		$sql2 = "UPDATE ordertable SET status = 'Completed' WHERE Ord_No = '".$ordno."'";
		$rs_result2 = mysqli_query($con,$sql2);
	}

	header("location:delivery.php");

?>