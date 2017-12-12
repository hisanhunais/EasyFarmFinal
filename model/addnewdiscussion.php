<?php

		require "../controller/connect.php";


		/*var_dump($_POST);*/
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$forum_date = $_POST['forum_date'];
			$forum_time=$_POST['forum_time'];
			$forum_type=$_POST['forum_type'];
			$forum_title=$_POST['forum_topic'];
			$forum_description=$_POST['forum_description'];
			
			
			
			 
			

			
				

		
			$sql="INSERT INTO `discussion forum`( `Date`, `Time`, `Category`,'Topic','Forum_Post') VALUES ('$forum_date','$forum_time','$forum_type','')"; 


			$res=mysqli_query($conn,$sql);
		
			if ($res) {
				echo'<script language ="javascript">';
            	echo'alert("Added succesfully")';
            	echo'</script>'; 
			

			}
		else{
			echo "error".mysqli_error($conn);
		}
	}
	
	// $redirect_page='http://htmlcolorcodes.com/';
	// $redirect_page=true;

	// header('Location: '.$redirect_page);


?>
