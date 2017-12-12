<?php
	



require '../../controller/connect.php';
	// function insertpost(){
		
		if(isset($_POST['insertpost']))
		{


			$type = mysqli_real_escape_string($conn, $_REQUEST['type']);
			$des = mysqli_real_escape_string($conn, $_REQUEST['description']); 

			$img_name = $_FILES['image']['name'];
			$img_size =$_FILES['image']['size'];
			$img_tmp =$_FILES['image']['tmp_name'];

			$directory = 'uploads/';
			$target_file = $directory.$img_name;

			$query = "SELECT type_ID FROM paddytype ";
		      $result = mysqli_query($conn,$query);
		      if (!$result) {
		      die("Select failed");}



		      $i = 1;
		      $oldno = 0;
		      $allRows = mysqli_num_rows($result);
		      while($row1 = mysqli_fetch_array($result)){

		        // echo $row1[0];
		        // echo nl2br("\n");
		          if ($allRows==$i) 
		          {

		              $oldno = (int)substr($row1[0],3);
		          } 
		          $i++;
		      }
		      
		      $newno = (string)($oldno + 1);
		      $prefix = "PAD";
		      $newid = $prefix.$newno;
			// attempt insert query execution
		      move_uploaded_file($img_tmp,$target_file);
			$sql="INSERT INTO `paddytype`(`type_ID`,`type`,`description`,`image`) VALUES ('$newid','$type','$des','$target_file')";
			
			if(mysqli_query($conn, $sql)){
			    
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

		header('location: paddytype.php');
		// 	// Close connection
		mysqli_close($conn);
		// 	//ob_end_flush();
								
		}
	//}
	//function deletepost(){
		//require '../../controller/connect.php'
 
	//}

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