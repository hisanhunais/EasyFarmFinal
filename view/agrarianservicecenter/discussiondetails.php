<?php //session_start();
//$sessionID=$_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Agrarian Service Center</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	
	<link href="../../css/homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>>
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<!-- 
      <script>
    	function showDiv() {
   		document.getElementById('commentDiv').style.display = "block";
	}
	</script> -->
	      <!--   <style>
            div.scroll {
    
                width: 950px;
                height: 200px;
                overflow: scroll;
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
					  	<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Discussion Forum</h3>
						
						</div>
 <div class="panel-body">
						<div class="row">
							<div class = "col-md-12" id="loadSection">
								<?php
										require '../../dbconfig/config.php';
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
											//$category = $row[4];
											$topic = $row[4];
											$post = $row[5];
										}
									}
				
		
									echo	"
											<p class='pull-right'>Date : $date<br>Time: $time</p>
											
											<!--<p>Category : $category</p>-->
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

									<form method="POST" action="insertcomment.php?id=<?php echo $forumid?>" accept-charset="UTF-8">                 
										<textarea rows="5" id="new-review" class="form-control animated" placeholder="Enter your review here..." name="comment" cols="50"></textarea><br>                  
										<div class="text-right">
											<button name="commentButton" class="btn btn-success btn-green" type="submit">Save</button>
										</div>
										<a href="agrariandiscussion.php"><button type="button" class="btn btn-success btn-green" name="btncancel">Back</button></a>
									</form> 
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					    <div class="panel-body" id = "comment-body">
					    	<div class=scroll>
							<?php getComment($_GET['id']);?>
						</div>
						</div>
					</div>


				</div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
<?php
		function getComment($forumID)
		{
			require("../../dbconfig/config.php");
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
		function getComments($forumID)
		{
			require("../../dbconfig/config.php");
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



	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>


