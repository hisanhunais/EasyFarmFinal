<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Farmer</title>

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
													<td width="20%"></td>
													<td width="20%"></td>
												</tr>
											</thead>
											<tbody>
												<?php
													include 'get_paddy_items.php';
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
		<form method="post" id="add_stock_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Item</h4>
				</div>
				<div class="modal-body">
					<label>Item Name</label>
					<select name="item_name" class="form-control" id="sel">
						<option value="default">Select an Item</option>
					 <?php
						require("../../dbconfig/config.php");

						$sql = "SELECT * FROM paddyType";
						$rs_result = mysqli_query($con,$sql);

						while($row = mysqli_fetch_row($rs_result))
						{
					?>
					
  						<option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
					
					<?php
						}

					?> 
					</select>

					<br>
					<!-- <center>
					<div>
						<img id="uploadPreview" src="http://placehold.it/320x150" alt="" width="320px" height="150px">
						<input type="hidden" name="attachdata" id="attachdata">
					</div>
					</center> -->
					<!--<input type="text" name="item_name" id="item_name" class="form-control" required="" />-->
					<br>
					<label>Quantity</label>
					<input type="number" name="item_qty" id="item_qty" class="form-control" required="" />
					<br>
					<label>Price</label>
					<input type="number" name="item_price" id="item_price" class="form-control" required="" />
					<br>
					<!--<label>Image</label>
					<input type="file" name="file_name" id="item_image" />-->
					<input type="text" name="paddyID" id="paddyID">
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Submit" id="insert" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="editStock" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="edit_stock_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Update Item</h4>
				</div>
				<div class="modal-body">
					<label>Item Name</label>
					<input type="text" name="item_name1" id="item_name1" class="form-control" readonly="true" />					
					<br>
					<label>Quantity Available</label>
					<input type="number" name="item_qty1" id="item_qty1" class="form-control" readonly="true" />
					<br>
					<label>Quantity Added</label>
					<input type="number" name="item_qty2" id="item_qty2" class="form-control" required="" />
					<br>
					<label>Price</label>
					<input type="number" name="item_price1" id="item_price1" class="form-control" required="" />
					<br>
					<!--<label>Image</label>
					<input type="file" name="file_name" id="item_image" />-->
					<input type="text" name="paddyID1" id="paddyID1">
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Update" id="update" class="btn main-color-bg" />
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
				data:$('#add_stock_form').serialize(),
				success:function(data)
				{
					$('#add_stock_form')[0].reset();
					$('#addStock').modal('hide');
					$('#stock_table').html(data);
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

<script type="text/javascript">
$(document).ready(function() {
    $("#sel").change(function() {
        var imgUrl = $(this).val();
        $.ajax({
        	url:"swapimage.php",
        	method:"POST"
        });
        $("#uploadPreview").attr("src", imgUrl);
    });
});
</script>

