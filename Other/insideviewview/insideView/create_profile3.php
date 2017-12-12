
<!DOCTYPE html>
<html>
<head>
    <title></title>
	<link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



<div class="container">
    
    <div class="form" >
                <form class="myform" action="model/createfarmer2.php" method="post">
		<label><b>Name</b></label>
		<input name="firstname" type="text" class="inputvalues" placeholder="Type your first name" width = "50%" required/><br>
		<input name="lastname" type="text" class="inputvalues" placeholder="Type your last name" width = "50%" required/><br><br>
		<label><b>Address</b></label>
		<input name="addressNo" type="text" class="inputvalues" placeholder="Type Address Number" width = "50%" required/><br>
		<input name="addressStreet" type="text" class="inputvalues" placeholder="Type Street" width = "50%" required/><br>
		<input name="addressCity" type="text" class="inputvalues" placeholder="Type City" width = "50%" required/><br><br>
		<label><b>Contact Number</b></label>
		<input name="contactno" type="number" class="inputvalues" placeholder="Type your contact number" required/><br><br>
		
		<label><b>Username</b></label>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
		<label><b>Password</b></label>
		<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
		<label><b>Confirm Password</b></label>
		<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
		<input name="submit_btn" type="submit" id="signup2_btn" value="CREATE"/><br>
	</form>
     
       
    </div>
</div>
</div>
</body>
</html>