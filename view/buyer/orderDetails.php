<?php
					require '../../dbconfig/config.php';

					$city = "";
					if (isset($_GET["page"])) 
					{ 
						$page  = $_GET["page"]; 
					} 
					else
					{ 
						$page=1; 
					};
					$start_from = ($page-1) * $results_per_page;
					$sql = "SELECT * FROM paddy LIMIT $start_from, ".$results_per_page;
					$rs_result = mysqli_query($con,$sql);
				
					
					 $count = 0;
					 while($row = mysqli_fetch_row($rs_result)) {
						 if($count==3)
						 {
							 echo "</div>";
							 $count = 0;
						 }
						 if($count == 0)
						 {
							 echo "<div class='row'>";
						 }
						 $count = $count+1;
						 $sql2 = "SELECT addressCity FROM login WHERE username = '$row[5]'";
						 
						 $rs_result2 = mysqli_query($con,$sql2);
						 while($row2 = mysqli_fetch_row($rs_result2))
						 {
							$city = $row2[0];
						 }
						 
						 
						 
						 
					?>
					 
					 
					 
					

                <!--<div class="row">-->

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="../../Images/MUTHU SAMBA.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right">Rs.<?php echo $row[2];?></h4>
                                <h4><a href="productPage?id=<?php echo $row[0];?>"><?php echo $row[1];?></a>
                                </h4>
                                <p><?php echo $row[5];?></p>
								<p><?php echo $city;?></p>
								<p>Available : <?php echo $row[3];?>kg</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
				
				<!--</div>-->
				<?php } ?>
				<?php 
					if($count>0)
					{
						echo "</div>";
					}
				?>
					<center>
					<?php 
					$sql = "SELECT COUNT(Paddy_ID) AS total FROM paddy";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_row($result);
					$total_pages = ceil($row[0] / $results_per_page); // calculate total pages with results
					  
					for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
								echo "<a href='order.php?page=".$i."'";
								if ($i==$page)  echo " class='curPage'";
								echo ">".$i."</a> "; 
					}; 
					?>
					</center>
