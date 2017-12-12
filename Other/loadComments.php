<?php
		function getComments($forumID)
		{
			require("dbconfig/config.php");
			//$res2=mysqli_query($con,$sql2);
			
			
					/*if (isset($_GET["page"])) 
					{ 
						$page  = $_GET["page"]; 
					} 
					else
					{ 
						$page=1; 
					};
					$start_from = ($page-1) * $results_per_page;*/
					//$sql2 = "SELECT * FROM paddyreview WHERE paddyID= '$paddyID' LIMIT $start_from, ".$results_per_page;
					$sql2 = "SELECT * FROM discussiondetails WHERE forumID= '$forumID'";
					$rs_result2 = mysqli_query($con,$sql2);
				
					
					 $count = 0;
					 while($row2 = mysqli_fetch_row($rs_result2)) 
					 {
						echo "<div class='row'>
							<div class='col-md-12'>";
						
						 echo $row2[2];
						 echo "<span class='pull-right'>$row2[3]<br>$row2[4]</span>"; 
						 //echo "<span class='pull-right'>$row2[4]</span>";
						 
						 echo "<p>".$row2[5]."</p>";
							echo "</div>
							</div>
								<hr>";
					 }
		}
	?>