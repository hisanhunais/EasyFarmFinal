<?php

	require("../../dbconfig/config.php");

	$orderNo = $_POST['acceptdata'];
	$sql = "UPDATE ordertable SET status = 'Delivery Accepted' WHERE Ord_No = '$orderNo'";
	$rs_result = mysqli_query($con,$sql);
	
	


?>

<div class="panel">
	<div class="panel-heading main-color-bg">
		Complete the Delivery
	</div>
	<div class="panel-body">
		You have accepted one Delivery. You can only delivery one order at a time. Once you complete the delivery, other orders will be visible
	</div>
</div>