<?php

 
	

require '../../controller/connect.php';
if(!empty($_POST))
	{
if(isset($_POST['submit']))
{
	$username=$_POST['deletedata'];
	$sql = "DELETE FROM login WHERE username='$username'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
header('location:users.php');
}
}