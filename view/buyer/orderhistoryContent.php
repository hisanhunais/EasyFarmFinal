<?php
	require '../../dbconfig/config.php';
?>



	<!--<link rel="stylesheet" type="text/css" href="../../css/modal_image.css">-->

	<script type="text/javascript">
	function PreviewImage()
	{
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("imgLink1").files[0]);
		oFReader.onload = function(oFREvent)
		{
			document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
	};
</script>




<?php

	if(isset($_POST['attachdata']))
{
	
	$img_name = $_FILES['imgLink']['name'];
	$img_size = $_FILES['imgLink']['size'];
	$img_tmp = $_FILES['imgLink']['tmp_name'];
	$directory = "uploads/";
	$target_file = $directory.$img_name;
	$db_file = "../../".$target_file;

	move_uploaded_file($img_tmp, $db_file);

	$query = "UPDATE ordertable SET advance_receipt = '".$db_file."' WHERE Ord_No = '".$_POST['attachdata']."'";
	$query_run = mysqli_query($con,$query);
	
}

	if(isset($_POST['canceldata']))
	{
		$ordnumber = $_POST['canceldata'];
		$statement = "SELECT * FROM ordertable WHERE Ord_No = '".$ordnumber."'";
		$ress = mysqli_query($con,$statement);
		$pro = mysqli_fetch_assoc($ress);

		$qty = $pro["Quantity"];
		$proid = $pro["prod_ID"];

		$statement2 = "SELECT * FROM paddy WHERE Paddy_ID = '".$proid."'";
		$ress2 = mysqli_query($con,$statement2);
		$pro2 = mysqli_fetch_assoc($ress2);
		$qty2 = $pro2["Paddy_quantity"];

		$newqty = $qty2 + $qty;
		$sql7 = "UPDATE paddy SET Paddy_quantity = '$newqty' WHERE Paddy_ID = '$proid'";
		$res7=mysqli_query($con,$sql7);

		$query1 = "DELETE FROM ordertable WHERE Ord_No = '".$_POST['canceldata']."'";
		$query_run1 = mysqli_query($con,$query1);	
	}

	$sql1="SELECT * FROM ordertable WHERE buyer_username = 'Nimal' AND status = 'Pending' OR status = 'Delivery Ready' ORDER BY ord_Date DESC";
	$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));

	$sql2="SELECT * FROM ordertable WHERE buyer_username = 'Nimal' AND status = 'Dispatched' OR status = 'Delivery Accepted' ORDER BY ord_Date DESC";
	$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));

	$sql3="SELECT * FROM ordertable WHERE buyer_username = 'Nimal' AND status = 'Completed' ORDER BY ord_Date DESC";
	$res3=mysqli_query($con,$sql3) or die(mysqli_error($con));
