<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="../../css/modal_image.css">-->
</head>
<body>
<?php


		$sql="SELECT * FROM paddyreview" ;
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<div class="tab-content" id="orderTabs">
		<br>

		<div id="farmers" class="tab-pane fade in active">
		  	<table class ="table table-striped table-hover">
			<tr>
				<th>Farmer Name</th>
				<th>Paddy Name</th>
				<th>Buyer Name</th>
				<th>Comment</th>
				<th></th>
				<th></th>
			</tr>
			<?php 
				while($row=mysqli_fetch_row($res))
				{
					$sub=substr($row[1],0,3);
					if($sub=="PAD"){
						$sql1= "SELECT * FROM paddy WHERE paddy_ID= '$row[1]'";
						$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
						
						while($row1=mysqli_fetch_row($res1))
							{
					?>

					<tr>
					<td><?php echo $row1[5]; ?></td>
					<td><?php echo $row1[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[5]; ?></td>
					<th></th>
					<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
			</tr>
			<?php
			}
		}
	}
			?>
			</table>
			</div>


			<div id="buyers" class="tab-pane fade">
		  	<table class ="table table-striped table-hover">
			<tr>
				<th>Fertilizer Seller</th>
				<th>Fertilize Name</th>
				<th>Farmer Name</th>
				<th>Comment</th>
				<th></th>
				<th></th>
			</tr>
			<?php 
				while($row=mysqli_fetch_row($res))
				{
					$sub=substr($row[1],0,3);
					if($sub=="FER"){
						$sql2= "SELECT * FROM paddy WHERE paddy_ID= '$row[1]'";
						$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
						
						while($row1=mysqli_fetch_row($res2))
							{
					?>

					<tr>
					<td><?php echo $row1[1]; ?></td>
					<td><?php echo $row1[1]; ?></td>
					<td><?php echo $row[5]; ?></td>
					<td><?php echo $row[5]; ?></td>
					<th></th>
					<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
			</tr>
			<?php
			}
		}
	}
			?>
			</table>
			</div>
		</div>
		</div>



		<div id="deleteStock" class="modal fade">
	<div class="modal-dialog">
		<form method="POST" id="delete_stock_form" action="commentsfunc.php">
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
					<input type="submit" name="submit" value="Delete" id="submit" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>	
</body>
</html>
	</body>
	</html>


	<script >

      $(document).on('click', '.view_details', function(){
      var del_ID = $(this).attr("id");
      $('#updatedata').val(del_ID);
       $.ajax({
          url:"getFarmerDetails.php",
          method:"post",
          data:{del_ID:del_ID},
          success:function(data){
              $('#details').html(data);
              $('#viewDescription').modal('show');
    }
  })
    });

    $(document).on('click', '.delete_data', function(){
      var del_ID = $(this).attr("id");
      $('#deletedata').val(del_ID);
      $('#deleteStock').modal('show');
    });
</script>
		