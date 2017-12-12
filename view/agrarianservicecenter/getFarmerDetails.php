<?php
 session_start();
$sessionID=$_SESSION["username"];

if(isset($_POST['del_ID']))
{
	require '../../controller/connect.php';
	$displayResult = '';
	$query = "SELECT username,firstName,lastName,addressNo,addressStreet,addressCity,password,contactNo FROM login WHERE username = '".$_POST['del_ID']."'";
	$result = mysqli_query($conn,$query);
	$displayResult .= '
	<div class = "table-responsive">
		<table class = "table table-bordered">';
	while ($row = mysqli_fetch_row($result))
	{
		$displayResult .= '
			<tr>
				<td width="30%"><label>First Name</label></td>
				<td width="70%">'.$row[1].'</td> 
			</tr>
			<tr>
				<td width="30%"><label>Last Name</label></td>
				<td width="70%">'.$row[2].'</td> 
			</tr>
			<tr>
				<td width="30%"><label>Address</label></td>
				<td width="10%">'.$row[3].", ".$row[4].", ".$row[5].'</td> 
				
			</tr>
			<tr>
				<td width="30%"><label>Password</label></td>
				<td width="70%">'.$row[6].'</td> 
			</tr>
			<tr>
				<td width="30%"><label>Contact No</label></td>
				<td width="70%">'.$row[7].'</td> 
			</tr>
			
		';


	}

	$displayResult .= "</table></div>";

	echo $displayResult;
}
?>
