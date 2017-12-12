<?php
	require '../controller/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
<link rel="stylesheet" href="css/style.css"
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
		<input name="lastname" type="text" class="inputvalues" placeholder="Type your last name" width="50%" required/><br><br>
		<label><b>Contact Number</b></label>
		<input name="contactno" type="text" class="inputvalues" placeholder="Type your contact number" required/><br><br>
		<label><b>Type</b></label>
			<select class = "type" name = "type">
				<option value="Paddy Marketing Board">Paddy Marketing Board</option>
				<option value="Mill Owner">Mill Owner</option>
				<option value="Store Owner">Store Owner</option>
				<option value="Fertilizer Seller">Fertilizer Seller</option>
			</select><br><br>
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
			$contactno = $_POST['contactno'];
			$type = $_POST['type'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			if($password==$cpassword)
			{
				$query = "SELECT * FROM login WHERE username='$username'";
				$query_run = mysqli_query($conn,$query);
				
				
				if(mysqli_num_rows($query_run)>0)
				{
					echo '<script type = "text/javascript">alert("User already exists.... Try another username")</script>';
				}
				else
				{
					$query = "INSERT INTO login VALUES('$username','$firstname','$lastname','$password','$contactno','$type')";
					$query_run = mysqli_query($conn,$query);
					
					if($query_run)
					{
						header("location:index.php");
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