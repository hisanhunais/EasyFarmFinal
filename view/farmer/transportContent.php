<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	
</head>
<body>

	<?php
		$sql="SELECT * FROM ordertable WHERE seller_username = 'KamalPerera' AND status = 'pending' AND Transport_Request = 'Yes' ORDER BY ord_Date DESC";

		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	?>	

	<table class ="table table-striped table-hover">
		<tr>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Buyer</th>
			<th>Delivery Required</th>
			<th>Status</th>
			<th></th>
		</tr>	
		<?php 
			while($row=mysqli_fetch_row($res))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></a></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[8]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td> 
			</tr>		
		<?php 
			}
		?>
		</table>
</body>
</html>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Order Details</h4>
			</div>
			<div class="modal-body" id="order_details">
		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#update_status').on('submit',function(){
			//alert("hi");
		});

		$('.view_details').click(function(){
			var orderno = $(this).attr("id");

			$.ajax({
				url:"getOrderDetails.php",
				method:"post",
				data:{orderno:orderno},
				success:function(data){
					$('#order_details').html(data);
					$('#dataModal').modal("show");
				}
			});	
		});
	});
</script>