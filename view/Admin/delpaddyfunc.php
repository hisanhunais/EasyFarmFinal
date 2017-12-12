<?php
	require '../../controller/connect.php';

	if(!empty($_POST))
	{
		$output = '';
		$message = '';

		if(isset($_POST['submit']))
		{
			$An_ID=$_POST['deletedata'];
			$query = "DELETE FROM paddytype WHERE Type_ID = '$An_ID'";
			$res=mysqli_query($conn, $query);

 			header('location:paddytype.php');
		}
	}

?>