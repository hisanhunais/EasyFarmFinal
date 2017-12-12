<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Fertilizer Seller</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="../../css/bootstrap.min.css" rel="stylesheet">-->
	
	<link href="../../css/homepage.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!--<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>-->

  

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
								<ul class="nav nav-tabs">
								  <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
								  <li><a data-toggle="tab" href="#completed">Completed</a></li>
								  
								</ul>
								<?php include 'fertilizerOrderContent1.php';?>
							</div>
						</div>
					  </div>
					</div>
				</div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

	
     
  </body>
</html>
