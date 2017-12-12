
<?php
		require "../dbconfig/config.php";

		if(isset($_POST['bpaddy'])){
			
			
			$paddy_id = $_POST['Paddy_ID'];
			$paddy_type=$_POST['paddy_type'];
            $paddy_price=$_POST['paddy_price'];
			$paddy_quantity=$_POST['paddy_quantity'];
			$paddy_date = $_POST['paddy_date'];
			
			
			

			
				

		
			$sqli = "UPDATE `paddy` SET `Paddy_type`='$paddy_type',`Paddy_price`='$paddy_price',`Paddy_quantity`='$paddy_quantity',`Paddy_date`='$paddy_date' WHERE Paddy_ID='$paddy_id'";

			$result = mysqli_query($con,$sqli)
				or die(mysqli_error($con));


			if(!mysqli_query($con,$sqli)){
                echo'<script language ="javascript">';
                echo'alert("Error")';
                echo'</script>'; 
            }
            else{
            	
                echo'<script language ="javascript">';
                echo'alert(" Updated succesfully")';
                echo'</script>';
            }
            
        }
		header("location:../harvestScreen.php");

       
    ?>



