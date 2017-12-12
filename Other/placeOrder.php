<?php 
		if(isset($_POST['placeOrderBtn']))
		{
			require("dbconfig/config.php");
			$id = $_GET["id"];
			$need = $_POST["needquantity"];
			$up = $_GET['up'];
			$buyerUsername = "Nimal";
			$sellerUsername = $_GET["selUser"]; 
			$date = date("Y-m-d");
			$type = "paddy";
			$status = "pending";
			$product = $_GET["product"];
			$transport = "";
			$query = "SELECT Ord_No FROM orderTable";
			$query_run = mysqli_query($con,$query);
			
			$oldno = mysqli_num_rows($query_run);
			$newno = (string)($oldno + 1);
			$prefix = "ORD";
			$newid = $prefix.$newno;
			
			$total = $need * $up;
			
			$sql6="INSERT INTO orderTable VALUES('$newid','$date','$total','$product','$need','$buyerUsername','$sellerUsername','$type','$transport','$status')";

			$res6=mysqli_query($con,$sql6);
			
			header("location:productPage.php?id=$id");
		}
	?>