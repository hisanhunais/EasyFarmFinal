<?php
	session_start();
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
			<h2>Request for new password</h2>
			<img src = "Images/download.png" width="100px"/>
		</center>
		<form class="myform" action="" method="post">
		<label><b>Enter your Contact Number</b></label>
		<input name="contactno" type="text" pattern="^\d{10}$" class="inputvalues" placeholder="Type your contact number (ex: 0712345678)"  title= "enter your contact number using only 10 numbers" required/><br>
		<input name="lost_password" type="submit" id="signin_btn" value="Requesting new password"/><br>
		<a href = "index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form>	

		<?php
		if(isset($_POST['lost_password']))
		{
			
			$contactno = $_POST['contactno'];
			$new ="";

			
			$query = "SELECT * FROM login WHERE contactNo = '$contactno'";
			$query_run = mysqli_query($con,$query);
			$contactno1=substr($contactno,1,9);
			$contactno2='+94'.$contactno1;

			$_SESSION['contactno']= $contactno;

			if ($query_run){
				while($row=mysqli_fetch_row($query_run))

				{
					require 'int-send_sms.php';
					$username = 'KushalNaresh';
					$password = 'kush@123';
					$msisdn = $contactno2;
					$url = 'https://bulksms.vsms.net/eapi/submission/send_sms/2/2.0';

					$unicode_msg = $row[9];

					$post_body = unicode_sms( $username, $password, $unicode_msg, $msisdn );
					$result = send_message( $post_body, $url );
					//$new = $row[6];
				}
			}
				
			
			if(mysqli_num_rows($query_run)>0)
			{
					header("location: reset_password.php");
			}
			else
			{
				echo '<script type = "text/javascript">alert("Invalid Credentials.")</script>';
			}
		}
		?>
	</div>
</body>
</html>


