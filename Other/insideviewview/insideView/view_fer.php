<!DOCTYPE html>
<html>
<head>
	<title>view fertilizer</title>
    <link rel="stylesheet" href="content.css">
</head>
<body >


	<?php
	require("dbconfig/config.php");

			$sql="SELECT*FROM fertilizer";

    $res=Mysqli_query($con,$sql);
    echo "<h2 align='center'>Fertilizer List</h2>";
    echo "
    <table border='1' cellpadding='10' cellspacing='0' align='center'>
    <tr >
    <td width='90px' height='30px'>Fertilizer ID</td>
    <td width='120px'>Fertilizer Name</td>
    <td width='350px'>Description</td>
    <td width='80px'>Quantity</td>
    <!--<td width='90px'>Expiry Date</td>-->
    <td width='80px'>Price Per Unit(KG)</td>    
    </tr>
</table>";
			if ($res){
				while($row=mysqli_fetch_row($res)) {

                    echo "<table border='1' cellpadding='10' cellspacing='0' align='center' >
							<tr >
							<td width='90px' height='30px'>$row[0]</td>
							<td width='120px'>$row[1]</td>
							<td width='350px'>$row[2]</td>
							<td width='80px'>$row[3]</td>
							<!--<td width='90px'>$row[4]</td>-->
							<td width='80px'>$row[4]</td>
							</tr>
						</table>
					";
                }


			}else{
				echo "error";
			}


	?>
</body>
</html>