<?php
	require '../../controller/connect.php';
//functions related to the harvest page in farmer profile
	function insertPaddy(){
		require '../../controller/connect.php';
		if(isset($_POST['insertpaddy']))
		{
			$paddytype = mysqli_real_escape_string($conn, $_REQUEST['paddy_type']);
			$paddyprice = mysqli_real_escape_string($conn, $_REQUEST['paddy_price']);
			$paddyquantity = mysqli_real_escape_string($conn, $_REQUEST['paddy_quantity']);
			$username = "KamalPerera";
			$rating = 0;

			$query = "SELECT paddy_ID FROM paddy ORDER BY Paddy_date";
			$query_run = mysqli_query($conn,$query);



			$i = 1;
			$oldno = 0;
			$allRows = mysqli_num_rows($query_run);
			while($row1 = mysqli_fetch_array($query_run)){

				echo $row1[0];
				echo nl2br("\n");
			    if ($allRows == $i) 
			    {

			        $oldno = (int)substr($row1[0],3);
			    } 
			    $i++;
			}
			
			$newno = (string)($oldno + 1);
			$prefix = "PAD";
			$newid = $prefix.$newno;
			// attempt insert query execution

			$sql = "INSERT INTO paddy VALUES ('$newid','$paddytype','$paddyprice','$paddyquantity',now(),'$username','$rating')";
			if(mysqli_query($conn, $sql)){
			    header("location:harvest.php");
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			// header('location:../view/viewpaddy1.php');
			// Close connection
			mysqli_close($conn);					
		}
	}
	function deletepaddy(){
		if(isset($_POST['deletepaddy'])){
			$paddy_id = $_GET['id'];
			$sql="DELETE FROM `paddy` WHERE Paddy_ID='$paddy_id'";
			$res=mysqli_query($conn,$sql);
			header('location:harvest.php');
		}

	}
	function updatepaddy(){
		if(isset($_POST['updatepaddy'])){
			$paddy_id = $_GET['id'];
			$sql="UPDATE FROM `paddy` WHERE Paddy_ID='$paddy_id'";

			$res=mysqli_query($conn,$sql);
			header('location:../view/paddy.php');
		}

	}
	function updatepaddysinhala(){
		require '../../controller/connect.php';
		if(isset($_POST['updatepaddy'])){
			$paddy_id = $_GET['id'];
			$sql="UPDATE FROM `paddy` WHERE Paddy_ID='$paddy_id'";

			$res=mysqli_query($conn,$sql);
			if($res){
				header('location:../view/viewpaddysinhala.php');
			}
		}
	}
//Paddy type
	function insertpaddytype(){
		if(isset($_POST['addPaddyType"'])){
			$Type_eng = mysqli_real_escape_string($conn, $_REQUEST['paddy_type']);
			$Type_sin = mysqli_real_escape_string($conn, $_REQUEST['paddytype']);

			$sql = "INSERT INTO paddytype (`Paddy_date`,`Paddy_type`,`Type_Sinhala`) VALUES (now(),'$Type_eng','$Type_sin')";
			if(mysqli_query($conn, $sql)){
			    
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			header('location:../view/viewpaddytype.php');
			// Close connection
			mysqli_close($conn);
		}
	}

//Announcement Dashboard
	function insertannouncemnt_eng(){
		if(isset($_POST['btnannouncement"'])){
			$date = mysqli_real_escape_string($conn, $_REQUEST['ann_date']);
			$time = mysqli_real_escape_string($conn, $_REQUEST['ann_time']);
			$topic = mysqli_real_escape_string($conn, $_REQUEST['topic']);
			$description = mysqli_real_escape_string($conn, $_REQUEST['des']);

			$sql = "INSERT INTO announcement (`Date`,`Time`,`Topic`,`Description`) VALUES (now(),'$date','$time','$topic','$description')";
			if(mysqli_query($conn, $sql)){
			    
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			header('location:../view/viewanneng.php');
			// Close connection
			mysqli_close($conn);
		}
	}
?>