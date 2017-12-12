<?php
	require '../../controller/connect.php';

	if(!empty($_POST))
	{
		$output = '';
		$message = '';

		if(isset($_POST['deletedata']))
		{
			$query = "DELETE FROM paddy WHERE Paddy_ID = '".$_POST['deletedata']."'";
			$message = "Data Deleted";
		}
		else
		{
		
		
		$date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
		$date = $date1->format('Y-m-d');
		$username = "AmalPerera";

		if($_POST['paddyID1'] != '')
		{
			$name1 = mysqli_real_escape_string($conn,$_POST['item_name1']);
			$qty1 = mysqli_real_escape_string($conn,$_POST['item_qty1']);
			$qty2 = mysqli_real_escape_string($conn,$_POST['item_qty2']);
			$price1 = mysqli_real_escape_string($conn,$_POST['item_price1']);
			$newqty = $qty1 + $qty2;
			$query = "UPDATE paddy SET Paddy_price = '$price1', Paddy_quantity = '$newqty' WHERE Paddy_ID = '".$_POST['paddyID1']."'";
			$message = "Data Updated";
				
		}
		else
		{
			$name = mysqli_real_escape_string($conn,$_POST['item_name']);
			$qty = mysqli_real_escape_string($conn,$_POST['item_qty']);
			$price = mysqli_real_escape_string($conn,$_POST['item_price']);
			$query = "INSERT INTO paddy VALUES('PAD8','$name','$price','$qty','$date','$username',0)";
			$message = "Data Inserted";	
		}
		}

		

		if(mysqli_query($conn,$query))
		{
			$output .= '<label class="text-success">'.$message.'</label>';
			$select_query = "SELECT * FROM paddy";
			$result = mysqli_query($conn,$select_query);
			$output .= '
				<table class="table table-bordered">
						<tr>
							<th width="20%"><b>Name</b></th>
							<th width="20%"><b>Price (Rs)</b></th>
							<th width="20%"><b>Quantity (kg)</b></th>
							<th width="20%"></th>
							<th width="20%"></th>
						</tr>
			';
			while($row = mysqli_fetch_row($result))
			{
				$output .= '
					<tr>
					  	<td width="20%">'.$row[1].'</td>
						<td width="20%">'.$row[2].'</td>
						<td width="20%">'.$row[3].'</td>
						<td width="10%"><input type="button" name="edit" value="Edit" id="'.$row[0].'" class="btn btn-info btn-xs edit_data" ></td>
						<td width="10%"><input type="button" name="delete" value="Delete" id="'.$row[0].'" class="btn btn-info btn-xs delete_data" ></td>
					</tr>
				';
			}
			$output .= '</table>';
		}
		echo $output;
	}
?>