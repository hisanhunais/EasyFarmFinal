<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#7f8c8d">

	<div id = "main-wrapper">
		<center>
			<h2>Reset Password</h2>
			<img src = "Images/loginImg.png" width="100px"/>
		</center>
		<form class="myform" action="reset_password.php" method="post">
		<p>We have send you a number to  your mobile</p>
		<label><b>Enter the number you have received </b></label>
		<input name="digit" type="text" class="inputvalues" placeholder="Type the number you have received" required/><br>
		<label><b>New Password</b></label>
		<input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" class="inputvalues" placeholder="Your password (use letters,numbers and atleast 8 characters)"" title="Must contain at least one number and one  lowercase letter, and at least 8 or more characters" required/><br>
		<label><b>Confirm New Password</b></label>
		<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" /><br>
		<input name="reset_password" type="submit" id="signin_btn" value="Reset Password"/><br>
		</form>	
		<?php
		if(isset($_POST['reset_password']))
		{
			
			$hash = $_POST['digit'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$contactNo=$_SESSION['contactno'];
			
			$query = "SELECT * FROM login WHERE hash = '$hash'";
			$query_run = mysqli_query($con,$query);
			
			if ($query_run){
				if($password==$cpassword){
					$password = sha1($password);
					$query1 ="UPDATE login SET password='$password' WHERE hash='$hash' ";
					$query_run1 = mysqli_query($con,$query1);
					if($query_run1){
						$hash=substr($password,0,5);
						$query2 ="UPDATE login SET hash='$hash' WHERE contactNo='$contactNo' ";
						$query_run2 = mysqli_query($con,$query2);

						if($query_run2)
						{
						header("location:index.php");
						echo '<script type = "text/javascript">alert("Password reset successfully.")</script>';
						
						}
						else
						{
							echo '<script type = "text/javascript">alert("Error1!!!")</script>';
						}
					}
					else
					{
						echo '<script type = "text/javascript">alert("Error2!!!")</script>';
						}
				}
				else
					{
					echo '<script type = "text/javascript">alert("Password and Confirm Password does not match.")</script>';
					}

				//header("location: changepassword.php");
			}
			else
				{
				echo '<script type = "text/javascript">alert("Error3!!!")</script>';
				}
		}
	
	?>
	</div>
</body>


