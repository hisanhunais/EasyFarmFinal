
<?php
		require "../controller/connect.php";

		if(isset($_POST['update'])){
			
			
			$fer_id = $_POST['Fertilizer_ID'];
			$fer_type=$_POST['fertilizer_type'];
			$fer_quantity=$_POST['fertilizer_quantity'];
			$fer_date = $_POST['fertilizer_date'];








            $sqli = "UPDATE `fertilizer` SET `Fer_type`='$fer_type',`Fer_price`='$fer_price',`Fer_quantity`='$fer_quantity',`Fer_date`='$fer_date' WHERE Fer_ID='$fer_id'";

            $result = mysqli_query($conn,$sqli)
            or die(mysqli_error($conn));


            if(!mysqli_query($conn,$sqli)){
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

    header('location:../view/viewfertilizer.php');
?>



