<?php
	session_start();
?>
<?php
	require '../../controller/connect.php';

	if(!empty($_POST)){
		$output = '';
		$message = '';

			if(isset($_POST['deletedata'])){
				$query = "DELETE FROM fertilizer WHERE Fer_ID = '".$_POST['deletedata']."'";
				$message = "Data Deleted";
			}
			else{
		//$img_name = $_FILES['imgLink']['img_name'];
		// $img_size = $_FILES['imgLink']['size'];
		// $img_tmp = $_FILES['imgLink']['tmp_name'];
		// $directory = "uploads/";
		// $subdirectory = "fertilizer/";
		//$target_file = $directory.$subdirectory.$img_name;
		//$db_file = "../../".$target_file;

		//move_uploaded_file($img_tmp, $db_file);			

				if(isset($_POST['fertilizerID1'])){
			
					$name = mysqli_real_escape_string($conn,$_POST['item_name1']);
					$qty = mysqli_real_escape_string($conn,$_POST['item_qty1']);
					$price = mysqli_real_escape_string($conn,$_POST['item_price1']);
					$item_desc =  mysqli_real_escape_string($conn,$_POST['item_des1']);
					$query = "UPDATE fertilizer SET Fer_type = '$name', Fer_price = '$price', Fer_quantity = '$qty' ,Fer_description= 'item_desc' WHERE Fer_ID = '".$_POST['fertilizerID1']."'";
					$message = "Data Updated";	

				}else{

					$name = mysqli_real_escape_string($conn,$_POST['item_name']);
					$qty = mysqli_real_escape_string($conn,$_POST['item_qty']);
					$price = mysqli_real_escape_string($conn,$_POST['item_price']);
					$item_desc =  mysqli_real_escape_string($conn,$_POST['item_des']);
					$date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
					$date = $date1->format('Y-m-d');
					$username = $_session["username"];

					$query1 = "SELECT Fer_id FROM fertilizer";
					$query_run = mysqli_query($conn,$query1);
					$oldno = mysqli_num_rows($query_run);
					$newno = (string)($oldno + 1);
					$prefix = "F";
					$newid = $prefix.$newno;
			
			
					$query = "INSERT INTO fertilizer VALUES(,$newid','$price','$qty','kg',$date','$username','dasg',$item_desc')";
					$message = "Data Inserted";		
				  }
				}
	
					if(mysqli_query($conn,$query)){
						$output .= '<label class="alert alert-success">'.$message.'</label>';
						$select_query = "SELECT * FROM fertilizer";
						$result = mysqli_query($conn,$select_query);
						$output .= '
							<table class="table table-bordered">
								<tr>
								<th width="20%"><b>Name</b></th>
								<th width="20%"><b>Price (Rs)</b></th>
								<th width="20%"><b>Quantity (kg)</b></th>
								<th width="10%"></th>
								<th width="10%"></th>
							</tr> ';
							while($row = mysqli_fetch_row($result)){
							$output .= '
								<tr>
					  				<td width="20%">'.$row[1].'</td>
									<td width="20%">'.$row[2].'</td>
									<td width="20%">'.$row[3].'</td>
									<td width="10%"><input type="button" name="edit" value="Edit" id="'.$row[0].'" class="btn btn-info btn-xs edit_data" ></td>
									<td width="10%"><input type="button" name="delete" value="Delete" id="'.$row[0].'" class="btn btn-info btn-xs delete_data btn-danger" ></td>
								</tr>';
							}
							$output .= '</table>';
					}
					echo $output;
	}
	?>