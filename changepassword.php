<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#7f8c8d">

	<div id = "main-wrapper">
		<center>
			<h2>Change My Password</h2>
			<img src = "Images/loginImg.png" width="100px"/>
		</center>

	<form class="myform" action="changepassword.php" method="post">
		<label><b>Username</b></label>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>	
		<label><b>Old Password</b></label>
		<input name="oldpassword" type="password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" class="inputvalues" placeholder="Your password (use letters,numbers and atleast 8 characters)"" title="Must contain at least one number and one  lowercase letter, and at least 8 or more characters" required/><br>
		<label><b>New Password</b></label>
		<input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" class="inputvalues" placeholder="Your password (use letters,numbers and atleast 8 characters)"" title="Must contain at least one number and one  lowercase letter, and at least 8 or more characters" required/><br>
		<label><b>Confirm New Password</b></label>
		<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" /><br>
		<input name="submit_btn" type="submit" id="signup2_btn" value="Set Up New Password"/><br>
		<a href = "index.php"><input type="button" id="back_btn" value="Back"/></a>
	</form>

	<?php
		if(isset($_POST['submit_btn']))
		{		
				$username=$_POST['username'];
				$oldpassword = $_POST['oldpassword'];
				$oldpassword=sha1($oldpassword);
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];

			$query = "SELECT * FROM login WHERE username = '$username' AND password='$oldpassword'";
			$query_run = mysqli_query($con,$query);
			
			if (mysqli_num_rows($query_run)>0){
				
				if($password==$cpassword)
				{
				
					$password = sha1($password);
					$hash=substr($password,0,5);

				$query1 ="UPDATE login SET password='$password',hash='$hash' WHERE username='$username' ";
					$query_run1 = mysqli_query($con,$query1);

					if($query_run1)
					{
						header("location:index.php");
						echo '<script type = "text/javascript">alert("Password reset successfully.")</script>';
						
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error!!!")</script>';
					}
				}
				else
				{
				echo '<script type = "text/javascript">alert("Password and Confirm Password does not match.")</script>';
				}
		}
		else 
			{
				echo '<script type = "text/javascript">alert("Username and Old Password does not match.")</script>';
				}
			}
			
	?>
	</div>
</body>
</html>