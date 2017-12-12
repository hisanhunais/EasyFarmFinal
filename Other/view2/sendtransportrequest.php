<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<?php
	require "../controller/connect.php";
	echo"<form action='' method='POST'>";
	echo"<table border=0>";
	echo"<tr>";
	echo "<td height='50px' colspan='3'>";
	echo"<tr>";
		echo "<td>";
			echo "Enter vehicle type ";
		echo "</td>";
		echo "<td width='50px'>";
			
		echo "</td>";
		echo "<td width='175px'>";
			echo "<select name='category'>
						<option name='van'>Van</option>
						<option name='lorry'>Lorry</option>
						<option name='tractor'>Tractor</option>
			<select>";
		echo "</td>";
		echo "<td>";
			echo "<input type='submit' name='transport' value='Search'>";
		echo "</td>";
		
	echo "</tr>";
	echo "</table>";
	echo "</form>";
	echo "</br>";
	echo "</br";
	if(isset($_POST['transport'])){
			
			
			$search = $_POST['transport'];

			$sql="SELECT * FROM transporter
					WHERE Veh_Type=$search"; 

			$res=Mysqli_query($conn,$sql);

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";
					echo "<table border=1 >
							<tr>

							<td input type='radio' name='id'>$row[1]</td>
							<td>$row[2]</td>
							<td>$row[7]</td>

							</tr>
						</table>
					";
					echo "</div>";

				} 
			}else{
				echo "error";
			}
			echo "<input type='submit' name='transport' value='Send request'>";
		}

?>
</body>
</html>

