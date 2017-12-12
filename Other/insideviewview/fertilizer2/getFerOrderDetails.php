<?php
if(isset($_POST['orderno']))
{
	require '../../controller/connect.php';
	$displayResult = '';
	$status = '';
	$query = "SELECT * FROM fer_ordertable WHERE Order_id = '".$_POST['orderno']."'";
	$result = mysqli_query($conn,$query);
	$displayResult .= '
	<div class = "table-responsive">
		<table class = "table table-bordered">';
	while ($row = mysqli_fetch_array($result))
	{
		$status = $row['Status'];
		$displayResult .= '
			<tr>
				<td width="50%"><label>Order Number</label></td>
				<td width="50%">'.$row["Order_id"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Date</label></td>
				<td width="50%">'.$row["Fer_date"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Type of Fertilizer</label></td>
				<td width="50%">'.$row["Fer_type"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Quantity</label></td>
				<td width="50%">'.$row["Fer_quantity"].' '.$row["Unit_type"].'</td> 
			</tr>
			
			<tr>
				<td width="50%"><label>Buyer</label></td>
				<td width="50%">'.$row["Buyer_username"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Status</label></td>
				<td width="50%">'.$row["Status"].'</td> 
			</tr>
		';


	}

	$displayResult .= "</table></div>";

	if($status == "pending")
	{

		$displayResult .= '
			<center>
			
			</center>
			';		
	}
	echo $displayResult;
}
?>

 <script type="text/javascript">
	function updateStatus(status){
		
	}
</script>