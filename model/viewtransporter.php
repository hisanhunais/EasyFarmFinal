<?php
	

			require("../controller/connect.php");

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
							<td >$row[1]</a></td>
							<td><a href='https://googlebookdownloader.codeplex.com/'><img src='uploads
							/$row[5]' width='100px' height='150px'></a></td>
							</tr>
						</table>
					";
					echo "</div>";
				}
			}else{
				echo "error";
			}
		}

		



?>