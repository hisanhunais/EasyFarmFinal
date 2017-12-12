<?php
	session_start();
?>

<?php 
		if(isset($_POST['availableqty']))
		{
			require("../../dbconfig/config.php");
			$id = $_GET["id"];
			$need = $_POST["needquantity"];
			$up = $_GET['up'];
			$buyerUsername = $session_["username"];
			$sellerUsername = $_GET["selUser"]; 
			$date = date("Y-m-d");
			$type = "fertilizer";
			$status = "Pending";
			$product = $_GET["product"];
			
			$query = "SELECT Order_id FROM fer_orderTable";
			$query_run = mysqli_query($con,$query);
			$availableqty = $_POST["availableqty"];
			$ordYear = "2017/2018";
			
			$oldno = mysqli_num_rows($query_run);
			$newno = (string)($oldno + 1);
			$prefix = "FER";
			$newid = $prefix.$newno;
			
			$total = $need * $up;
			
			$sql6="INSERT INTO fer_ordertable VALUES('$newid','$date','$product','$need','$buyerUsername','$sellerUsername','$status','$total',,'ordYear')";

			$res6=mysqli_query($con,$sql6);

			$newqty = $availableqty - $need;
			$sql7 = "UPDATE fertilizer SET Fer_quantity = '$newqty' WHERE Fer_ID = '$id'";
			$res7=mysqli_query($con,$sql7);
			"<script>alert( 'Order Successfully Placed' );</script>";
			header("location:ferOrder.php?id=$id");
		}
	?>