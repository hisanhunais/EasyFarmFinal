<?php
	//session_start();
	require "../../dbconfig/config.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Buyer</title>

    <!-- Bootstrap core CSS -->
   <!--  <link href="../../css/bootstrap.min.css" rel="stylesheet"> -->
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<!-- <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script> -->

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <meta name="description" content="">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- <script>
	$(document).ready(function(){
	    
	    $("#place_order").click(function(){
	        $("#enter_qty").show();
	    });

	    $("#cancel-order").click(function(){
	        $("#enter_qty").hide();
	    });
	});
	</script> -->
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
    .thumbnail{ /*padding: 0;*/}

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
      /*width: 100%;*/
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
      /*margin-top: 50px;
      margin-bottom: 30px;*/
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
					$un = "";
					$paddyid1 ="";
					$paddyID = "";
					$paddydesc = "";
					$imageLink = "";
					$paddytype = "";
					$tel="";
					$adNo = "";
					$adStreet = "";
					$city = "";

					if (isset($_GET["id"])) 
					{ 
						$paddyID  = $_GET["id"];
						$paddyid1 = $_GET["id"];
					} 
					
					
					
					$sql = "SELECT * FROM paddy WHERE Paddy_ID = '$paddyID'";
					$rs_result = mysqli_query($con,$sql);
				
					
					 
					 while($row = mysqli_fetch_row($rs_result)) 
					 {
					 	$paddytype = $row[1];
					 	//echo "<script>console.log( 'Debug Objects: " . $paddytype . "' );</script>";
					 	$sql3 = "SELECT * FROM paddytype WHERE type = '$paddytype'";
					 	$rs_result3 = mysqli_query($con,$sql3);
						 while($row3 = mysqli_fetch_row($rs_result3))
						 {
							 $paddydesc = $row3[2];
							 $imageLink = $row3[3];
						 }

						 $imageLink = "../../".$imageLink;

						 $un = $row[5];
						 $sql2 = "SELECT * FROM loginaa WHERE username = '$row[5]'";
						 
						 $rs_result2 = mysqli_query($con,$sql2);
						 while($row2 = mysqli_fetch_row($rs_result2))
						 {
							 $adNo = $row2[3];
							 $adStreet = $row2[4];
							$city = $row2[5];
							$tel = $row2[7];
						 }
						 $sql4 = "SELECT COUNT(*) FROM paddyreview WHERE paddyID= '$paddyID'";
						 $rs_result4 = mysqli_query($con,$sql4);
						 $row4 = mysqli_fetch_row($rs_result4);

					  
						 
						 
					?>
					<div class="col-md-12">
            <div class="thumbnail">
              <!--<img src="http://placehold.it/820x320" alt="">-->
              <center>
              <img src="<?php echo $imageLink; ?>" alt="" style="width: 640px; height: 400px;">
              </center>
              <div class="caption-full">
                  <h4 class="pull-right">Rs.<?php echo $row[2];?></h4>
                  <h4><?php echo $row[1];?></h4>
				  
                  <p><?php echo $paddydesc; ?></p>
                  
				  <p><?php echo $row[5];?></p>
				  <p><?php echo $tel;?></p>
				  <p><?php echo $adNo.", ".$adStreet.", ".$city;?></p>
				  <p>Available : <?php echo $row[3];?>kg</p>
			  </div>
              <div class="ratings">
				  
                  <p class="pull-right"><?php echo $row4[0]; ?> Reviews</p>
                  <p><?php check($row[0],"paddy");?>
                                         
                  </p>
				  <center><!-- <p><button id="place_order" type="button" class="btn btn-success">Place Order</button> -->
				  	<!--<button id="place_order" type="button" class="btn btn-success" data-toggle="modal" data-target="#orderModal">Place Order</button>-->
				  	<div id="enter_qty" style="/*display: none;*/" data-ng-app="" data-ng-init="quantity=0;price=<?php echo $row[2];?>">
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
						  	<br>
						  </div>
						  <div class="row">
						  	<p>Delivery Required:</p>
							  <div>
							    <input type="radio" id="deliveryChoice1"
							     name="delivery" value="Yes">
							    <label for="deliveryChoice1">Yes</label>

							    <input type="radio" id="deliveryChoice2"
							     name="delivery" value="No" checked>
							    <label for="deliveryChoice2">No</label>
							  </div>
						  </div>
						  <br>
						  <input type="hidden" name="availableqty" value="<?php echo $row[3];?>">
						  <input name ="placeOrderBtn" type="submit" class="btn btn-success" value="Place Order" />
						  <!-- <label class="btn btn-danger btn-sm" id="cancel-order" style="margin-left:10px;"> 
						  <span class="glyphicon glyphicon-remove"></span>Cancel</label> -->
						  </form>
						  </div>
						</div>
				  	</div>
				  </p></center>
				  
              </div>
            </div>
            <div class="well" id="reviews-anchor">
              <div class="row">
                <div class="col-md-12">
                                                                      </div>
              </div>
              <!--<div class="text-right">
                <a href="#reviews-anchor" id="open-review-box" class="btn btn-success btn-green">Leave a Review</a>
              </div>-->
              <div class="row" id="post-review-box" style="/*display:none;*/">
                <div class="col-md-12">
                  <!--<form method="POST" action="productPage.php?id=<?php echo $paddyID?>&page=1" accept-charset="UTF-8">-->
                  <form method="POST" action="submitReview.php?id=<?php echo $paddyID; ?>&user=<?php echo $un; ?>" accept-charset="UTF-8">	
				  <input name="_token" type="hidden" value="judkeKLbcKuAcR3yyrIfwcfvVXJ398ZnpQJZmxKV">                  
				  <input id="ratings-hidden" name="rating" type="hidden">                  
				  <textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50"></textarea>                  
				  <div class="text-right">
                    <div class="stars starrr" data-rating="0"></div>
                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> 
					<span class="glyphicon glyphicon-remove"></span>Cancel</a>
                    <button name="commentBtn" class="btn btn-success" type="submit">Save</button>
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
                
                
                
                </div>
        </div>
		<?php } ?>

    </div>

      

    </div>
	<?php function check($paddyID,$table)
	{
		require("../../dbconfig/config.php");
			
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
			
			require("../../dbconfig/config.php");
			//$res2=mysqli_query($con,$sql2);
			
					$sql2 = "SELECT * FROM paddyreview WHERE paddyID= '$paddyID'";
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
		/*if(isset($_POST['commentBtn']))
		{
			require("../../dbconfig/config.php");
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
		*/
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
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>-->
  </body>
</html>
