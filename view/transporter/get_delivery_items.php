<style type="text/css">
	p {
		white-space: pre;
	}
</style>
<div id="content">
<?php
require("../../dbconfig/config.php");
$flag = 0;
$charge = 0.0;
$distance = 0;

if(isset($_POST['acceptdata']))
{
	$orderNo = $_POST['acceptdata'];
	$sql3 = "UPDATE ordertable SET status = 'Delivery Accepted' WHERE Ord_No = '$orderNo'";
	$rs_result3 = mysqli_query($con,$sql3);

	$sqll = "INSERT INTO delivery VALUES('DEL1','$orderNo','Kapila','2017-12-10',$distance,$charge,'Pending')";
	mysqli_query($con,$sqll);
}

$sql1 = "SELECT * FROM delivery WHERE username = 'Kapila' AND status != 'Completed'";
$res = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($res);
$del_status = $row1["status"];
//echo "<script>console.log(".$del_status.");</script>";

if(mysqli_num_rows($res)>0)
{

	//$row1 = mysqli_fetch_assoc($res);
	//echo $row5["ord_ID"];
	$sql2 = "SELECT * FROM ordertable WHERE Ord_No = '".$row1["ord_ID"]."'";
	$rs_result = mysqli_query($con,$sql2);
	$flag = 1;
}
else
{
	$sql = "SELECT * FROM ordertable WHERE status = 'Delivery Ready'";
	$rs_result = mysqli_query($con,$sql);
}



while($row = mysqli_fetch_assoc($rs_result)) 
{
	$product = $row["Product"];
	$quantity = $row["Quantity"];

	$sql2 = "SELECT * FROM login WHERE username = '".$row["seller_username"]."'";
	$rs_result2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_assoc($rs_result2);

	$sql3 = "SELECT * FROM login WHERE username = '".$row["buyer_username"]."'";
	$rs_result3 = mysqli_query($con,$sql3);
	$row3 = mysqli_fetch_assoc($rs_result3);
?>


<div class="panel">
	<div class="panel-heading main-color-bg">
		<h3 class="panel-title">Order Number : <?php echo $row["Ord_No"]; ?></h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<center>
				<h5>Farmer : <?php echo $row["seller_username"]; ?></h5>
				<p>Name    :  <?php echo $row2["firstName"]." ".$row2["lastName"]; ?></p>
				<p>Address :  <?php echo $row2["addressNo"].", ".$row2["addressStreet"].", ".$row2["addressCity"]; ?></p>
				<p>Contact  :  <?php echo $row2["contactNo"]; ?></p>
				</center>
			</div>
			<div class="col-md-3">
				<center>
				<h5>Buyer : <?php echo $row["buyer_username"]; ?></h5>
				<p>Name    :  <?php echo $row3["firstName"]." ".$row3["lastName"]; ?></p>
				<p>Address :  <?php echo $row3["addressNo"].", ".$row3["addressStreet"].", ".$row3["addressCity"]; ?></p>
				<p>Contact  :  <?php echo $row3["contactNo"]; ?></p>
				</center>
			</div>
			<div class="col-md-3">
				<center>
				<h5>Delivery</h5>
				<p>Product    :  <?php echo $product; ?></p>
				<p>Quantity   :  <?php echo $quantity; ?> Kg</p>

<!-- echo $someArray[0];
echo $someArray['origin_addresses'][0];
echo $someArray['rows'][0]['elements'][0]['duration']['text'];
echo $someArray['rows'][0]['elements'][0]['distance']['text']; -->


				<!-- <p>Contact  :  <?php echo $row3["contactNo"]; ?></p> -->
				</center>
			</div>
			<div class="col-md-3">
				<center>
					<?php 
					$origin = $row2["latitude"].",".$row2["longitude"];
					$destination = $row3["latitude"].",".$row3["longitude"];
					$apiurl = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origin&destinations=$destination&key=AIzaSyCRM5CCp0gytfOJaxkwmqxDmyy6-FPPIws";
					$result = file_get_contents($apiurl);
					$someArray = json_decode($result, true);
					$distance = $someArray['rows'][0]['elements'][0]['distance']['text'];
					$duration = $someArray['rows'][0]['elements'][0]['duration']['text'];
					$charge = calculateCharge($distance,$quantity);

?>

				<h5>Journey</h5>
				<p>Distance  : <?php echo $distance; ?></p>
				<p>Duration  : <?php echo $duration; ?></p>
				<p>Duration  : <?php echo $charge; ?></p>	
				</center>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<center>
		<a href='deliveryMap.php?id=<?php echo $row['Ord_No']; ?>' id="view_details"><button type='button' class='btn btn-info btn-md main-color-bg' style="color: white;">View Map</button></a>

		<?php 
			if($flag == 0)
			{
				


		?>
		<input type="button" name="accept" value="Accept" id="<?php echo $row["Ord_No"]; ?>" class="btn btn-info btn-md main-color-bg accept_delivery" > 
		<!-- <button type="button" class="btn btn-secondary view_details" id="<?php echo $row['Ord_No']; ?>">View Details</button> -->
	    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->

	    
	    <?php
	    		
	    	}
	    	else
	    	{
	    		if($del_status == "Pending")
				{
	    		?>

	    		<a href="updateStatus.php?id=<?php echo $row["Ord_No"]; ?>&status=<?php echo $del_status; ?>"><input type="button" name="start" value="Start Delivery" id="<?php echo $row["Ord_No"]; ?>" class="btn btn-info btn-md btn-primary start_delivery" ></a>
	    		<?php
	    		}
	    		else if($del_status == "Started")
	    		{
	    ?>
	    		<a href="updateStatus.php?id=<?php echo $row["Ord_No"]; ?>&status=<?php echo $del_status; ?>"><input type="button" name="end" value="End Delivery" id="<?php echo $row["Ord_No"]; ?>" class="btn btn-info btn-md btn-danger end_delivery" ></a>
	    	<?php
	    		}
	    	}
	    ?>
	</center>	
	</div>
							
</div>



<?php              								 
}
?> 
</div>

