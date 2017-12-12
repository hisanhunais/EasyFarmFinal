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
   <!-- <link href="../../css/bootstrap.min.css" rel="stylesheet">-->
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	<!--<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
						<!--<div class="panel-heading main-color-bg">
							<h3 class="panel-title main-color-bg">Stock</h3>
						 </div>-->
						<div class="panel-body">
							<div class="row">
								<div class = "col-md-12" id="loadSection">
									<div class="table-responsive">
										<button type="button" class="btn btn-md main-color-bg" data-toggle="modal" data-target="#addStock">
											<span class="glyphicon glyphicon-plus-sign"> Add
										</button>
										<br><br>
										<div id="stock_table">
										<table class="table table-bordered">
											<thead>
												<tr>
													<td width="20%"><b>Name</b></td>
													<td width="20%"><b>Price (Rs)</b></td>
													<td width="20%"><b>Quantity (kg)</b></td>
													<td width="20%"><b>Image</b></td>
													<td width="10%"></td>
													<td width="10%"></td>
												</tr>
											</thead>
											<tbody>
												<?php
													include 'get_fertilizer_items.php';
												?>
              								</tbody>
										</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>
	        </div>
	    </div>
	</section>

<?php include 'footer.php'; ?>

<div id="addStock" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="add_stock_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Item</h4>
				</div>
				<div class="modal-body">
					<label>Item Name</label>
					<input type="text" name="item_name" id="item_name" class="form-control" required="" />
					<br>

					<input type="file" id="imgLink" name="imgLink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();">
					
					<br>
					<center>
					<div>
						<img id="uploadPreview" src="http://placehold.it/320x150" alt="" width="320px" height="150px">
						<input type="hidden" name="attachdata" id="attachdata">
					</div>
					</center>
					<br>
					<label>Quantity</label>
					<input type="number" name="item_qty" id="item_qty" class="form-control" required="" />
					<br>
					<label>Price</label>
					<input type="number" name="item_price" id="item_price" class="form-control" required="" />
					<br>
					<!--<label>Image</label>
					<input type="file" name="file_name" id="item_image" />-->
					<input type="hidden" name="fertilizerID" id="fertilizerID">
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Submit" id="insert" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="deleteStock" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="delete_stock_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete Item</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this item?</p>
					<input type="hidden" name="deletedata" id="deletedata">
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>	
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>-->
    <!--<script src="../../js/jquery.js"></script>-->
  </body>
</html>

<script>
	$(document).ready(function(){
		$('#add_stock_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"add_stock.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					$('#add_stock_form')[0].reset();
					$('#addStock').modal('hide');
					$('#stock_table').html(data);
				}
			});
		});

		$(document).on('click', '.edit_data', function(){
			var fertilizerID = $(this).attr("id");
			$.ajax({
				url:"fetch_stock.php",
				method:"POST",
				data:{fertilizerID:fertilizerID},
				dataType:"json",
				success:function(data)
				{
					$('#item_name').val(data.Fer_type);
					$('#item_qty').val(data.Fer_quantity);
					$('#item_price').val(data.Fer_price);
					$('#fertilizerID').val(data.Fer_ID);
					$('#insert').val('Update');
					$('#addStock').modal('show');
				}

			});
		});

		$(document).on('click', '.delete_data', function(){
			var del_fertilizerID = $(this).attr("id");
			$('#deletedata').val(del_fertilizerID);
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

