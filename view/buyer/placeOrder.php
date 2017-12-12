<?php 
		if(isset($_POST['placeOrderBtn']))
		{
			require("../../dbconfig/config.php");
			$id = $_GET["id"];
			$need = $_POST["needquantity"];
			$up = $_GET['up'];
			$buyerUsername = "Nimal";
			$sellerUsername = $_GET["selUser"]; 
			// $date = date("Y-m-d");
			$date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
			$date = $date1->format('Y-m-d');
			$type = "paddy";
			$status = "Pending";
			$product = $_GET["product"];
			$transport = $_POST["delivery"];
			$query = "SELECT Ord_No FROM orderTable";
			$query_run = mysqli_query($con,$query);
			$availableqty = $_POST["availableqty"];
			
			$oldno = mysqli_num_rows($query_run);
			$newno = (string)($oldno + 1);
			$prefix = "ORD";
			$newid = $prefix.$newno;
			
			$total = $need * $up;
			
			$sql6="INSERT INTO orderTable VALUES('$newid','$date','$total','$product','$need','$buyerUsername','$sellerUsername','$type','$transport','$status','None','$id')";

			$res6=mysqli_query($con,$sql6);

			$newqty = $availableqty - $need;
			$sql7 = "UPDATE paddy SET Paddy_quantity = '$newqty' WHERE Paddy_ID = '$id'";
			$res7=mysqli_query($con,$sql7);
			//echo "<script>alert( 'Order Successfully Placed' );</script>";
			header("location:productPage.php?id=$id");
		}
	?>