<?php
	//session_start();
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

					  		<div class="panel-body">
								<div class="row">

									<div class = "col-md-12" id="loadSection">
										<img src="../../Images/farmfinancetopheader" width="100%">
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
