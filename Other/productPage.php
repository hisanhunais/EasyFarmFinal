<?php
	require "dbconfig/config.php";
?>


<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    
	    $("#place_order").click(function(){
	        $("#enter_qty").show();
	    });

	    $("#cancel-order").click(function(){
	        $("#enter_qty").hide();
	    });
	});
	</script>
    <style type="text/css">

     /* Enhance the look of the textarea expanding animation */
     .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
      }

      .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
      }
  </style>
  <style type="text/css">
    .thumbnail{ padding: 0;}

    .carousel-control, .item{
         border-radius: 4px;
     }

    .caption{
        height: 130px;
        overflow: hidden;
    } 

    .caption h4
    {
        white-space: nowrap;
    }

    .thumbnail img{
      width: 100%;
    }

    .ratings 
    {
        color: #d17581;
        padding-left: 10px;
        padding-right: 10px;
    }

    .thumbnail .caption-full {
    padding: 9px;
    color: #333;
    }

    footer{
      margin-top: 50px;
      margin-bottom: 30px;
    }
	


.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
  </style>
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="http://demos.maxoffsky.com/shop-reviews">My shop</a>
            </div>

            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>

    <div class="container">
          <div class="row">
        <div class="col-md-3">
            <p class="lead">Shop Categories</p>
            <div class="list-group">
              <a href="#" class="list-group-item active">Printable</a>
              <a href="#" class="list-group-item">Cupcake wrappers</a>
            </div>
        </div>
		
		<?php
					$un = "";
					$paddyid1 ="";
					$paddyID = "";
					if (isset($_GET["id"])) 
					{ 
						$paddyID  = $_GET["id"];
						$paddyid1 = $_GET["id"];
					} 
					
					if(isset($_GET["page"]))
					{
						$page  = $_GET["page"]; 
					}
					else
					{ 
						$page=1; 
					};
					
					$sql = "SELECT * FROM paddy WHERE Paddy_ID = '$paddyID'";
					$rs_result = mysqli_query($con,$sql);
				
					
					 
					 while($row = mysqli_fetch_row($rs_result)) 
					 {
						 $un = $row[5];
						 $sql2 = "SELECT * FROM login WHERE username = '$row[5]'";
						 
						 $rs_result2 = mysqli_query($con,$sql2);
						 while($row2 = mysqli_fetch_row($rs_result2))
						 {
							 $adNo = $row2[3];
							 $adStreet = $row2[4];
							$city = $row2[5];
							$tel = $row2[7];
						 }
						 
					  
						 
						 
					?>
        <div class="col-md-9">
            <div class="thumbnail">
              <img src="http://placehold.it/820x320" alt="">
              <div class="caption-full">
                  <h4 class="pull-right">Rs.<?php echo $row[2];?></h4>
                  <h4><?php echo $row[1];?></h4>
				  
                  <p>This is a short description asdf as This is a short description asdf as</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
				  <p><?php echo $row[5];?></p>
				  <p><?php echo $tel;?></p>
				  <p><?php echo $adNo.", ".$adStreet.", ".$city;?></p>
				  <p>Available : <?php echo $row[3];?>kg</p>
			  </div>
              <div class="ratings">
				  
                  <p class="pull-right">2072 reviews</p>
                  <p><?php check($row[0],"paddy");?>
                                         <!-- <span class="glyphicon glyphicon-star"></span>
                                          <span class="glyphicon glyphicon-star"></span>
                                          <span class="glyphicon glyphicon-star"></span>
                                          <span class="glyphicon glyphicon-star-empty"></span>
                                          <span class="glyphicon glyphicon-star-empty"></span>
                                        3.9 stars-->
                  </p>
				  <center><p><button id="place_order" type="button" class="btn btn-success">Place Order</button>
				  	<!--<button id="place_order" type="button" class="btn btn-success" data-toggle="modal" data-target="#orderModal">Place Order</button>-->
				  	<div id="enter_qty" style="display: none;" data-ng-app="" data-ng-init="quantity=0;price=<?php echo $row[2];?>">
				  		<div class="panel panel-default">
						  <div class="panel-body">
						  <form action="placeOrder.php?id=<?php echo $row[0];?>&up=<?php echo $row[2];?>&selUser=<?php echo $row[5];?>&product=<?php echo $row[1];?>" method="POST">
						  <div class = "row">
						  	<div class="col-md-3">
						  	</div>
						  	<div class="col-md-3">
						  		Quantity Needed
						  	</div>
						  	<div class="col-md-3">
						  		<input id="qtyNeed" type="number" name = "needquantity" ng-model="quantity" value="" min="1" max=<?php echo $row[3];?> required /> Kg
						  	</div>
						  	<div class="col-md-3">
						  	</div>
						  </div>
						  <br>
						  <div class = "row">
						  	<div class="col-md-3">
						  	</div>
						  	<div class="col-md-3">
						  		<b>Order Total:</b>
						  	</div>
						  	<div class="col-md-3">
						  		 Rs. {{quantity * price}}
						  		<!--<input id="qtyNeed" type="number" name = "quantity" onkeypress="myFunction()" value="" required />-->
						  		<!--<input id="qtyNeed" type="number" name = "quantity" ng-model="quantity" value="" required />-->
						  	</div>
						  	<div class="col-md-3">
						  	</div>
						  </div>
						  <br>
						  <input name ="placeOrderBtn" type="submit" class="btn btn-success" value="Submit" />
						  <label class="btn btn-danger btn-sm" id="cancel-order" style="margin-left:10px;"> 
						  <span class="glyphicon glyphicon-remove"></span>Cancel</label>
						  </form>
						  </div>
						</div>
				  	</div>
				  </p></center>
				  <!-- Modal -->
				  <!--<div class="modal fade" id="orderModal" role="dialog">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Paddy Order</h4>
						</div>
						<div class="modal-body">-->
						  <!--<div class="table-responsive">-->
						  <!--<form action="productPage.php?id=<?php echo $paddyID;?>" method="POST">-->
						  <!--<form action="placeOrder.php?id=<?php echo $row[0];?>&qty=<?php echo $row[3];?>" method="POST">
						  <center>
						  <table class="table table-borderless">
						  <tr>
						  <td>Type</td>
						  <td><?php echo $row[1];?></td>
						  </tr>
						  <tr>
						  <td>Unit Price</td>
						  <td>Rs.<?php echo $row[2];?></td>
						  </tr>
						  <tr>
						  <td>Available</td>
						  <td><?php echo $row[3];?>kg</td>
						  </tr>
						  <tr>
						  <td>Quantity Needed</td>
						  <td><input id="qtyNeed" type="number" name = "quantity" onkeypress="myFunction()" value="" required /></td>
						  </tr>
						  <tr>
						  <td>Order Total</td>
						  <td id="ordTotal"></td>
						  </tr>
						  </table>
						  <p id="demo"></p>
						  <center>-->
						  <!--</div>-->
						  <!--<center>
						  <input name ="placeOrderBtn" type="submit" class="btn btn-success" value="Place Order" />
						  </center>
						  </form>
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
						<script type="text/javascript">
						function myFunction() {
							
							var unitPrice = <?php echo $row[2];?>;
							var needQty1 = document.getElementById('qtyNeed').value;
							
							var needQty2 = parseInt(needQty1);
							var total = unitPrice * needQty1;
							alert(needQty1);
							document.getElementById('ordTotal').innerHTML = total;
						}
						</script>
					  </div>
					</div>
				  </div>-->
              </div>
            </div>
            <div class="well" id="reviews-anchor">
              <div class="row">
                <div class="col-md-12">
                                                                      </div>
              </div>
              <div class="text-right">
                <a href="#reviews-anchor" id="open-review-box" class="btn btn-success btn-green">Leave a Review</a>
              </div>
              <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                  <form method="POST" action="productPage.php?id=<?php echo $paddyID?>&page=1" accept-charset="UTF-8">
				  <input name="_token" type="hidden" value="judkeKLbcKuAcR3yyrIfwcfvVXJ398ZnpQJZmxKV">                  
				  <input id="ratings-hidden" name="rating" type="hidden">                  
				  <textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50"></textarea>                  
				  <div class="text-right">
                    <div class="stars starrr" data-rating="0"></div>
                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> 
					<span class="glyphicon glyphicon-remove"></span>Cancel</a>
                    <button name="commentBtn" class="btn btn-success btn-lg" type="submit">Save</button>
                  </div>
                </form>                </div>
              </div>

                            <hr>
                <div class="row">
                  <div class="col-md-12">
                                   
                    <?php getReviews($row[0]);?>
                    <!--Anonymous <span class="pull-right">4 hours ago</span> 
                    
                    <p>asddsad woawow</p>-->
                  </div>
                </div>
                            <hr>
                <!--<div class="row">
                  <div class="col-md-12">
                                          <span class="glyphicon glyphicon-star"></span>
                                          <span class="glyphicon glyphicon-star"></span>
                                          <span class="glyphicon glyphicon-star"></span>
                                          <span class="glyphicon glyphicon-star"></span>
                                          <span class="glyphicon glyphicon-star-empty"></span>
                    
                    Anonymous <span class="pull-right">11 hours ago</span> 
                    
                    <p> Ooiiooooiihghh</p>
                  </div>
                </div>-->
                
                 <center>
					<?php 
					$sql = "SELECT COUNT(reviewID) AS total FROM paddyreview";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_row($result);
					$total_pages = ceil($row[0] / $results_per_page); // calculate total pages with results
					  
					for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
								echo "<a href='productPage.php?id=".$paddyID."&page=".$i."'";
								if ($i==$page)  echo " class='curPage'";
								echo ">".$i."</a> "; 
					}; 
					?>
					</center>  
                
                
                         <!--   <ul class="pagination">
			<li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=2">2</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=3">3</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=4">4</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=5">5</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=6">6</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=7">7</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=8">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=20">20</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=21">21</a></li><li><a href="http://demos.maxoffsky.com/shop-reviews/products/1?page=2">&raquo;</a></li>	</ul>
           --> </div>
        </div>
		<?php } ?>

    </div>

      <!--<footer>
        <div class="row">
          <div class="col-md-12">
            Created by <a href="http://maxoffsky.com" target="_blank">Maks</a>
          </div>
        </div>
      </footer>-->

    </div>
	<?php function check($paddyID,$table)
	{
		require("dbconfig/config.php");
			
		$sql1="SELECT rating FROM ".$table." WHERE Paddy_ID= '$paddyID'";

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
	}
	?>
	
	<?php
		function getReviews($paddyID)
		{
			
			require("dbconfig/config.php");
			//$res2=mysqli_query($con,$sql2);
			
			
					if (isset($_GET["page"])) 
					{ 
						$page  = $_GET["page"]; 
					} 
					else
					{ 
						$page=1; 
					};
					$start_from = ($page-1) * $results_per_page;
					$sql2 = "SELECT * FROM paddyreview WHERE paddyID= '$paddyID' LIMIT $start_from, ".$results_per_page;
					$rs_result2 = mysqli_query($con,$sql2);
				
					
					 $count = 0;
					 while($row2 = mysqli_fetch_row($rs_result2)) 
					 {
						echo "<div class='row'>
							<div class='col-md-12'>";
						$stars = round($row2[6]);
						$nostars = 5 - $stars;
						for($i=0;$i<$stars;$i++)
						{
							echo "<span class='glyphicon glyphicon-star'></span>";
						}
						for($j=0;$j<$nostars;$j++)
						{
							echo "<span class='glyphicon glyphicon-star-empty'></span>";
						}
						 echo $row2[2];//."<span class="pull-right">4 hours ago</span>"; 
                    
						 echo "<p>".$row2[5]."</p>";
							echo "</div>
							</div>
								<hr>";
					 }
		}
	?>
	
	
	
	<?php 
		if(isset($_POST['commentBtn']))
		{
			require("dbconfig/config.php");
			$rating = $_POST['rating'];
			$comment = $_POST['comment'];
			$date = date("Y-m-d");
			$time = date("h:i:sa");
				
			$query = "SELECT reviewID FROM paddyreview";
			$query_run = mysqli_query($con,$query);
			
			$oldno = mysqli_num_rows($query_run);
			$newno = (string)($oldno + 1);
			$prefix = "REV";
			$newid = $prefix.$newno;
			
			$sql5="INSERT INTO paddyreview VALUES('$newid','$paddyID','$un','$date','$time','$comment','$rating')";

			$res5=mysqli_query($con,$sql5);
		}
	?>
	
	<?php 
		 
		/*if(isset($_POST['placeOrderBtn']))
		{
			$available = $row[3];
			$qty = $_POST["quantity"];
			echo $available;
			echo "hi";
		}*/
	
	?>

    <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
      <script src="http://demos.maxoffsky.com/shop-reviews/js/expanding.js"></script>
  <script src="http://demos.maxoffsky.com/shop-reviews/js/starrr.js"></script>

  <script type="text/javascript">
    $(function(){

      // initialize the autosize plugin on the review text area
      $('#new-review').autosize({append: "\n"});

      var reviewBox = $('#post-review-box');
      var newReview = $('#new-review');
      var openReviewBtn = $('#open-review-box');
      var closeReviewBtn = $('#close-review-box');
      var ratingsField = $('#ratings-hidden');

      openReviewBtn.click(function(e)
      {
        reviewBox.slideDown(400, function()
          {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
          });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
      });

      closeReviewBtn.click(function(e)
      {
        e.preventDefault();
        reviewBox.slideUp(300, function()
          {
            newReview.focus();
            openReviewBtn.fadeIn(200);
          });
        closeReviewBtn.hide();
        
      });

      // If there were validation errors we need to open the comment form programmatically 
      
      // Bind the change event for the star rating - store the rating value in a hidden field
      $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
      });
    });
  </script>

</body>
</html>
