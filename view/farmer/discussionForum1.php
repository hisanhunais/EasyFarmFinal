<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Farmer</title>

  
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
  

  </head>

  <body>
	<!--<nav class = "navbar navbar-default">
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
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
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
	</section>-->

	<?php include 'header.php'; ?>
	
	<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!--<div class="list-group">
                    <a href="home.php" id="homeBtn" class="list-group-item">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
                    </a>
                    <a href="harvest.php" id="harvestBtn" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Harvest</a>
                    <a href="paddyOrder.php" id="paddyOrderBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Paddy Orders</a>
                    <a href="fertilizerOrder.php" id="fertilizerOrderBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Fertilizer Orders</a>
                    <a href="transport.php" id="transportBtn" class="list-group-item"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Transport</a>
                    <a href="announcement.php" id="announcementBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Announcements</a>
                    <a href="discussionForum.php" id="discussionBtn" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Discussion Forum</a>
                    <a href="report.php" id="reportBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
                </div>-->
                <?php include 'sidebar.php'; ?>
            </div>
			<div class="col-md-9">
					<div class="panel panel-default">
					  <div class="panel-heading main-color-bg">
						<h3 class="panel-title">Discussion Forum</h3>
						
					  </div>
					  <div class="panel-body">
					  	<div class="row" style="margin-bottom: 10px;">
					  		<div class="col-md-offset-10">
					  			<center>
					  			<button class="btn btn-success" data-toggle='modal' title="Discussion Forum" data-target="#addForum" style="font-family: arial;"><span class="glyphicon glyphicon-plus-sign" >  New</span></button>
					  			</center>
					  		</div>
					  	
					  </div>
						<div class="row">
							<div class = "col-md-12" id="loadSection">
								<?php

			require '../../dbconfig/config.php';

			$sql="SELECT * FROM discussionforum ORDER BY Date DESC" ; 

			$res=Mysqli_query($con,$sql);
			echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							
							<th width='150px'>Date</th>
							<th width='150px'>Category</th>
							<th width='150px'>Topic</th>
							<th width='250px'></th>
							</tr>
						
					";
					//echo "</table>";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					//echo "<div class='tbl'>";
					//echo "<table border=0 >
						echo "	<tr>
							<td width='150px'>$row[2]</td>
							<td width='150px'>$row[4]</td>
							<td width='150px'>$row[5]</td>
							<td width='250px'><button type='button' class='btn btn-secondary'><a href='discussionDetails.php?id=$row[0]'>View Description</a></button></td>
							
							</tr>
						
					";
					
				}
				echo "</div>";
				echo "</table>";
			}else{
				echo "error";
			}

		?>			
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

<div class="modal fade" id="addForum" role="dialog">
    <div class="modal-dialog">
    	<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
            	<h4 class="modal-title">Add Forum Post</h4>
            </div>
            <form method="POST" id="add_data_form">
                <div class="modal-body">                                
	                <div class="form-group">
	                  <label >Topic</label>
	                  <input type="text" name="topic" class="form-control" placeholder="Topic" id="topic">
	                </div>
                                 
	                <div class="form-group">
	                  <label >Forum Post</label>
	                  <textarea name="editor1" class="form-control" placeholder="Post Body"></textarea>
	                  <!-- <input type="text" name="des" class="form-control" placeholder=" description" id="des"> -->
	                </div> 
                
                	<div class="form-group">
                		<center>
						<input type="file" id="imgLink" name="imgLink" accept=".jpg,.jpeg,.png">
						<label>Ex: image.jpg, image.jpeg, image.png</label>
						<img id="uploadPreview" src="http://placehold.it/500x300" alt="" width="500px" height="300px">
						</center>	
					</div>
                
                	<input type="hidden" name="attachdata" id="attachdata">
                
                </div>
            </form>
            <div class="modal-footer">
            	<input type="submit" name="submit" value="Submit" id="submit" class="btn main-color-bg" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
		</div>
    </div>
</div>

<script>
	CKEDITOR.replace( 'editor1' );
</script>

<script>
	$(document).ready(function(){
		$('#add_data_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"add_forum.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					$('#add_data_form')[0].reset();
					$('#addForum').modal('hide');
					//$('#stock_table').html(data);
				}
			});
		});

		$(document).on('click', '.edit_data', function(){
			var paddyID = $(this).attr("id");
			$.ajax({
				url:"fetch_stock.php",
				method:"POST",
				data:{paddyID:paddyID},
				dataType:"json",
				success:function(data)
				{
					$('#item_name1').val(data.Paddy_type);
					$('#item_qty1').val(data.Paddy_quantity);
					$('#item_qty2').val(0);
					$('#item_price1').val(data.Paddy_price);
					//$('#item_price').val(data.Paddy_price);
					$('#paddyID1').val(data.Paddy_ID);
					$('#editStock').modal('show');
				}

			});
		});

		$('#edit_stock_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"add_stock.php",
				method:"POST",
				data:$('#edit_stock_form').serialize(),
				success:function(data)
				{
					$('#edit_stock_form')[0].reset();
					$('#editStock').modal('hide');
					$('#stock_table').html(data);
				}
			});
		});

		$(document).on('click', '.delete_data', function(){
			var del_paddyID = $(this).attr("id");
			$('#deletedata').val(del_paddyID);
			$('#deleteStock').modal('show');
		});

		$('#delete_stock_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"add_stock.php",
				method:"POST",
				data:$('#delete_stock_form').serialize(),
				success:function(data)
				{
					$('#delete_stock_form')[0].reset();
					$('#deleteStock').modal('hide');
					$('#stock_table').html(data);
				}
			});
		});
	});
</script>