<?php
	require '../../controller/connect.php';

	if(empty($_POST))
	{
		$output = '';
		$message = '';
		
		$type = mysqli_real_escape_string($conn,$_POST['type']);
		$Description = mysqli_real_escape_string($conn,$_POST['description']);
		
		$img_name = $_FILES['imgLink']['name'];
		$img_size = $_FILES['imgLink']['size'];
		$img_tmp = $_FILES['imgLink']['tmp_name'];
		$directory = "uploads/";
		$subdirectory = "Admin/";
		$target_file = $directory.$subdirectory.$img_name;
		$db_file = "../../".$target_file;

		move_uploaded_file($img_tmp, $db_file);			

		if($_POST['paddyID'] = '')
		{
			$query = "INSERT INTO paddytype(type,description,image) VALUES('$type','$Description','$target_file')";
				header('location:paddytype.php');


		if(mysqli_query($conn,$query))
		{
			$output .= '<label class="alert alert-success">'.$message.'</label>';
			$select_query = "SELECT * FROM paddytype";
			$result = mysqli_query($conn,$select_query);
			?>
			$output = 
				<table class="table table-bordered">
						<tr>
							<th width="20%"><b>type</b></th>
							<th width="20%"><b>description</b></th>
							<th width="20%"><b>Image</b></th>
							<th width="10%"></th>
							
						</tr>
			
			<?php
			while($row = mysqli_fetch_row($result))
			{
				?>
				$output = 
					<tr>
					  	<td width="20%">'.$row[1].'</td>
						<td width="20%">'.$row[2].'</td>
						<td width="20%">'.$row[3].'</td>
						<td width="20%">Image<!--<img src="<?php echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--></td>
						
						<td width="10%"><input type="button" name="delete" value="Delete" id="'.$row[0].'" class="btn btn-info btn-xs delete_data" ></td>
					</tr>
	
		<?php  header('location:paddytype.php');}}}}
		
?>