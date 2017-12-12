<?php
	//session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Farmer</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link href="css/homepage.css" rel="stylesheet">
	<!--<script>
        $(document).ready(function(){
            setInterval(function() {
                $("#comment-body").load("loadComments.php");
            }, 1000);
        });

    </script>-->
  </head>

  <body>
	
	<?php include 'header.php';
	$GLOBALS['forumid']="";
	?>
	
	<section id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<?php include 'sidebar-farmer.php'; ?>
				</div>
				<div class="col-md-9">
					<div class="panel panel-default">
					    <div class="panel-body">
							<div class="row">
								<div class = "col-md-12">
									<?php
										require 'dbconfig/config.php';
									?>	
									<?php
									$forumid = $_GET['id'];
									$forumID = $_GET['id'];
									$sql="SELECT * FROM discussionforum WHERE Forum_ID = '$forumID'";
									$date = "";
									$time = "";
									$username = "";
									$category = "";
									$topic = "";
									$post = "";
									$res=mysqli_query($con,$sql) or die(mysqli_error($con));
				
									if($res)
									{
										while($row=mysqli_fetch_row($res))
										{
											$username = $row[1];
											$date = $row[2];
											$time = $row[3];
											$category = $row[4];
											$topic = $row[5];
											$post = $row[6];
										}
									}
				
		
									echo	"
											<p class='pull-right'>Date : $date<br>Time: $time</p>
											
											<p>Category : $category</p>
											<p>Topic : $topic</p>
											<p>Post : $post</p>
											
											";
											
			
			/*		
			$sql = "SELECT * FROM order_details WHERE order_No = $ordNo";
			$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
			
					

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					//echo "<table border=0>
					echo   "<tr>
							<td>$row[2]</td>
							<td>$row[3]</td>
							</tr>";
							
					
					

					echo "</div>";
				}
				echo"</table>";
				echo "</div>";
				echo "</div>";
			}else{
				echo "error".mysql_error();
			}*/
	?>

									<form method="POST" action="insertComments.php?id=<?php echo $forumid?>" accept-charset="UTF-8">                 
										<textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50"></textarea><br>                  
										<div class="text-right">
											<button name="commentButton" class="btn btn-success btn-green" type="submit">Save</button>
										</div>
									</form>  
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
					    <div class="panel-body" id = "comment-body">
							<?php getComments($_GET['id']);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
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
					$sql2 = "SELECT * FROM discussiondetails WHERE forumID= '$forumID' ORDER BY commentID DESC";
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
	
	<?php 
		/*if(isset($_POST['commentButton']))
		{
			require("dbconfig/config.php");
			$un = "Anonymous";
			$forID = $_GET['id'];
			$comment = $_POST['comment'];
			$date = date("Y-m-d");
			$time = date("h:i:sa");
				
			$query = "SELECT commentID FROM discussiondetails";
			$query_run = mysqli_query($con,$query);
			
			$oldno = mysqli_num_rows($query_run);
			$newno = (string)($oldno + 1);
			$prefix = "COM";
			$newid = $prefix.$newno;
			
			$sql5="INSERT INTO discussiondetails VALUES('$newid','$forID','$un','$date','$time','$comment')";
			
			$res5=mysqli_query($con,$sql5);
			//header("location:discussiondetails.php?id=$forumid");
		}*/
	?>
	
<!--<script>
function ajaxCall() {
    $.ajax({
        url: "loadComments.php", 
        success: (function (result) {
            $("#comment-body").html(result);
        })
    })
};

ajaxCall(); // To output when the page loads
setInterval(ajaxCall, (2 * 1000)); // x * 1000 to get it in seconds
</script>-->
	
	
	
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
