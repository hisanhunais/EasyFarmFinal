<?php
	



require '../../controller/connect.php';
	// function insertpost(){
		
		if(isset($_POST['insertpost']))
		{

			$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
			$time = mysqli_real_escape_string($conn, $_REQUEST['time']);
			$category = mysqli_real_escape_string($conn, $_REQUEST['category']);
			$topic = mysqli_real_escape_string($conn, $_REQUEST['topic']);
			$des = mysqli_real_escape_string($conn, $_REQUEST['des']); 
			// attempt insert query execution
			$sql="INSERT INTO `announcement`(`Date`, `Time`, `Category`, `Topic`, `Description`) VALUES ('$date','$time','$category','$topic','$des')";
			
			if(mysqli_query($conn, $sql)){
			    
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

		header('location: agrarianannouncement.php');
		// 	// Close connection
		mysqli_close($conn);
		// 	//ob_end_flush();
								
		}
	//}
	//function deletepost(){
		//require '../../controller/connect.php';
		 if(isset($_POST['delete'])){
			$postid = $_GET['id'];
			$sql="DELETE FROM `announcement` WHERE An_ID='$postid'";
			//require ('../connect.php');
			$res=mysqli_query($conn,$sql);
			  
			 header('location:agrarianannouncement.php');
			  //ob_end_flush();
			
		 }
 
	//}
	function updatepost(){
		include '../connect.php';
		if(isset($_POST['updatepost'])){
			$postid = $_POST['id'];
			$date=$_POST['date'];
			$time=$_POST['time'];
			$category = $_POST['category'];
			$topic =$_POST['topic'];
			$des =$_POST['des']; 
			
			
			$sql="UPDATE `announcement` SET `An_ID`='$postid',`Date`='$date',`Time`='$time',`Category`='$category',`Topic`='$topic',`Description`='$des' WHERE `An_ID`='postid'";
			include 'connect.php';
			$res=mysqli_query($conn,$sql);
			header('location:agrarianannouncement.php');
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