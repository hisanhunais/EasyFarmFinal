<?php
	require 'dbconfig/config.php';
?>

<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/homepage.css" rel="stylesheet">
</head>
<body>

	
	 <table class ="table table-striped table-hover">
						<tr>
							
							<th>Order Number</th>
							<th>Date</th>
							<th>Total</th>
							<th>Buyer</th>
							<th>Status</th>
							<th></th>
							</tr>
						<!--</table>-->
	
		<?php
		$sql="SELECT * FROM orderr WHERE seller_username = 'KamalPerera' ORDER BY ord_Date DESC";

			$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
			
					;

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					//echo "<table border=0>
					echo   "<tr>
							<td>$row[0]</td>
							<td>$row[2]</a></td>
							<td>$row[1]</td>
							<td>$row[5]</td>
							<td>$row[8]</td>
							<td><a class= 'btn btn-primary' href='orderViewDetailsScreen.php?ordNo=$row[0]'>View Details</a></td>
							</tr>";
							
					
					

					echo "</div>";
				}
				echo"</table>";
			}else{
				echo "error".mysql_error();
			}
	?>
</body>
</html>