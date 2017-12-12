<!DOCTYPE html>
<html>
<head>
	<title>Add Paddy</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">

<body>

	


	<div class="content">
		

		<div class="form">

				<b><h4>
				<form method="POST" action="model/addnewpaddy.php">
			
				<table border="0" class="table table-stripped table-hover">
				
					
				
				 
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Paddy Type</td>
					<td width="100px"></td>
					<td>
					<select name="paddy_type" class="inputvalues">
						<option value="Samba" >Samba</option>
						<option value="Keeri Samba">Keeri Samba</option>
						<option value="Basmathi">Basmathi</option>
						<option value="Red Nadu">Red Naadu</option>
						<option value="Red Samba">Red Samba</option>
						<option value="Nadu">Nadu</option>
						<option value="Kalu Heenati">Kalu Heenati</option>
						<option value="Murugakayan">Murungakayan</option>
						<option value="Kuruwee">Kuruwee</option>
						<option value="Gonabaru">Gonabaru</option>
						<option value="Dhikwee">Dhikwee</option>
						<option value="Suwandel">Suwandel</option>

						
						
					</select>
					</td>
				</tr>
                    <tr><td height="50px" colspan="3"></td></tr>
                    <tr >
                        <td >Price per kg (Rs)</td>
                        <td width="100px"></td>
                        <td ><input type="text" class="inputvalues" name="paddy_price" size="10" maxlength="10" required></td>
                    </tr>
                    <tr><td height="50px" colspan="3"></td></tr>
				<tr >
				 	<td >Quantity  (in kg)</td>
					<td width="100px"></td>
					<td ><input type="number" class="inputvalues" name="paddy_quantity" size="10" maxlength="10" required></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
									
 					<td>Date</td>
					<td width="100px"></td>
					<td ><input type="text" class="inputvalues" name="paddy_date" value=<?php echo date("Y-m-d")?> readonly></td>
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