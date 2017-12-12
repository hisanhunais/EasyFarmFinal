<?php
//fetch.php;
require '../../dbconfig/config.php';
if(isset($_POST["view"]))
{
  $query_1 = "SELECT * FROM announcement";
 $result_1 = mysqli_query($con, $query_1);
 $count2 = mysqli_num_rows($result_1);
 
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE loginaa SET announceCount = '$count2' WHERE username='KamalPerera'";
  mysqli_query($con, $update_query);
 }

 $query = "SELECT announceCount FROM loginaa WHERE username = 'KamalPerera'";
 $result = mysqli_query($con,$query); 
 $row = mysqli_fetch_row($result);
 $count1 = $row[0];

 

 $count = $count2 - $count1;
 $data = array(
  'unseen_notification' => $count,
  'a'=>$count1,
  'b'=>$count2
 );
 echo json_encode($data);
}
?>