<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/ann.css">
</head>
<body>
	<?php

			require("../controller/connect.php");

			$sql="SELECT * FROM paddy WHERE farmer_username = 'KamalPerera' ORDER BY Paddy_date DESC";

			$res=mysqli_query($conn,$sql)
                or die(mysqli_error($conn));
			echo "<table border=0>
							<tr>
							
							<td width='100px'>Paddy ID</td>
							<td width='100px'>Paddy type</td>
							<td width='100px'>Price per kg</td>
							<td width='100px'>Quantity</td>
							<td width='100px'>Date</td>
							</tr>
						</table>
					";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					echo "<table border=0 >
							<tr>
							<td width='100px'>$row[0]</td>
							<td width='100px'>$row[1]</a></td>
							<td width='100px'>$row[2]</td>
							<td width='100px'>$row[3]</td>
							<td width='100px'>$row[4]</td>
							
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