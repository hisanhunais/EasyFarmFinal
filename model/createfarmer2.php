<?php
	require("../controller/connect.php");
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
				$query_run = mysqli_query($conn,$query);
				
				
				if(mysqli_num_rows($query_run)>0)
				{
					echo '<script type = "text/javascript">alert("User already exists.... Try another username")</script>';
				}
				else
				{
					$query = "INSERT INTO login VALUES('$username','$firstname','$lastname','$addressNo','$addressStreet','$addressCity','$password','$contactno','$type')";
					$query_run = mysqli_query($conn,$query);
					
					if($query_run)
					{
						header("location:../agrariancreatepro.php");
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