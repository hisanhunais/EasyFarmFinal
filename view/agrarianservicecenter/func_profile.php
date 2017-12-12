<?php


 
	

require '../../controller/connect.php';
 session_start();
$sessionID=$_SESSION["username"];

if(!empty($_POST))
	{
if(isset($_POST['submit']))
{
	$username=$_POST['deletedata'];
	$sql = "DELETE FROM login WHERE username='$username'";
	echo "$sql";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
header('location:farmerprofiles.php');
}
}






if(isset($_POST['insert']))
		{
			//echo '<script type = "text/javascript">alert("dsa")</script>';
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$contactno = $_POST['contactno'];
			$type = "Farmer";
			$nicno=$_POST['nicno'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$no = $_POST['addressNo'];
			$street = $_POST['Street'];
			$city = $_POST['City'];
			// $hash="";
			// $imglink="";
			$img_name = $_FILES['imglink']['name'];
			$img_size =$_FILES['imglink']['size'];
			$img_tmp =$_FILES['imglink']['tmp_name'];

			$directory = 'uploads/';
			$target_file = $directory.$img_name;
			

			
			if($password==$cpassword)
			{
				$password = sha1($password);
				$hash=substr($password,0,5);

				$query = "SELECT * FROM login WHERE username='$username'";
				$query_run = mysqli_query($conn,$query);
				
				
				if(mysqli_num_rows($query_run)>0)
				{
					echo '<script type = "text/javascript">';
					echo 'alert("User already exists.... Try another username")';
					echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
					echo '</script>';
				}
				else
				{
					$query = "INSERT INTO login VALUES('$username','$firstname','$lastname','$no','$street','$city','$password','$contactno','$type','$hash','$target_file','$nicno'0,0)";
					$query_run = mysqli_query($conn,$query);
					
					if($query_run)
					{
						// header("location:farmerprofiles.php");
						// echo '<script type = "text/javascript">alert("User Registered.")</script>';

					echo '<script type="text/javascript">';
					echo'alert("User Registered. ");';
					echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
					echo '</script>';
						
					}
					else
					{
						// echo '<script type = "text/javascript">alert("Error!!!")</script>';

											echo '<script type="text/javascript">';
					echo'alert("Error!!! ");';
					echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
					echo '</script>';
					}
				}
				
				
			}
			else
			{
				// echo '<script type = "text/javascript">alert("Password and Confirm Password does not match.");window.location.href = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";
				// 	});
				// 	</script>';

					echo '<script type="text/javascript">';
					echo'alert("Password and Confirm Password does not match. ");';
					echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
					echo '</script>';
			}
		}



if(isset($_POST['update']))
		{
			//echo '<script type = "text/javascript">alert("dsa")</script>';
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$contactno = $_POST['contactno'];
			$type = "Farmer";
			$username = $_POST['updatedata'];
			
			$no = $_POST['addressNo'];
			$street = $_POST['Street'];
			$city = $_POST['City'];
			
			// $hash="";
			// $imglink="";


			
			

					$query = "UPDATE login 
								SET firstName = '$firstname', lastName='$lastname',addressNo='$no',addressStreet='$street', addressCity='$city',  contactNo='$contactno', type='$type' 
								WHERE username='$username'";
					$query_run = mysqli_query($conn,$query);
					
					if($query_run)
					{
						// header("location:farmerprofiles.php");
						// echo '<script type = "text/javascript">alert("User Registered.")</script>';

					echo '<script type="text/javascript">';
					echo'alert("User Updated. ");';
					echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
					echo '</script>';
						
					}
					else
					{
						echo mysqli_error($conn);
						// echo '<script type = "text/javascript">alert("Error!!!")</script>';

											echo '<script type="text/javascript">';
					echo'alert("Error!!! ");';
					echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
					echo '</script>';
					}
			
		}



	 ?>