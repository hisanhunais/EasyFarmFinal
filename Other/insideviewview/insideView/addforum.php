<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">

<body>

	


	<div class="content">
		

		<div class="form">

				<b><h4>
				<form method="POST" action="../model/addnewdiscussion.php" class="table table-stripped table-hover">
			
				<table border="0">
							
				
				 
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
									
 					<td>Date</td>
					<td width="100px"></td>
					<td ><input type="Date" name="forum_date"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
									
 					<td>Time</td>
					<td width="100px"></td>
					<td ><input type="time" name="forum_time"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Discussion Type</td>
					<td width="100px"></td>
					<td>
					<select name="forum_type">
						<option value="Disease" >Diseases</option>
						<option value="water">Water supply Problems</option>
						<option value="other">Other</option>

						
						
					</select>
					</td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>	
				<tr >
				 	<td >Title</td>
					<td width="100px"></td>
					<td ><input type="text" name="forum_topic" size="10" maxlength="10"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				
				<tr >
				 	<td >Description</td>
					<td width="100px"></td>
					<td ><input type="textarea" name="forum_description" size="10" maxlength="10"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				
				
				<tr> 
					
					
					<td ><center></center></td>
					<td width="100px"></td>
					<td><center><input type="Submit" name="bdis" value="Add Discussion" class="btn btn-primary">   </center></td>
				</tr>
				</table>
			
				</form>
				</h4>
				</b>
	</div>
	

	
</body>
</html>