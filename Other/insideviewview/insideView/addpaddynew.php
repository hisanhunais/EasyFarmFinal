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
			
					
					Paddy Type
					
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
					</select><br><br>
					
					Price per kg (Rs)
                    <input type="text" class="inputvalues" name="paddy_price" required><br><br>
                    
				 	Quantity  (in kg)
					
					<input type="text" class="inputvalues" name="paddy_quantity" required><br><br>
				
									
 					Date
					<input type="date" class="inputvalues" name="paddy_date" value=<?php echo date("Y-m-d")?>><br><br>
				
					
					
					
					<center><input type="Submit" name="bpaddy" value="Submit" class="btn btn-primary">   </center>
				
			
				</form>
				</h4>
				</b>
	</div>
	

	
</body>
</html>