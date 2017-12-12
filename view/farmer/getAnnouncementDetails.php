<?php
if(isset($_POST['anid']))
{
	require '../../controller/connect.php';
	$displayResult = '';
	$query = "SELECT * FROM announcement WHERE An_ID = '".$_POST['anid']."'";
	$result = mysqli_query($conn,$query);
	$displayResult .= '
	<div class = "table-responsive">
		<table class = "table table-bordered">';
	while ($row = mysqli_fetch_row($result))
	{
		$displayResult .= '
			<tr>
				<td width="30%"><label>Date</label></td>
				<td width="70%">'.$row[1].'</td> 
			</tr>
			<tr>
				<td width="30%"><label>Time</label></td>
				<td width="70%">'.$row[2].'</td> 
			</tr>
			<tr>
				<td width="30%"><label>Category</label></td>
				<td width="70%">'.$row[3].'</td> 
			</tr>
			<tr>
				<td width="30%"><label>Title</label></td>
				<td width="70%">'.$row[4].'</td> 
			</tr>
			<tr>
				<td width="30%"><label>Description</label></td>
				<td width="70%">'.$row[5].'</td> 
			</tr>
			
		';


	}

	$displayResult .= "</table></div>";

	echo $displayResult;
}
?>
