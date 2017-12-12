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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

  	<script type="text/javascript">
  		$( document ).ready(function() {
		  // Handler for .ready() called.
		});	
  	</script>

	<script>
	$(document).ready(function(){
	    $("#orderBtn").click(function(){
	        $("#homeBtn").removeClass("active");
	        $("#homeBtn").removeClass("main-color-bg");
	        $("#transportBtn").removeClass("active");
	        $("#transportBtn").removeClass("main-color-bg");
	        $("#reportBtn").removeClass("active");
	        $("#reportBtn").removeClass("main-color-bg");
	        $("#orderBtn").addClass("active");
	        $("#orderBtn").addClass("main-color-bg");
	    });
	    $("#transportBtn").click(function(){
	        $("#homeBtn").removeClass("active");
	        $("#homeBtn").removeClass("main-color-bg");
	        $("#orderBtn").removeClass("active");
	        $("#orderBtn").removeClass("main-color-bg");
	        $("#reportBtn").removeClass("active");
	        $("#reportBtn").removeClass("main-color-bg");
	        $("#transportBtn").addClass("active");
	        $("#transportBtn").addClass("main-color-bg");
	    });
	    $("#reportBtn").click(function(){
	        $("#homeBtn").removeClass("active");
	        $("#homeBtn").removeClass("main-color-bg");
	        $("#orderBtn").removeClass("active");
	        $("#orderBtn").removeClass("main-color-bg");
	        $("#transportBtn").removeClass("active");
	        $("#transportBtn").removeClass("main-color-bg");
	        $("#reportBtn").addClass("active");
	        $("#reportBtn").addClass("main-color-bg");
	    });
	    $("#homeBtn").click(function(){
	        $("#homeBtn").addClass("active");
	        $("#homeBtn").addClass("main-color-bg");
	        $("#orderBtn").removeClass("active");
	        $("#orderBtn").removeClass("main-color-bg");
	        $("#reportBtn").removeClass("active");
	        $("#reportBtn").removeClass("main-color-bg");
	        $("#transportBtn").removeClass("active");
	        $("#transportBtn").removeClass("main-color-bg");
	    });
	});
	</script>
  </head>

  <body>
	<nav class = "navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="homefe.php">EasyFarm</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<!--<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>-->
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">WELCOME</a></li>
					<li><a href="index.php">LogOut</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<section id="breadcrumb">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="active">Buyer Profile</li>
			</ol>
		</div>
	</section>
	
	<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" id="homeBtn" class="list-group-item active main-color-bg" onclick="loadDoc('home')">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
                    </a>
                    <a href="#" id="orderBtn" class="list-group-item" onclick="loadDoc('order')"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Order</a>
                    <a href="#" id="transportBtn" class="list-group-item" onclick="loadDoc('transport')"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Transport</a>
                    <a href="#" id="reportBtn" class="list-group-item" onclick="loadDoc('report')"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
                </div>
            </div>
			<div class="col-md-9">
					<div class="panel panel-default">
					  <!--<div class="panel-heading main-color-bg">
						<h3 class="panel-title">Home Buyer</h3>
						
					  </div>-->
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
	
		<script>
function loadDoc(btn) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("loadSection").innerHTML =
      this.responseText;
    }
  };
  if(btn == "order")
  {
  	xhttp.open("GET", "order.php", true);	
  }
  else if(btn == "transport")
  {
  	xhttp.open("GET", "transport.php", true);	
  }
  else if(btn == "report")
  {
  	xhttp.open("GET", "report.php", true);
  }
  else if(btn == "home")
  {
  	xhttp.open("GET", "home2.php", true);
  }
  
  xhttp.send();
}
</script>


	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
