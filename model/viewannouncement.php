<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/ann.css">
	<link rel="stylesheet" href="../css/ann.css">
</head>
<body>
	<?php
	require("connect.php");

			$sql="SELECT * FROM announcement"; 

			$res=Mysqli_query($conn,$sql);

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";
					echo "<table border=1 >
							<tr>
							<td >$row[1]</td>
							<td>$row[3]</td>
							<td>$row[4]</td>
							<td>$row[5]</td>
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