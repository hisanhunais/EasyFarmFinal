<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<?php

		require "../controller/connect.php";


		/*var_dump($_POST);*/
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			
			$paddy_type=$_POST['paddy_type'];
            $paddy_price=$_POST['paddy_price'];
			$paddy_quantity=$_POST['paddy_quantity'];
			$paddy_date = $_POST['paddy_date'];
			$paddyID=0;
			$fusername = "KamalPerera";
			 
			$sql1 = "SELECT * FROM paddy WHERE Paddy_Type = '$paddy_type'";
			$res1 = mysqli_query($conn,$sql1);

            if ($res1){
                while($row=mysqli_fetch_row($res1))
                {
                    $paddyID = $row[0];
                }
            }
				

		
			$sql="INSERT INTO paddy (`Paddy_type`,`Paddy_price`,`Paddy_quantity`,`Paddy_date`,`farmer_username`) VALUES ('$paddy_type','$paddy_price','$paddy_quantity','$paddy_date','$fusername')";


			$res=mysqli_query($conn,$sql);
		
			if ($res) {
				echo'<script language ="javascript">';
            	echo'alert("Added succesfully")';
            	echo'</script>';
            echo "<table>";
			echo"Paddy Details";
			echo "<br><br>Paddy Type:".$_REQUEST['paddy_type'];
            echo "<br>Paddy Quantity:".$_REQUEST['paddy_quantity'];
            echo "kg";
            // echo "<br>Paddy Price:".$_REQUEST['paddy_price'];
			}
		else{
			echo "error".mysqli_error($conn);
		}
	}
	
	// $redirect_page='http://htmlcolorcodes.com/';
	// $redirect_page=true;

	// header('Location: '.$redirect_page);
    header('location:../view/addpaddy.php');
    ?>

?>

</body>
</html>