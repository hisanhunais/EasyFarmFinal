<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/homepage.css" rel="stylesheet">
</head>
<body>

	
	 
	
		<?php
		$ordNo = $_GET['ordNo'];
		$sql="SELECT * FROM ordertable WHERE Ord_No = '$ordNo'";
		$date = "";
		$total = 0;
		$buyer = "";
		$status = "";
		$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
				if($res)
				{
					while($row=mysqli_fetch_row($res))
					{
						$date = $row[1];
						$total = $row[2];
						$buyer = $row[5];
						$status = $row[9];
					}
				}
				
		
				echo	"<div class='panel panel-default'>
					  <!--<div class='panel-heading main-color-bg'>
						<h3 class='panel-title'>Order Details</h3>
						
					  </div>-->
					  <div class='panel-body'>
						<table class='table table-striped table-hover'>
							<tr>
								<td>Order Number</td>
								<td>$ordNo</td>
							</tr>
							<tr>
								<td>Date</td>
								<td>$date</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>$total</td>
							</tr>
							<tr>
								<td>Buyer</td>
								<td>$buyer</td>
							</tr>
							<tr>
								<td>status</td>
								<td>$status</td>
							</tr>
						</table>";
					  
					
					
					echo "<table class ='table table-striped table-hover'>
						<tr>
							
							<th>Product</th>
							<th>Quantity</th>
							</tr>";
					
			$sql = "SELECT * FROM ordertable WHERE Ord_No = $ordNo";
			$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
			
					

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					//echo "<table border=0>
					echo   "<tr>
							<td>$row[2]</td>
							<td>$row[3]</td>
							</tr>";
							
					
					

					echo "</div>";
				}
				echo"</table>";
				echo "</div>";
				echo "</div>";
			}else{
				echo "error".mysql_error();
			}
	?>
</body>
</html>