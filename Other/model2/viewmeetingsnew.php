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

			$sql="SELECT * FROM meetings ORDER BY Date DESC" ; 

			$res=Mysqli_query($conn,$sql);
			echo "<table border=0>
							<tr>
							
							<td width='150px'>Date</td>
							<td width='150px'>Time</td>
							<td width='150px'>Purpose</td>
							
							</tr>
						</table>
					"; 

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";
					echo "<table border=0 >
							<tr>
							<td width='150px'>$row[0]</td>
							<td width='150px'>$row[1]</td>
							<td width='150px'>$row[2]</td>
							
							</tr>
						</table>
					";
					echo "</div>";
				}
			}else{
				echo "error";
			}

		?>
</body>
</html>