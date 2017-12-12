<?php session_start();
$sessionID=$_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<title>Agrarian Service Center</title>

    <!-- Bootstrap core CSS -->
    	<!--<link href="../../css/bootstrap.min.css" rel="stylesheet">-->
	
		<link href="../../css/homepage.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- 		<script

  			src="https://code.jquery.com/jquery-3.2.1.js"
  			integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  			crossorigin="anonymous">
  				
  		</script> -->

          <style>
            div.scroll {
    
                width: 900px;
                height: 400px;
                overflow: scroll;
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
                        <h3 class="panel-title">Farmer Profiles</h3>
                        
                      </div>
                      <div class="panel-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-offset-10">
                                <center>
                                <button class="btn btn-success"  data-toggle='modal' title="Insert Farmer Profiles" data-target="#adddata" style="font-family: arial;"><span class="glyphicon glyphicon-plus-sign" >  New</span></button>
                                </center>
                                <?php include('addprofiles.php'); ?>
                            </div>
                        
                      </div>
                        <div class="row">
                            <div class = "col-md-12" id="loadSection">
										      <?php include('viewprofiles.php'); ?>
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

    	<script src="js/bootstrap.min.js"></script>-->
  	</body>
</html>
