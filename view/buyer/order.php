<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Buyer</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../css/bootstrap.min.css" rel="stylesheet">
	 -->
	<link href="../../css/homepage.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script> -->

  <!-- <style type="text/css">
  	.thumbnail{        
    
    height: 450px;
    overflow: auto;
}

.thumbnail img{
    // your styles for the image
    width: 100%;
    height: auto;
    display: block;
}
  </style> -->

  

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
					    <div class="panel-body" id="itemContent">
					    	<!-- <div class="row">
				              <div class="col-sm-6 col-sm-offset-3">
				                  <div id="imaginary_container"> 
				                      <div class="input-group stylish-input-group">
				                          <input type="text" class="form-control"  placeholder="Search"   id="search" >
				                          <span class="input-group-addon">
				                              <button type="submit">
				                                  <span class="glyphicon glyphicon-search"></span>
				                              </button>  
				                          </span>
				                      </div>
				                  </div>
				              </div> -->
        </div>
							<div class="row">
								<div class = "col-md-12" id="loadSection">
									<?php
										require '../../dbconfig/config.php';
										
											$sql = "SELECT * FROM paddy";
										

										$city = "";
										$imageLink = "";
										
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

											 $sql3 = "SELECT image FROM paddytype WHERE type = '$row[1]'";
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


					                    <div class="col-lg-4 col-md-6" id="oneitem">
					                        <div class="thumbnail">
					                            <img src="<?php echo $imageLink; ?>" alt="" style="width: 320px; height: 200px;">
					                            <div class="caption">
					                                <h4 class="pull-right">Rs.<?php echo $row[2];?></h4>
					                                <h4><a href="productPage?id=<?php echo $row[0];?>"><?php echo $row[1];?></a>
					                                </h4>
					                                <p><?php echo $row[5];?></p>
													<p><?php echo $city;?></p>
													<p>Available : <?php echo $row[3];?>kg</p>
					                            </div>
					                            <div class="ratings">
					                                <p class="pull-right"><?php echo $row4[0]; ?> Reviews</p>
					                                <p>
					                                    <!-- <span class="glyphicon glyphicon-star"></span>
					                                    <span class="glyphicon glyphicon-star"></span>
					                                    <span class="glyphicon glyphicon-star"></span>
					                                    <span class="glyphicon glyphicon-star"></span>
					                                    <span class="glyphicon glyphicon-star"></span> -->
					                                    <?php
					                                    $sql1="SELECT rating FROM paddy WHERE Paddy_ID= '$row[0]'";

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
										<?php 
											}

											if($count>0)
											{
												echo "</div>";
											}
										?>
						

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
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>

<!-- <script>
  $(document).ready(function()
  {
    $('#search').keyup(function()
      { 
        var txt = document.getElementById('search').value;
        var txt2 = "searching";
        //var data = "data="+txt+"&purpose="+txt2;

            $.ajax(
              {
                url:"order.php",
                method:"get",
                data:{searchData:txt},
                dataType:"text",
                success:function(data)
                {
                  $('#loadSection').html(data);
                }
              });
        
      });
  });
</script> -->

<script>
  $(document).ready(function(){
    $('#search').on('keyup',function(){
      var searchVal = $(this).val().toLowerCase();
      $('#itemContent #oneitem').each(function(){
        var trVal = $(this).text().toLowerCase();
        if(trVal.indexOf(searchVal) === -1)
        {
          $(this).hide();
        }
        else
        {
          $(this).show();
        }
      });
    });
  });
</script>
