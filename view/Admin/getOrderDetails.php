<?php
if(isset($_POST['UserName']))
{
	require '../../controller/connect.php';
	$displayResult = '';
	$status = '';
	$query = "SELECT * FROM login WHERE username = '".$_POST['UserName']."'";
	$result = mysqli_query($conn,$query);
	$displayResult .= '
	<div class = "table-responsive">
		<table class = "table table-bordered">';
	while ($row = mysqli_fetch_array($result))
	{
		$status = $row['type'];
		$displayResult .= '
			<tr>
				<td width="50%"><label>User Name</label></td>
				<td width="50%">'.$row["username"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>First Name</label></td>
				<td width="50%">'.$row["firstName"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Last Name</label></td>
				<td width="50%">'.$row["lastName"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Address Number</label></td>
				<td width="50%">'.$row["addressNo"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Address Street</label></td>
				<td width="50%">'.$row["addressStreet"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Address City</label></td>
				<td width="50%">'.$row["addressCity"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Contact NUmber</label></td>
				<td width="50%">'.$row["contactNo"].'</td> 
			</tr>
			<tr>
				<td width="50%"><label>Type</label></td>
				<td width="50%">'.$row["type"].'</td> 
			</tr>

			
		';


	}

	$displayResult .= "</table></div>";

	if($status == "millOwner")
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