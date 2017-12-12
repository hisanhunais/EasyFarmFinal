<?php
if(isset($_POST['orderno']))
{
	require '../../controller/connect.php';
	$displayResult = '';
	$status = '';
	$query = "SELECT * FROM ordertable WHERE Ord_No = '".$_POST['orderno']."'";
	$result = mysqli_query($conn,$query);
	$displayResult .= '
	<div class = "table-responsive">
		<table class = "table table-bordered">';
	while ($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
		$displayResult .= '
			<tr>
				<td width="50%"><label>Order Number</label></td>
				<td width="50%">'.$row["Ord_No"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Date</label></td>
				<td width="50%">'.$row["Ord_Date"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Product</label></td>
				<td width="50%">'.$row["Product"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Quantity</label></td>
				<td width="50%">'.$row["Quantity"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Total</label></td>
				<td width="50%">'.$row["Ord_Total"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Buyer</label></td>
				<td width="50%">'.$row["buyer_username"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Status</label></td>
				<td width="50%">'.$row["status"].'</td> 
			</tr>
		';


	}

	$displayResult .= "</table></div>";

	echo $displayResult;
}
?>

