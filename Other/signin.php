<?php
	include_once("db.php")
?>

<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT count(*) FROM login WHERE username = '".$username."' AND password = '".$password."'";
	
	$query = mysql_query($sql);
	
	$result = mysql_fetch_array($query);
	
	if($result[0] > 0)
	{
		echo "Successfull";
		//<script type="text/javascript">location.href = 'farmerHome.html';</script>	
	}
	else
	{
		echo "Failed";
		//<script type="text/javascript">location.href = 'Initial3.html';</script>	
	}
	
	
?>