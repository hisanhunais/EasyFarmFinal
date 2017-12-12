<?php

		require "../controller/connect.php";


		/*var_dump($_POST);*/
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$fertilizer_type=$_POST['fertilizer_type'];
            $fertilizer_price=$_POST['fertilizer_price'];
			$fertilizer_quantity=$_POST['fertilizer_quantity'];
			$fertilizer_date = $_POST['fertilizer_date'];
			$fer_id=0;
            $fusername = "AmalPerera";

            $sql1 = "SELECT * FROM fertilizer WHERE Fer_Type = '$fertilizer_type'";
            $res1 = mysqli_query($conn,$sql1);

            if ($res1){
                while($row=mysqli_fetch_row($res1))
                {
                    $fer_id = $row[0];
                }
            }



            $sql="INSERT INTO fertilizer (`Fer_type`,`Fer_price`,`Fer_quantity`,`Fer_date`,`fertilizer_username`) VALUES ('$fertilizer_type',' $fertilizer_price','$fertilizer_quantity','$fertilizer_date','$fusername')";
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
header('location:../view/addfertilizer.php');
?>
