<?php
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,"easyfarmdb");
	$results_per_page = 6;
?>