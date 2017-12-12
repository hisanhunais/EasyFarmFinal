<?php

 
	

require '../../controller/connect.php';
if(!empty($_POST))
	{
if(isset($_POST['submit']))
{
	$paddyID=$_POST['deletedata'];
	$sql = "DELETE FROM paddytype WHERE type_ID='$paddyID'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
header('location:paddytype.php');
}
}