<?php
	require '../../controller/connect.php';

	if(!empty($_POST))
	{
		$output = '';
		$message = '';

		if(isset($_POST['deletedata']))
		{
			$query = "DELETE FROM announcement WHERE An_ID = '".$_POST['deletedata']."'";
			$message = "Data Deleted";
		}
		else
		{
		$date = mysqli_real_escape_string($conn,$_POST['date']);
		$time = mysqli_real_escape_string($conn,$_POST['time']);
		$category = mysqli_real_escape_string($conn,$_POST['category']);
		$topic = mysqli_real_escape_string($conn,$_POST['topic']);
		$des = mysqli_real_escape_string($conn,$_POST['des']);
		// $date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
		// $date = $date1->format('Y-m-d');
		

		if($_POST['fertilizerID'] != '')
		{
			$query = "UPDATE fertilizer SET Fer_type = '$name', Fer_price = '$price', Fer_quantity = '$qty' WHERE Fer_ID = '".$_POST['fertilizerID']."'";
			$message = "Data Updated";
				
		}
		else
		{
			$query = "INSERT INTO announcement VALUES('$date','$time','$category','$topic','$des')";
			$message = "Data Inserted";	
		}
		}

		

		if(mysqli_query($conn,$query))
		{
			$output .= '<label class="text-success">'.$message.'</label>';
			$select_query = "SELECT * FROM announcement";
			$result = mysqli_query($conn,$select_query);
			$output .= '
				<table class="table table-bordered">
                        <tr>
                    <th width="25%">Date</th>
                  <th width="25%">Announcement type</th>
                    <th width="25%">Time</th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                        </tr>
			';
			while($row = mysqli_fetch_row($result))
			{
				$output .= '
					<tr>
					  	<td width="20%">'.$row[1].'</td>
						<td width="20%">'.$row[3].'</td>
						<td width="20%">'.$row[2].'</td>
						<td width="20%">Image<!--<img src="<?php echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--></td>
						<td width="10%"><input type="button" name="edit" value="Edit" id="'.$row[0].'" class="btn btn-info btn-sm edit_data" ></td>
						<td width="10%"><input type="button" name="delete" value="Delete" id="'.$row[0].'" class="btn btn-danger btn-sm delete_data" ></td>
					</tr>
				';
			}
			$output .= '</table>';
		}
		echo $output;
	}
?>