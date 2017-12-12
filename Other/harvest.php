<?php
	require 'dbconfig/config.php';
?>

<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/homepage.css" rel="stylesheet">
</head>
<body>
	<table class ="table table-striped table-hover border=0">
							<tr>
							
							<th width='100px'>Paddy ID</th>
							<th width='100px'>Paddy type</th>
							<th width='100px'>Price per kg</th>
							<th width='100px'>Quantity</th>
							<th width='100px'>Date</th>
							</tr>
						</table>
	
	<?php
		$sql="SELECT * FROM paddy WHERE farmer_username = 'KamalPerera' ORDER BY Paddy_date DESC";

			$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
			
					;

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					echo "<table border=0 >
							<tr>
							<td>$row[0]</td>
							<td>$row[1]</a></td>
							<td>$row[2]</td>
							<td>$row[3]</td>
							<td>$row[4]</td>
							
							<td ><a href='../view/updatepaddy.php?id=$row[0]'><input type='button' name='update' class='btn' value='Update' ></a></td>
                            <td ><a href='../model/deletepaddy.php?id=$row[0]'><input type='button' name='Delete' class='btn' value='Delete' ></a></td>";

							
					echo"</tr>";
					echo"</table>"
					;

					echo "</div>";
				}
			}else{
				echo "error".mysql_error();
			}
	?>
</body>
</html>