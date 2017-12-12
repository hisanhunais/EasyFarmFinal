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
				<form method="POST" action="../model/upd.php">
			
				<table border="0" class="table table-stripped table-hover">
					

				<tr><td height="50px" colspan="3"></td></tr>
				<tr >
				 	<td >Paddy ID</td>
					<td width="100px"></td>
					<td ><input type="text" name="Paddy_ID" size="10" maxlength="10" value=<?php echo $_GET['id']; ?>></td>
				</tr>
                   <tr><td height="50px" colspan="3"></td></tr>
				<tr>
					<td>Paddy Type</td>
					<td width="100px"></td>
					<td>
					<select name="paddy_type">
						<option value="samba" >Samba</option>
						<option value="ksamba">Keeri Samba</option>
						<option value="Basmathi">Basmathi</option>
						<option value="rnadu">Red Naadu</option>
						<option value="rsamba">Red Samba</option>
						<option value="nadu">Nadu</option>
						<option value="kheenati">Kalu Heenati</option>
						<option value="muru">Murungakayan</option>
						<option value=kuruw"">Kuruwee</option>
						<option value="gonab">Gonabaru</option>
						<option value="dhikwee">Dhikwee</option>
						<option value="suwandel">Suwandel</option>

						
						
					</select>
					</td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
                    <tr >
                        <td >Price per kg</td>
                        <td width="100px"></td>
                        <td ><input type="text" name="paddy_price" size="10" maxlength="10"></td>
                    </tr>
                    <tr><td height="50px" colspan="3"></td></tr>
				<tr >
				 	<td >Quantity  (in kg)</td>
					<td width="100px"></td>
					<td ><input type="text" name="paddy_quantity" size="10" maxlength="10"></td>
				</tr>
				<tr><td height="50px" colspan="3"></td></tr>
				<tr>
									
 					<td>Date</td>
					<td width="100px"></td>
					<td ><input type="Date" name="paddy_date"></td>
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
