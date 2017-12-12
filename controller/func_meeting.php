<?php
	


	function insertmeeting(){
		include 'connect.php';
		if(isset($_POST['insertmeeting']))
		{
			$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
			$time = mysqli_real_escape_string($conn, $_REQUEST['time']);
			$purpose = mysqli_real_escape_string($conn, $_REQUEST['purpose']);
			 
			// attempt insert query execution

			$sql = "INSERT INTO meetings (`Date`,`Time`,`Purpose`) VALUES ('$date','$time','$purpose')";
			if(mysqli_query($conn, $sql)){
			    
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			header('location: agrarianmeeting.php');
			// Close connection
			mysqli_close($conn);					
		}
	}
	function deletemeeting(){

		if(isset($_POST['deletemeeting'])){
			$meetingid = $_GET['meetingid'];
			$sql="DELETE FROM `meetings` WHERE meetingID='$meetingid'";
			include 'connect.php';
			$res=mysqli_query($conn,$sql);
			  
			  header('location:agrarianmeeting.php');
			  
			
		}

	}
	function updatemeeting(){
		if(isset($_POST['updatemeeting'])){
			$meetingid = $_POST['meetingid'];
			$date=$_POST['date'];;
			$time=$_POST['time'];;
			$purpose=$_POST['purpose'];;
			$sql="UPDATE `meetings` 
			SET  meetingID = '$meetingid', Date= '$date',Time='$time',Purpose='$purpose'
			WHERE meetingID='$meetingid'";
			include 'connect.php';
			$res=mysqli_query($conn,$sql);
			header('location:agrarianmeeting.php');
		}

	}
	// function updatepaddysinhala(){
	// 	require '../controller/connect.php';
	// 	if(isset($_POST['updatepaddy'])){
	// 		$paddy_id = $_GET['id'];
	// 		$sql="UPDATE FROM `paddy` WHERE Paddy_ID='$paddy_id'";

	// 		$res=mysqli_query($conn,$sql);
	// 		if($res){
	// 			header('location:../view/viewpaddysinhala.php');
	// 		}
	// 	}
	// }


	

?>