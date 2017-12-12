<!DOCTYPE html>
<html>
<head>
	<title>Update Paddy</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">


<body>

	

	
	<div class="content">
		

		<div class="form">

				<b><h4>
				<form method="POST" action="model/upd.php">
			
				<table border="0" class="table table-stripped table-hover">
					

				<tr><td height="50px" colspan="3"></td></tr>
				<tr >
				 	<td >Paddy ID</td>
					<td width="100px"></td>
					<td ><input type="text" name="Paddy_ID" size="10" maxlength="10" value=<?php echo $_GET['id']; ?> readonly></td>
				</tr>
                   <tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Paddy Type</td>
					<td width="100px"></td>
					<td>
					<select name="paddy_type">
						<option value="Samba" <?php //if ($row['type'] == 'Samba') echo ' selected="selected"'; ?>>Samba</option>
						<option value="Keeri Samba" <?php //if ($row['type'] == "Keeri Samba") echo ' selected="selected"'; ?>>Keeri Samba</option>
						<option value="Basmathi" <?php //if ($row['type'] == 'Basmathi') echo ' selected="selected"'; ?>>Basmathi</option>
						<option value="Red Nadu" <?php //if ($row['type'] == 'Red Naadu') echo ' selected="selected"'; ?>>Red Naadu</option>
						<option value="Red Samba" <?php //if ($row['type'] == 'Red Samba') echo ' selected="selected"'; ?>>Red Samba</option>
						<option value="Nadu" <?php //if ($row['type'] == 'Nadu') echo ' selected="selected"'; ?>>Nadu</option>
						<option value="Kalu Heenati" <?php //if ($row['type'] == 'Kalu Heenati') echo ' selected="selected"'; ?>>Kalu Heenati</option>
						<option value="Murugakayan" <?php //if ($row['type'] == 'Murungakayan') echo ' selected="selected"'; ?>>Murungakayan</option>
						<option value="Kuruwee" <?php //if ($row['type'] == 'Kuruwee') echo ' selected="selected"'; ?>>Kuruwee</option>
						<option value="Gonabaru" <?php //if ($row['type'] == 'Gonabaru') echo ' selected="selected"'; ?>>Gonabaru</option>
						<option value="Dhikwee" <?php //if ($row['type'] == 'Dhikwee') echo ' selected="selected"'; ?>>Dhikwee</option>
						<option value="Suwandel" <?php //if ($row['type'] == 'Suwandel') echo ' selected="selected"'; ?>>Suwandel</option>

						
						
					</select>
					</td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
                    <tr >
                        <td >Price per kg</td>
                        <td width="100px"></td>
                        <td ><input type="text" name="paddy_price" size="10" maxlength="10" value=<?php echo $_GET['price']; ?>></td>
                    </tr>
                    <tr><td height="50px" colspan="3"></td></tr>
				<tr >
				 	<td >Quantity  (in kg)</td>
					<td width="100px"></td>
					<td ><input type="text" name="paddy_quantity" size="10" maxlength="10" value=<?php echo $_GET['quantity']; ?>></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
									
 					<td>Date</td>
					<td width="100px"></td>
					<td ><input type="Date" name="paddy_date" value=<?php echo $_GET['date']; ?>></td>
				</tr>
				
				
				<tr><td height="50px" colspan="3"></td></tr>
				<tr> 
					
					
					<td ><center></center></td>
					<td width="100px"></td>
					<td><center><input type="Submit" name="bpaddy" value="Submit" class="btn btn-primary">   </center></td>
				</tr>
				</table>
			
				</form>
				</h4>
				</b>
	</div>
	

	
</body>
</html>
