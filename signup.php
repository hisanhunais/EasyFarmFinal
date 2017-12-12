<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
<link rel="stylesheet" href="css/style.css">

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
</head>
<body style="background-color:#7f8c8d">

	<div id = "main-wrapper">
		<center>
			<h2>SignUp Form</h2>
			<img id="uploadPreview" src = "Images/loginImg.png" width="100px"/><br>
		</center>
	
	
	<form class="myform" action="signup.php" method="post" enctype="multipart/form-data" >
		<center>
		<img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br>
			<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
		</center>
		<label><b>Name</b></label>
		<input name="firstname" type="text" class="inputvalues" placeholder="Type your first name" width = "50%" required/><br>
		<input name="lastname" type="text" class="inputvalues" placeholder="Type your last name" width = "50%" required/><br><br>
		<label><b>Address</b></label>
		<input name="addressNo" type="text" class="inputvalues" placeholder="Type Address Number" width = "50%" required/><br>
		<input name="addressStreet" type="text" class="inputvalues" placeholder="Type Street" width = "50%" required/><br>
		<input name="addressCity" type="text" class="inputvalues" placeholder="Type City" width = "50%" required/><br><br>

		<label for="phonenum"><b>Contact Number</b></label>
		<input name="contactno" type="tel" pattern="^\d{10}$" class="inputvalues" placeholder="Type your contact number (ex: 0771231234)"  title= "enter your contact number using only 10 numbers" required/><br>
		<label><b>NIC Number</b></label>
		<input name="nicno" type="text" pattern="(^\d{9}[V|v|x|X]$)|(^\d{12}$)" class="inputvalues" placeholder="Type your National Identity card number (ex: 123456789v or 941234567890 )"  title= "enter your NIC number using only 9 numbers and x or v to end or 12 numbers" required/><br>
		<label><b>Type</b></label>
			<select class = "type" name = "type">
				<option value="Paddy Marketing Board">Paddy Marketing Board</option>
				<option value="Mill Owner">Mill Owner</option>
				<option value="Store Owner">Store Owner</option>
				<option value="Fertilizer Seller">Fertilizer Seller</option>
				<option value="Fertilizer Seller">Transporter</option>
			</select><br><br>
		<label><b>Username</b></label>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
		<label><b>Password</b></label>
		<input name="password" type="password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" class="inputvalues" placeholder="Your password (use letters,numbers and atleast 8 characters)"" title="Must contain at least one number and one  lowercase letter, and at least 8 or more characters" required/><br>
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
			$nicno=$_POST['nicno'];
			$type = $_POST['type'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];

			$img_name = $_FILES['imglink']['name'];
			$img_size =$_FILES['imglink']['size'];
			$img_tmp =$_FILES['imglink']['tmp_name'];

			$directory = 'uploads/';
			$target_file = $directory.$img_name;

			$latitude = 0;
			$longitude = 0;
			
			
			if($password==$cpassword)
			{	
				$password = sha1($password);
				$hash=substr($password,0,5);

				$query = "SELECT * FROM login WHERE username='$username'";
				$query_run = mysqli_query($con,$query);
				
				
				if(mysqli_num_rows($query_run)>0)
				{
					echo '<script type = "text/javascript">alert("User already exists.... Try another username")</script>';
				}
		
				else if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
					}
				else
				{
					move_uploaded_file($img_tmp,$target_file);
					$query = "INSERT INTO login VALUES('$username','$firstname','$lastname','$addressNo','$addressStreet','$addressCity','$password','$contactno','$type','$hash','$target_file','$nicno','$latitude','$longitude')";
					$query_run = mysqli_query($con,$query);
					
					if($query_run)
					{

							header("location:selectLocation.php");
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