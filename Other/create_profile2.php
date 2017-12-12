<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#7f8c8d">

	<div id = "main-wrapper">
		<center>
			<h2>SignUp Form</h2>
			<img src = "Images/loginImg.png" width="100px"/>
		</center>
	
	
	<form class="myform" action="signup.php" method="post">
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
		<input name="submit_btn" type="submit" id="signup2_btn" value="Sign Up"/><br>
		<a href = "index.php"><input type="button" id="back_btn" value="Back"/></a>
	</form>
	
	<?php
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type = "text/javascript">alert("dsa")</script>';
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$addressNo = $_POST['addressNo'];
			$addressStreet = $_POST['addressStreet'];
			$addressCity = $_POST['addressCity'];
			$contactno = $_POST['contactno'];
			$type = "Farmer";
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			if($password==$cpassword)
			{
				$query = "SELECT * FROM login WHERE username='$username'";
				$query_run = mysqli_query($con,$query);
				
				
				if(mysqli_num_rows($query_run)>0)
				{
					echo '<script type = "text/javascript">alert("User already exists.... Try another username")</script>';
				}
				else
				{
					$query = "INSERT INTO login VALUES('$username','$firstname','$lastname','$addressNo','$addressStreet','$addressCity','$password','$contactno','$type')";
					$query_run = mysqli_query($con,$query);
					
					if($query_run)
					{
						header("location:agrariancreatepro.php");
						echo '<script type = "text/javascript">alert("User Registered.")</script>';
						
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error!!!")</script>';
					}
				}
				
				
			}
			else
			{
				echo '<script type = "text/javascript">alert("Password and Confirm Password does not match.")</script>';
			}
		}
	?>
	
	</div>
</body>
</html>