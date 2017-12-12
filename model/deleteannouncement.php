<?php

require "../connect.php";

if(isset($_POST['delete'])){
	$An_ID = $_POST['An_ID'];
	$sql="DELETE FROM `announcement` WHERE An_ID='$An_ID'";
	$res=mysqli_query($conn,$sql);
	if($res){
        echo'successful';
	}else{
		echo "error".mysqli_error($conn);
	}
}
header('location:../view/viewannounecementfarmer.php)