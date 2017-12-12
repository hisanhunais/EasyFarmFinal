<?php
	require '../../controller/connect.php';

	if(!empty($_POST))
	{
		$output = '';
		$message = '';
		$query = '';

		if(isset($_POST['completedata']))
		{
			$query = "UPDATE ordertable SET status = 'Completed' WHERE Ord_No = '".$_POST['completedata']."'";		
		}

		if(isset($_POST['proceeddata']))
		{
			$query = "UPDATE ordertable SET status = 'Ready' WHERE Ord_No = '".$_POST['proceeddata']."'";		
		}

		

		if(mysqli_query($conn,$query))
		{
			$select_query = "SELECT * FROM ordertable WHERE seller_username = 'KamalPerera' AND status = 'Pending' ORDER BY ord_Date DESC";
			$result = mysqli_query($conn,$select_query);
			$output .= '
				<table class="table table-striped table-hover">
						<tr>
							<th>Order Number</th>
							<th>Date</th>
							<th>Total</th>
							<th>Buyer</th>
							<th>Delivery Required</th>
							<th>Advance Receipt</th>
							<th></th>
							<th></th>
						</tr>
			';
			while($row = mysqli_fetch_row($result))
			{
				$output .= '
					<tr>
						<td>'.$row[0].'</td>
						<td>'.$row[1].'</td>
						<td>'.$row[2].'</td>
						<td>'.$row[5].'</td>
						<td>'.$row[8].'</td>
						<td>'.$row[10].'</td>
						<td><input type="button" name="view" value="View Details" id="'.$row[0].'" class="view_details btn btn-info btn-xs" /></td>
						<td>
				';
				if($row[8] == "No")
				{
					$output .= '<input type="button" name="completeview" value="Complete Order" id="'.$row[0].'" class="complete_order btn btn-info btn-xs" />';
				}

				if($row[10] != "None")
				{
					$output .= '<input type="button" name="proceedview" value="Proceed Order" id="'.$row[0].'" class="proceed_order btn btn-info btn-xs" />';
				}

				$output .= '</td></tr>';
			}
			$output .= '</table>';
		}
		echo $output;
	}
?>