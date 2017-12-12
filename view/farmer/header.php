<nav class = "navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php">EasyFarm</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<!--<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>-->
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">WELCOME <?php echo @$_SESSION['username']; ?></a></li>
					<li><a href="../../index.php">LogOut</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<header id="header" style="background: #333333; color: #ffffff; padding-bottom: 7px; margin-bottom: 5px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Farmer <small>Profile</small></h1>
				</div>
				<div class="col-md-2">
					
				</div>
			</div>
		</div>
	</header>
	
	<section id="breadcrumb">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<!--<li class="active"></li>-->
			</ol>
		</div>
	</section>