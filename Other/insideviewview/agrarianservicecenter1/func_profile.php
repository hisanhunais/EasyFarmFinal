<?php
		// include('../../controller/connect.php');
		// if(isset($_POST['insert']))
		// {
		// 	//echo '<script type = "text/javascript">alert("dsa")</script>';
			
		// 	$firstname = $_POST['firstname'];
		// 	$lastname = $_POST['lastname'];
		// 	$contactno = $_POST['contactno'];
		// 	$type = "Farmer";
		// 	$username = $_POST['username'];
		// 	$password = $_POST['password'];
		// 	$cpassword = $_POST['cpassword'];
		// 	$no = $_POST['addressNo'];
		// 	$street = $_POST['Street'];
		// 	$city = $_POST['City'];
			
		// 	if($password==$cpassword)
		// 	{
		// 		$query = "SELECT * FROM login WHERE username='$username'";
		// 		$query_run = mysqli_query($conn,$query);
				
				
		// 		if(mysqli_num_rows($query_run)>0)
		// 		{
		// 			echo '<script type = "text/javascript">alert("User already exists.... Try another username")</script>';
		// 		}
		// 		else
		// 		{
		// 			$query = "INSERT INTO login VALUES('$username','$firstname','$lastname','$no','$street','$city','$password','$contactno','$type')";
		// 			$query_run = mysqli_query($conn,$query);
					
		// 			if($query_run)
		// 			{
		// 				// header("location:farmerprofiles.php");
		// 				// echo '<script type = "text/javascript">alert("User Registered.")</script>';

		// 			echo '<script type="text/javascript">';
		// 			echo'alert("User Registered. ");';
		// 			echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
		// 			echo '</script>';
						
		// 			}
		// 			else
		// 			{
		// 				// echo '<script type = "text/javascript">alert("Error!!!")</script>';

		// 									echo '<script type="text/javascript">';
		// 			echo'alert("Error!!! ");';
		// 			echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
		// 			echo '</script>';
		// 			}
		// 		}
				
				
		// 	}
		// 	else
		// 	{
		// 		// echo '<script type = "text/javascript">alert("Password and Confirm Password does not match.");window.location.href = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";
		// 		// 	});
		// 		// 	</script>';

		// 			echo '<script type="text/javascript">';
		// 			echo'alert("Password and Confirm Password does not match. ");';
		// 			echo 'window.location = "http://localhost/EasyFarmWebApplication/view/agrarianservicecenter/farmerprofiles.php";';
		// 			echo '</script>';
		// 	}
		// }
	// 	function delete(){
	// 	require '../../controller/connect.php';

	// 	if(isset($_POST['delete'])){
	// 		//$postid = $_GET['id'];
	// 		$sql="DELETE FROM `login` WHERE username='abd'";
	// 		//require ('../connect.php');
	// 		$res=mysqli_query($conn,$sql);
			  
	// 		 header('location:farmerprofiles.php');
	// 		  //ob_end_flush();
			
	// 	 }
	// 		 }
 
	



if($_REQUEST['empid']) {
$sql = "DELETE FROM login WHERE username='".$_REQUEST['empid']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if($resultset) {
echo "Record Deleted";
}
}

	 ?>