?>
	<!--<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
	  <li><a data-toggle="tab" href="#dispatched">Dispatched</a></li>
	  <li><a data-toggle="tab" href="#completed">Completed</a></li>
	</ul>-->

	<div class="tab-content" id="orderTabs">
		<br>
	  <div id="pending" class="tab-pane fade in active">
	  	<table class ="table table-striped table-hover">
		<tr>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Farmer</th>
			<th>Delivery Required</th>
			<th>Status</th>
			<th>Advance Receipt</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>	
		<?php 
			while($row=mysqli_fetch_row($res1))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></a></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[6]; ?></td>
				<td><?php echo $row[8]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<!--<td class="receipt" id="<?php echo $row[10]; ?>" onclick="openimage()"><a href="#"><?php echo $row[10]; ?></a></td>-->
				
				
				
		<?php
			if($row[8]=="Yes")
			{
				if($row[10] == "None")
				{
		?>
				<td>None</td>
				<td><input type="button" name="attachview" value="Attach Receipt" id="<?php echo $row[0]; ?>" class="attach_receipt btn btn-info btn-xs" /></td>
				
		<?php
				}
				else
				{
		?>
				<td><img id="myImg" src="<?php echo $row[10]; ?>" alt="" width="30" height="20" > Click to View</td>
				<td></td>
		<?php
				}
		?>

		<?php
			}
			else
			{
				
		?>
				

		
				<td></td>
				<td></td>
		<?php
			}
		?>  
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>

		<?php

				$date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
				$date = $date1->format('Y-m-d');
				$ordDate = $row[1];
				$dated1 = date_create($date);
				$dated2 = date_create($ordDate);
				$diff=date_diff($dated1,$dated2);
				if( $diff->days <= 5)
				{
					if($row[8] == "No")
					{
						?>
						
						<td><input type="button" name="cancelview" value="Cancel Order" id="<?php echo $row[0]; ?>" class="cancel_order btn btn-danger btn-xs" /></td> 
						<?php
					}
					else
					{
						if($row[9] == "Pending")
						{
							?>
							 <td><input type="button" name="cancelview" value="Cancel Order" id="<?php echo $row[0]; ?>" class="cancel_order btn btn-danger btn-xs" /></td> 
							<?php
						}
						else
						{
							?>
							
							 <td></td> 
							<?php
						}
					}
				}
				else
				{
					?>
					<td></td>
					<?php
				}
		?>
			</tr>		
		<?php 
			}
		?>
		</table>  
	  </div>
	  <div id="dispatched" class="tab-pane fade">
	    <table class ="table table-striped table-hover">
		<tr>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Farmer</th>
			<th>Status</th>
			<th></th>
		</tr>	
		<?php 
			while($row=mysqli_fetch_row($res2))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></a></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[6]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td> 
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
			<th>Total</th>
			<th>Farmer</th>
			<th></th>
		</tr>	
		<?php 
			while($row=mysqli_fetch_row($res3))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></a></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[6]; ?></td>
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td> 
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

<div id="attachReceipt" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="attach_receipt_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Attach Receipt</h4>
				</div>
				<div class="modal-body">
					<center>
					<input type="file" id="imgLink1" name="imgLink1" accept=".jpg,.jpeg,.png" onchange="PreviewImage();">
					<br>
					
					<div>
						<img id="uploadPreview" src="http://placehold.it/500x300" alt="" width="500px" height="300px">
						<input type="hidden" name="attachdata" id="attachdata">
					</div>
					</center>
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Submit" id="submitReceipt" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="cancelOrder" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="cancel_order_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cancel Order</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to Cancel this Order?</p>
					<input type="text" name="canceldata" id="canceldata">
				</div>
				<div class="modal-footer">
					<input type="submit" name="cancel" value="Cancel Order" id="cancel" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>	


<div id="myModal" class="modal imgModal">
  <span class="close" id="closeBtn">&times;</span>
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
				url:"getOrderDetails.php",
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
				url:"processOrder.php",
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

		$(document).on('click', '.cancel_order', function(){
			var can_ordID = $(this).attr("id");
			$('#canceldata').val(can_ordID);
			$('#cancelOrder').modal('show');
		});

		$('#cancel_order_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"orderhistoryContent.php",
				method:"POST",
				data:$('#cancel_order_form').serialize(),
				success:function(data)
				{
					$('#cancel_order_form')[0].reset();
					$('#cancelOrder').modal('hide');
					$('#orderTabs').html(data);
				}
			});
		});

		$(document).on('click', '.attach_receipt', function(){
			var attach_ordID = $(this).attr("id");
			$('#attachdata').val(attach_ordID);
			$('#attachReceipt').modal('show');
		});

		$('#attach_receipt_form').on('submit',function(event){
			event.preventDefault();

			if(document.getElementById("imgLink").value == "")
			{
				alert("Please Upload an Image");
			}
			else
			{
			$.ajax({
				url:"orderhistoryContent.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					$('#attach_receipt_form')[0].reset();
					$('#attachReceipt').modal('hide');
					$('#orderTabs').html(data);
				}
			});
			}
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

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
//var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    //captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementById("closeBtn");

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>


