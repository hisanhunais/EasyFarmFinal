<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Farmer</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

  

  </head>

  <body>
	
	<?php include 'header.php'; ?>
	
	<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
               
                <?php include 'sidebar.php'; ?>
            </div>
			<div class="col-md-9">
					<div class="panel panel-default">
					 
					  <div class="panel-body">
						<div class="row">
							<div class = "col-md-12" id="loadSection">
								<?php
										require '../../dbconfig/config.php';

										$city = "";
										$imageLink = "";
										$sql = "SELECT * FROM fertilizer";
										$rs_result = mysqli_query($con,$sql);
										$count = 0;

										while($row = mysqli_fetch_row($rs_result)) 
										{
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

											 $sql3 = "SELECT image FROM fertilizer WHERE Fer_type = '$row[1]'";
											 $sql2 = "SELECT addressCity FROM login WHERE username = '$row[5]'";
											 
											 $rs_result2 = mysqli_query($con,$sql2);
											 while($row2 = mysqli_fetch_row($rs_result2))
											 {
												$city = $row2[0];
											 }

											 $rs_result3 = mysqli_query($con,$sql3);
											 while($row3 = mysqli_fetch_row($rs_result3))
											 {
												$imageLink = $row3[0];
												$imageLink = "../../".$imageLink;
											 }	 

											 $sql4 = "SELECT COUNT(*) FROM paddyreview WHERE paddyID= '$row[0]'";
											 $rs_result4 = mysqli_query($con,$sql4);
											 $row4 = mysqli_fetch_row($rs_result4);
										?>
					 
					

					

                <!--<div class="row">-->

                    <div class=" col-lg-4 col-md-6">
                        <div class="thumbnail">
                            <img src="<?php echo $imageLink; ?>" alt="" style="width: 320px; height: 200px;">
                            <div class="caption">
                                <h4 class="pull-right">Rs.<?php echo $row[2];?></h4>
                                <h4><a href="ferProductPage.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a>
                                </h4>
                                <p><?php echo $row[6];?></p>
								<p><?php echo $city;?></p>
								<p>Available : <?php echo $row[3];?><?php echo $row[4];?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php echo $row4[0]; ?>reviews</p>
                                <p>
                                    <!-- <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>--> 
                                    <?php
					                                    $sql1="SELECT Fer_rating FROM fertilizer WHERE Fer_ID= '$row[0]'";

														$res1=mysqli_query($con,$sql1);
														
														while($row1 = mysqli_fetch_row($res1))
														{
															$stars = round($row1[0]);
															$nostars = 5 - $stars;
															for($i=0;$i<$stars;$i++)
															{
																echo "<span class='glyphicon glyphicon-star'></span>";
															}
															for($j=0;$j<$nostars;$j++)
															{
												                echo "<span class='glyphicon glyphicon-star-empty'></span>";
															}
															echo "  ".$row1[0]." stars";
														}
														?>
                                </p>
                            </div>
                        </div>
                    </div>
				
				<!--</div>-->
								<?php } ?>
								<?php 
									if($count>0){
									echo "</div>";
									}
								?>
					<!-- <center>
					<?php 
					$sql = "SELECT COUNT(Fer_ID) AS total FROM fertilizer";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_row($result);
					$total_pages = ceil($row[0] / $results_per_page); // calculate total pages with results
					  
					for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
								echo "<a href='ferorder.php?page=".$i."'";
								if ($i==$page)  echo " class='curPage'";
								echo ">".$i."</a> "; 
					}; 
					?>
					</center> -->

							</div>
						</div>
					  </div>
					</div>
				</div>
       		 </div>
    		</div>
	</section>

	<?php include 'footer.php'; ?>

	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