<div id="acceptOrder" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="accept_order_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Accept Delivery</h4>
				</div>
				<div class="modal-body">
					<p><b><h4>Are you sure you want to Accept this Delivery?</h4></b></p>
					<p>By accepting this delivery, you agree to deliver the items within 2 days.<br>Once you accept the delivery, you cannot cancel and should deliver.
					<input type="hidden" name="acceptdata" id="acceptdata">
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Accept" id="accept" class="btn main-color-bg" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>   

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '.accept_delivery', function(){
			var accept_ordID = $(this).attr("id");
			$('#acceptdata').val(accept_ordID);
			$('#acceptOrder').modal('show');
		});

		$('#accept_order_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"get_delivery_items.php",
				method:"POST",
				data:$('#accept_order_form').serialize(),
				success:function(data)
				{
					$('#accept_order_form')[0].reset();
					$('#acceptOrder').modal('hide');
					$('#content').html(data);
				}
			});
		});
	});
</script>

<?php

	function calculateCharge($distancech,$quantitych)
	{
		require '../../dbconfig/config.php';
		$sqlch = "SELECT * FROM deliverycharges";
		$resultch = mysqli_query($con,$sqlch);
		$baseCharge = 250.00;
		$deliverych = 0.0;

		while($rowch = mysqli_fetch_assoc($resultch))
		{
			if($quantitych < $rowch["loadCapacity"])
			{
				$chargech = $rowch["unitCharge"];
				break;
			}
		}

		if($distancech > 1)
		{
			$deliverych = $baseCharge + (($distancech-1) * $chargech);
		}
		else
		{
			$deliverych = $baseCharge + ($distancech * $chargech);
		}

		return $deliverych;	
		 
	}
?>



<!-- <script>
	$(document).ready(function(){
		$('.view_details').click(function(){
			var orderno = $(this).attr("id");
			$.ajax({
				url:"deliveryMap.php",
				method:"post",
				data:{orderno:orderno},
				success:function(data){
					$('#loadSection').html(data);
				}
			});	
		});
	});
</script>   -->                          

