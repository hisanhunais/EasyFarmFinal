<?php

	require '../../dbconfig/config.php';

	$sql="SELECT * FROM discussionforum ORDER BY Date DESC" ; 
	$res=mysqli_query($con,$sql);
	echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							
							<th width='150px'>Date</th>
							<th width='150px'>Category</th>
							<th width='150px'>Topic</th>
							<th width='250px'></th>
							</tr>
						
					";
					//echo "</table>";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					//echo "<div class='tbl'>";
					//echo "<table border=0 >
						echo "	<tr>
							<td width='150px'>$row[2]</td>
							<td width='150px'>$row[4]</td>
							<td width='150px'>$row[5]</td>
							<td width='250px'><button type='button' class='btn btn-secondary'><a href='discussionDetails.php?id=$row[0]'>View Description</a></button></td>
							
							</tr>
						
					";
					
				}
				echo "</div>";
				echo "</table>";
			}else{
				echo "error";
			}

		?>





