<!DOCTYPE html>
<html>
<head>
	<title>Update Fertilizer</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta charset="UTF-8">

<body>

	

	
	<div class="content">
		

		<div class="form">

				<b><h4>
				<form method="POST" action="../model/updfertilizer.php">
			
				<table border="0" class="table table-stripped table-hover">
				
					
				
				 
				<tr><td height="50px" colspan="3"></td></tr>
				<tr >
				 	<td >Fertilizer ID</td>
					<td width="100px"></td>
					<td ><input type="text" name="Fertilizer_ID" size="10" maxlength="10" value=<?php echo $_GET['id']; ?>></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Fertilizer Type</td>
					<td width="100px"></td>
					<td>
					<select name="fertilizer_type">
						<option value="Urea" >Urea</option>
						<option value="micro">Micro Nutrients</option>
						<option value="amos">Ammonium Sulfate</option>
						<option value="amor">Ammonium Nitrate</option>
						<option value="sul">Sulphur Dust</option>
						

						
						
					</select>
					</td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>	
				<tr >
				 	<td >Quantity  (in kg)</td>
					<td width="100px"></td>
					<td ><input type="text" name="fertilizer_quantity" size="10" maxlength="10"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
									
 					<td>Date</td>
					<td width="100px"></td>
					<td ><input type="Date" name="fertilizer_date"></td>
				</tr>
				
				
				<tr><td height="50px" colspan="3"></td></tr>
				<tr> 
					
					
					<td ><center></center></td>
					<td width="100px"></td>
					<td><center><input type="Submit" name="bfertilizer" value="Update" class="btn btn-primary">   </center></td>
				</tr>
				</table>
			
				</form>
				</h4>
				</b>
	</div>
	

	
</body>
</html>
