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
	
	<link href="css/homepage.css" rel="stylesheet">

  </head>

  <body>
	
	<?php include 'header.php'; ?>
	
	<section id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<?php include 'sidebar-farmer2.php'; ?>
					<button type="button" onclick="loadDoc()">Change Content</button>
				</div>
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div id="loadSection" class = "col-md-12">
									<img src="Images/farmfinancetopheader" width="100%">
								</div>
							</div>						
					    </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--<script type="text/javascript">
		$(document).ready(function()
		{
			$('#a').on('click',function()
			{
				$('#loadSection').load('allPaddy.php');
			});
		});
	</script>-->

	<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("loadSection").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "allPaddy.php", true);
  xhttp.send();
}
</script>
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
