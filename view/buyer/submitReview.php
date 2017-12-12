<?php
		if(isset($_POST['commentBtn']))
		{
			require("../../dbconfig/config.php");
			$id = $_GET['id'];
			$un = $_GET['user'];
			$rating = $_POST['rating'];
			$comment = $_POST['comment'];
			// $date = date("Y-m-d");
			// $time = date("h:i:sa");
			
			$date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
			$date = $date1->format('Y-m-d');
			$time1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
			$time = $time1->format('h:i:sa');
				
			$query = "SELECT reviewID FROM paddyreview";
			$query_run = mysqli_query($con,$query);
			
			$oldno = mysqli_num_rows($query_run);
			$newno = (string)($oldno + 1);
			$prefix = "REV";
			$newid = $prefix.$newno;
			
			$sql5="INSERT INTO paddyreview VALUES('$newid','$id','$un','$date','$time','$comment','$rating')";
			$res5=mysqli_query($con,$sql5);

			$sql6 = "SELECT SUM(rating),COUNT(rating) FROM paddyreview WHERE paddyID= '$id'";
			$res6 = mysqli_query($con,$sql6);

			$row6 = mysqli_fetch_row($res6);

			$sum = $row6[0];
			$count = $row6[1];
			$rate = $sum/$count;

			$newrate = number_format((float)$rate,2,'.','');

			$sql7 = "UPDATE paddy SET rating = '$newrate' WHERE Paddy_ID= '$id'";
			$res7=mysqli_query($con,$sql7);


			
			header("location:productPage.php?id=$id");
		}
?>