<!DOCTYPE html>
	<head>
		<title>Web Based Farm Assistance System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
	</head>
	<body>
	<div class="content">
		<center><h1> Update Announcement</h1></center>
		<br>
		

		<div class="form">

				<b><h4>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			
				<table border="0" >
				<tr>
					<td colspan="2" class="table table-stripped table-hover"></td>
				

				</tr>
					
				<tr >
				 	<td >Announcement ID</td>
					<td width="100px"></td>
					<td ><input type="integer" name="An_ID" size="30" maxlength="50"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>	
				<tr >
				 	<td >Topic</td>
					<td width="100px"></td>
					<td ><input type="text" name="Topic" size="30" maxlength="50"></td>
				</tr> 
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Category</td>
					<td width="100px"></td>
					<td>
					<input type="text" name="Category" size="30" maxlength="75">
					</td>
				</tr>
				
				<tr><td height="50px" colspan="3"></td></tr>
				<tr> 
					
 					<td>Date</td>
					<td width="100px"></td>
					<td ><input type="Date" name="Date" size="30" maxlength="75"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Time</td>
					<td width="100px"></td>
					<td ><input type="time" name="Time" size="30" maxlength="75"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Description</td>
					<td width="100px"></td>
					<td ><input type="textarea" name="Description" size="30" maxlength="75"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				
				
				
				<tr> 
					
					
					<td ><center></center></td>
					<td width="100px"></td>
					<<td><center><input type="Submit" value="Update" name="announcement" class="btn btn-primary">
				</table>
			
				</form>
				</h4>
				</b>
	</div>	
	</body>
</html>