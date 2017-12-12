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

	if($status == "pending")
	{

		$displayResult .= '
			<center>
			<form method="post" id="update_status">
				<p><input type="button" value="Accept" class="btn btn-primary btn-sm" name="accept" id="accept" onclick="updateStatus(1)" style="margin-right:10px;" />
				<input type="button" value="Reject" class="btn btn-danger btn-sm" name="reject" id="reject" onclick="updateStatus(0)" style="margin-left:10px;" /></p>
			</form>
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