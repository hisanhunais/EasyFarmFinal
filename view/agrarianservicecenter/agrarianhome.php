<?php
	//session_start();
?>
<?php  
                    include("../../controller/connect.php"); 
 session_start();
$sessionID=$_SESSION["username"];

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

		<script

  			src="https://code.jquery.com/jquery-3.2.1.js"
  			integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  			crossorigin="anonymous">
  				
  		</script>
      <style>
         .dash-box{
          text-align: center;
      }
    </style>
       

  	</head>

  	<body>

		<?php include 'header.php'; ?>
	
		<section id="main">
    		<div class="container-fluid">
        		<div class="row">
        			<!-- include side bar -->
            		<div class="col-md-3">
                		 <?php include 'sidebar.php'; ?>
            		</div>

					<div class="col-md-9">
						<div class="panel panel-default">
                  <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Home</h3>
                        
                      </div>
					  		<div class="panel-body">
								<div class="row">

									<div class = "col-md-12" id="loadSection">
                    <?php  

                    $query = "SELECT count(username) FROM login WHERE type='Farmer'";
                    $res = mysqli_query($conn,$query);
                    
                    if($res){ 
                        while($row=mysqli_fetch_row($res)){
                          $no = $row[0];
                        }
                      }
                   

                        $date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
                        $date = $date1->format('Y-m-d');
                      $query1=" SELECT count(An_ID) FROM announcement WHERE  Date>'$date' and Topic LIKE '%Meeting%'   ";
                      $res1 = mysqli_query($conn,$query1);
                    
                    if($res1){ 
                        while($row=mysqli_fetch_row($res1)){
                          $meeting = $row[0];
                        }
                      }

                      
                      $query2="SELECT count(Forum_ID) FROM discussionforum where MONTH(`Date`)=MONTH(NOW())";
                         $res2 = mysqli_query($conn,$query2);
                    
                    if($res2){ 
                        while($row=mysqli_fetch_row($res2)){
                          $discussion = $row[0];
                        }
                      }

                       ?>
										<div class="col-md-4">
                      <div class ="well dash-box">
                        <!-- farmer profiles -->
                        <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php  echo $no  ?></h2>
                        <h4> Farmer Profiles </h4><h6>currently registered</h6>
                        
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class ="well dash-box">
                       <!--  discussion forum -->
                       <h2><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> <?php  echo $meeting  ?></h2>
                        <h4> Due Meetings  </h4><h6>to be held</h6>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class ="well dash-box">
                       <!--  announcements -->
                       <h2><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?php  echo $discussion  ?> </h2>
                        <h4>  Discussions Forums  </h4><h6>posted in current month</h6>
                      </div>
                    </div>

                   <!--  <div class="col-md-3">
                      <div class ="well dash-box">
                       reports-->
                      <!-- </div> -->
                    <!-- </div>  -->
                    </div>
									</div>
                  <div class="panel panel-default">
                  <div class="panel-heading ">
                        <h3 class="panel-title">Latest Comments </h3>
                        
                      </div>
                <div class="panel-body">
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


