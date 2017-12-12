

<?php 

	require "../controller/connect.php";

		if($_SERVER["REQUEST_METHOD"]=="POST"){
			
			$Topic=$_POST['Topic'];
			$Category = $_POST['Category'];
			$Date = $_POST['Date'];
			
			$Time=$_POST['Time'];
			$Description=$_POST['Description'];
			

			 
			

			
				

		
			$sql="INSERT INTO announcement (`Date`, `Time`, `Category`, `Topic`, `Description`) VALUES ('$Date','$Time','$Category`','$Topic','$Description')"; 


			$res=mysqli_query($conn,$sql);
		
			if ($res) {

			// echo "success";
			}
		else{
			echo "error".mysqli_error($conn);
		}
		}

		header('location:../view/announcement.html');
?>