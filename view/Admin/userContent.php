
<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>

</head>
<body>

	<?php


		$sql="SELECT * FROM login WHERE type = 'Farmer' ";
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));

		$sql1="SELECT * FROM login WHERE type = 'Mill Owner' ";
		$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));

		$sql2="SELECT * FROM login WHERE type = 'Store Owner' ";
		$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));

		$sql3="SELECT * FROM login WHERE type = 'Fertilizer Seller' ";
		$res3=mysqli_query($con,$sql3) or die(mysqli_error($con));

		$sql4="SELECT * FROM login WHERE type = 'Paddy Marketing Board' ";
		$res4=mysqli_query($con,$sql4) or die(mysqli_error($con));

		?>
	<div class="tab-content" id="orderTabs">
		<br>

		<div id="farmers" class="tab-pane fade in active">
		  	<table class ="table table-striped table-hover">
			<tr>
				<th>User Name</th>
				<th>Contact number</th>
				<th></th>
				<th></th>
			</tr>
			<?php 
				while($row=mysqli_fetch_row($res))
				{
			?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[7]; ?></td>
					<td width="10%"><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>
					<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
				</tr>
			<?php
			}
			?>
			</table>
			</div>

		<div id="millOwners" class="tab-pane fade">
		  	<table class ="table table-striped table-hover">
			<tr>
				<th>User Name</th>
				<th>Contact number</th>
				<th></th>
				<th></th>
			</tr>
			<?php 
				while($row=mysqli_fetch_row($res1))
				{
			?>
				<tr>
					<td><?php echo $row[0]; ?></td>
					<td><?php echo $row[7]; ?></td>
					<td width="10%"><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>
					<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>


	<div id="fertilizerSellers" class="tab-pane fade">
	  	<table class ="table table-striped table-hover">
		<tr>
			<th>User Name</th>
			<th>Contact number</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
			while($row=mysqli_fetch_row($res2))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[7]; ?></td>
				<td width="10%"><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>
				<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>

		

		
	  
	<div id="storeOwners" class="tab-pane fade">
	  	<table class ="table table-striped table-hover">
		<tr>
			<th>User Name</th>
			<th>Contact number</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
			while($row=mysqli_fetch_row($res3))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[7]; ?></td>
				<td width="10%"><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>
				<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>

	<div id="paddyMarketingBoard" class="tab-pane fade">
	  	<table class ="table table-striped table-hover">
		<tr>
			<th>User Name</th>
			<th>Contact number</th>
			<th></th>
			<th></th>
		</tr>
		<?php 
			while($row=mysqli_fetch_row($res4))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[7]; ?></td>
				<td width="10%"><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>
				<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>
	
</div>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background: #333333; color: #ffffff;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">User Details</h4>
			</div>
			<div class="modal-body" id="order_details">
		
			</div>
			<div class="modal-footer" style="background: #333333; color: #ffffff;">
				<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="deleteStock" class="modal fade">
	<div class="modal-dialog">
		<form method="POST" id="delete_stock_form" action="func_profile.php">
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

<script>
$('.view_details').click(function(){
			var UserName = $(this).attr("id");

			$.ajax({
				url:"getOrderDetails.php",
				method:"post",
				data:{UserName:UserName},
				success:function(data){
					$('#order_details').html(data);
					$('#dataModal').modal("show");
				}
			});	
		});
</script>

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
