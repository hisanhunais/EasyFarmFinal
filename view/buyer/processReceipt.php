<?php
require '../../controller/connect.php';

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
	$query_run = mysqli_query($conn,$query);
	echo "OK";
}

?>