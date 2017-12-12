<?php
	//session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
</head>
<body>
	<?php

			require("dbconfig/config.php");
			//$un = $_SESSION['username'];
			//$uname = $_GET['un'];
			//echo $uname;
			$sql="SELECT * FROM paddy WHERE farmer_username = 'KamalPerera' ORDER BY Paddy_date DESC";

			$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
			echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							
							<th width='100px'>Paddy ID</th>
							<th width='120px'>Paddy type</th>
							<th width='100px'>Price per kg</th>
							<th width='100px'>Quantity</th>
							<th width='100px'>Date</th>
							<th></th>
							
							</tr>
						</table>
					";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							<td width='100px'>$row[0]</td>
							<td width='120px'>$row[1]</a></td>
							<td width='100px'>$row[2]</td>
							<td width='100px'>$row[3]</td>
							<td width='100px'>$row[4]</td>
							
							<td ><a href='updateHarvestScreen.php?id=$row[0]&quantity=$row[3]&type=$row[1]&price=$row[2]&date=$row[4]'><input type='button' name='update'  value='Update' class='btn btn-primary'></a>
                            <a href='model/deletepaddy.php?id=$row[0]'><input type='button' name='Delete'  value='Delete' class='btn btn-primary'></a></td>";

							
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