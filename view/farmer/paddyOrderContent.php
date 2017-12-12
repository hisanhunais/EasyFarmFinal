<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	<!--<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/homepage.css" rel="stylesheet">
	<script src="../../js/bootstrap.min.js"></script>-->

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>
<body>

	
	 <!--<table class ="table table-striped table-hover">
						<tr>
							
							<th>Order Number</th>
							<th>Date</th>
							<th>Total</th>
							<th>Buyer</th>
							<th>Status</th>
							<th></th>
							</tr>-->
						<!--</table>-->
	
		<!--<?php
		$sql="SELECT * FROM ordertable WHERE seller_username = 'KamalPerera' ORDER BY ord_Date DESC";

			$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
			
					;

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					//echo "<table border=0>
					echo   "<tr>
							<td>$row[0]</td>
							<td>$row[1]</a></td>
							<td>$row[2]</td>
							<td>$row[5]</td>
							<td>$row[9]</td>
							<td><a class= 'btn btn-primary' href='orderViewDetailsScreen.php?ordNo=$row[0]'>View Details</a></td>
							</tr>";
							
					
					

					echo "</div>";
				}
				echo"</table>";
			}else{
				echo "error".mysql_error();
			}
	?>-->

	<?php
		$sql="SELECT * FROM ordertable WHERE seller_username = 'KamalPerera' ORDER BY ord_Date DESC";

		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	?>	

	<table class ="table table-striped table-hover">
		<tr>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Buyer</th>
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
				<td><?php echo $row[9]; ?></td>
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td> 
			</tr>		
		<?php 
			}
		?>
		</table>
</body>
</html>

<!-- <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Some content.</p>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div> -->

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