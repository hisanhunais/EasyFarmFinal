<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="../../css/modal_image.css">-->
</head>
<body>

<?php
	$output = '';
		$message = '';
		$query = '';

		if(isset($_POST['completedata']))
		{
			$query = "UPDATE fer_ordertable SET status = 'Completed' WHERE Order_id = '".$_POST['completedata']."'";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));		
		}

	
		//$res = mysqli_query($con,$query) or die(mysqli_error($con));

	$sql1="SELECT * FROM fer_ordertable WHERE Fertilizer_username = 'Amal' AND status = 'Pending' ORDER BY Fer_date DESC";
	$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));

	$sql2="SELECT * FROM fer_ordertable WHERE Fertilizer_username = 'Amal' AND status = 'Completed' ORDER BY Fer_date DESC";
	$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
?>
	

	<div class="tab-content" id="orderTabs">
		<br>
	  	<div id="pending" class="tab-pane fade in active">
	  		<table class ="table table-striped table-hover">
				<tr>
					<th>Order Number</th>
					<th>Date</th>
					<th>Type</th>
					<th>Buyer</th>
					<th></th>
					<th></th>
				</tr>	
		
		<?php 
			while($row=mysqli_fetch_row($res1)){
		?>
			<tr>
				<td width="20%"><?php echo $row[0]; ?></td>
				<td width="20%"><?php echo $row[1]; ?></a></td>
				<td width="20%"><?php echo $row[2]; ?></td>
				<td width="20%"><?php echo $row[5]; ?></td>
				
				<td width="15%"><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>
				<td width="15%"><input type="button" name="proceedview" value="Complete Order" id="<?php echo $row[0]; ?>" class="complete_order btn btn-info btn-xs" /></td>
			</tr>		
		<?php 
			}
		?>
			</table>  
	  </div>

	  
	  	<div id="completed" class="tab-pane fade">
	    	<table class ="table table-striped table-hover">
				<tr>
					<th>Order Number</th>
					<th>Date</th>
					<th>Type/th>
					<th>Buyer</th>
					<th>Status</th>
					<th></th>
				</tr>	
		<?php 
			while($row=mysqli_fetch_row($res2))
			{
		?>
			<tr>
				<td width="20%"><?php echo $row[0]; ?></td>
				<td width="20%"><?php echo $row[1]; ?></a></td>
				<td width="20%"><?php echo $row[2]; ?></td>
				<td width="20%"><?php echo $row[5]; ?></td>
				<td width="20%"><?php echo $row[8]; ?></td>
				<td width="15%"><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td> 
			</tr>		
		<?php 
			}
		?>
		</table>
	  </div>
	  
	</div>	

	
</body>
</html>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background: #333333; color: #ffffff;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Order Details</h4>
			</div>
			<div class="modal-body" id="order_details">
		
			</div>
			<div class="modal-footer" style="background: #333333; color: #ffffff;">
				<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="completeOrder" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="complete_order_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Complete Order</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to Complete this Order?</p>
					<input type="hidden" name="completedata" id="completedata">
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Complete" id="complete" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>	



<div id="myModal" class="modal imgModal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>

<script>
	$(document).ready(function(){
		$('#update_status').on('submit',function(){
			//alert("hi");
		});

		$('.view_details').click(function(){
			var orderno = $(this).attr("id");

			$.ajax({
				url:"getFerOrderDetails.php",
				method:"post",
				data:{orderno:orderno},
				success:function(data){
					$('#order_details').html(data);
					$('#dataModal').modal("show");
				}
			});	
		});

		$(document).on('click', '.complete_order', function(){
			var com_ordID = $(this).attr("id");
			$('#completedata').val(com_ordID);
			$('#completeOrder').modal('show');
		});

		$('#complete_order_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"fertilizerOrderContent.php",
				method:"POST",
				data:$('#complete_order_form').serialize(),
				success:function(data)
				{
					$('#complete_order_form')[0].reset();
					$('#completeOrder').modal('hide');
					$('#orderTabs').html(data);
				}
			});
		});

		$(document).on('click', '.proceed_order', function(){
			var proc_ordID = $(this).attr("id");
			$('#proceeddata').val(proc_ordID);
			$('#proceedOrder').modal('show');
		});

		$('#proceed_order_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"processOrder1.php",
				method:"POST",
				data:$('#proceed_order_form').serialize(),
				success:function(data)
				{
					$('#proceed_order_form')[0].reset();
					$('#proceedOrder').modal('hide');
					$('#orderTabs').html(data);
				}
			});
		});

		/*$(document).on('click','.receipt',function(event){
			var img = event.target.id;
			var modal = document.getElementById('myModal');	
			var modalImg = document.getElementById("img01");
			modal.style.display = "block";
	    	modalImg.src = img;
		});*/
	});

	// Get the modal
//var modal = document.getElementById('myModal');
//var img =  $(".receipt").attr("id");
// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById('myImg');
//var modalImg = document.getElementById("img01");
//img.onclick = function(){
//    modal.style.display = "block";
//    modalImg.src = this.id;
//}


</script>

<script type="text/javascript">
	function openimage()
	{
		var modal = document.getElementById('myModal');
		var img =  $(".receipt").attr("id");	
		var modalImg = document.getElementById("img01");
		modal.style.display = "block";
    	modalImg.src = img;

	}

	// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>