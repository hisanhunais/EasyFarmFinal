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

			$sql="SELECT * FROM announcement ORDER BY Date DESC" ; 

			$res=Mysqli_query($con,$sql);
			echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							
							<th width='150px'>Date</th>
							<th width='150px'>Announcement type</th>
							<th width='150px'>Title</th>
							<th width='250px'></th>
							</tr>
						
					";
					//echo "</table>";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					//echo "<div class='tbl'>";
					//echo "<table border=0 >
						echo "	<tr>
							<td width='150px'>$row[1]</td>
							<td width='150px'>$row[3]</td>
							<td width='150px'>$row[4]</td>
							<td width='250px'><button type='button' class='btn btn-secondary'><a href='announcementsDetailsScreen.php?id=$row[0]'>View Description</a></button></td>
							
							</tr>
						
					";
					
				}
				echo "</div>";
				echo "</table>";
			}else{
				echo "error";
			}

		?>
</body>
</html>