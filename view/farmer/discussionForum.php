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

  		<script type="text/javascript">
			function PreviewImage()
			{
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("imgLink").files[0]);
				oFReader.onload = function(oFREvent)
				{
					document.getElementById("uploadPreview").src = oFREvent.target.result;
				};
			};
		</script>
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
					  			<div class="row" style="margin-bottom: 10px;">
					  				<div class="col-md-offset-10">
					  					<center>
					  					<button class="btn btn-success" data-toggle='modal' title="Discussion Forum" data-target="#addForum" style="font-family: arial;"><span class="glyphicon glyphicon-plus-sign" >  New</span></button>
					  					</center>
					  				</div>
					  			</div>
								<div class="row">
									<div class = "col-md-12" id="loadSection">
										<?php include 'discussionForumContent.php'; ?>			
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
    	<form method="POST" id="add_data_form">
	        <div class="modal-content">
	            <div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal">&times;</button>
	            	<h4 class="modal-title">Add Forum Post</h4>
	            </div>
            
                <div class="modal-body">                                
	                <div class="form-group">
	                  <label >Topic</label>
	                  <input type="text" name="topic" class="form-control" id="topic">
	                </div>
                                 
	                <div class="form-group">
	                  <label >Forum Post</label>
	                  <textarea name="editor1" class="form-control" id="editor1"></textarea>
	                  <!-- <input type="text" name="des" class="form-control" placeholder=" description" id="des"> -->
	                </div> 
                
                	<div class="form-group">
                		<center>
						<input type="file" id="imgLink" name="imgLink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();">
						<label>Ex: image.jpg, image.jpeg, image.png</label>
						<img id="uploadPreview" src="http://placehold.it/500x300" alt="" width="500px" height="300px" >
						</center>	
					</div>
                
                	<!-- <input type="hidden" name="attachdata" id="attachdata"> -->
                
                </div>
            
	            <div class="modal-footer">
	            	<input type="submit" name="submit" value="Submit" id="submit" class="btn main-color-bg" />
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            </div>
			</div>
		</form>
    </div>
</div>

<script>
	CKEDITOR.replace( 'editor1' );
</script>

<script>
	function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

	$(document).ready(function(){
		$('#add_data_form').on('submit',function(event){
			//alert("Clicked");
			event.preventDefault();
			CKupdate();

			$.ajax({
				url:"discussionProcess.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					$('#add_data_form')[0].reset();
					$('#addForum').modal('hide');
					$('#load_section').html(data);
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