<?php 
		if(isset($_POST['commentButton']))
		{
			require("../../dbconfig/config.php");
			$un = "Anonymous";
			$forID = $_GET['id'];
			$comment = $_POST['comment'];
			//date_default_timezone_set('Asia/Colombo');
			$date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
			$date = $date1->format('Y-m-d');
			$time1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
			$time = $time1->format('h:i:sa');
			//$date = date("Y-m-d");
			//$time = date("h:i:sa");
				
			$query = "SELECT commentID FROM discussiondetails ORDER BY com_date";
			$query_run = mysqli_query($con,$query);



			$i = 1;
			$oldno = 0;
			$allRows = mysqli_num_rows($query_run);
			while($row1 = mysqli_fetch_array($query_run)){

				//echo $row1[0];
				//echo nl2br("\n");
			    if ($allRows == $i) 
			    {

			        $oldno = (int)substr($row1[0],3);
			    } 
			    $i++;
			}
			
			$newno = (string)($oldno + 1);
			$prefix = "COM";
			$newid = $prefix.$newno;
			
			//echo $newid;
			//echo $date;
			//echo $time;
			$sql5="INSERT INTO discussiondetails VALUES('$newid','$forID','$un','$date','$time','$comment')";
			//header(location:"discussiondetails.php?id=$forumid");
			$res5=mysqli_query($con,$sql5);
			header("location:discussionDetails.php?id=$forID");
		}
	?>