<?php

 
	

require '../../controller/connect.php';
if(!empty($_POST))
	{
if(isset($_POST['submit']))
{
	$comment=$_POST['deletedata'];
	$sql = "DELETE FROM paddyreview WHERE reviewID='$comment'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
header('location:comments.php');
}
}