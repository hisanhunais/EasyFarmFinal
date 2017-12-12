<?php
	require 'dbconfig/config.php';
?>

<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/homepage.css" rel="stylesheet">
</head>
<body>

	
	 
	
		<?php
		$an_id = $_GET['id'];
		$sql="SELECT * FROM announcement WHERE An_ID = '$an_id'";
		$date = "";
		$category = "";
		$title = "";
		$description = "";
		$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
				if($res)
				{
					while($row=mysqli_fetch_row($res))
					{
						$date = $row[1];
						$category = $row[3];
						$title = $row[4];
						$description = $row[5];
					}
				}
				
				
				/*<tr>
							
								
								<td>Description</td>
							</tr>
							<tr>
								
								<td>$description</td>
							</tr>*/
				echo	"<div class='panel panel-default'>
					  
					  <div class='panel-body'>
						<table class='table table-striped table-hover'>
							<tr>
								<td>Date</td>
								<td>$date</td>
							</tr>
							<tr>
								<td>Category</td>
								<td>$category</td>
							</tr>
							<tr>
								<td>Title</td>
								<td>$title</td>
							</tr>
							
							
						</table>";
						
						echo "Desription : <br><br>
								$description";
					echo "</div></div>";	
					  
				
			//else{
			//	echo "error".mysql_error();
			//}
	?>
</body>
</html>