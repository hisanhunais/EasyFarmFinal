  <?php 
  require('../../controller/connect.php');
  session_start();
$sessionID=$_SESSION["username"];

  if(isset($_POST['insert']))
    {
      $username =$_POST['username'];
    $date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
      $date = $date1->format('Y-m-d');
      $time1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
      $time = $time1->format('h:i:sa');
      $category = $_POST['category'];
      $topic =$_POST['topic'];
      $des = $_POST['editor1']; 

      $query = "SELECT Forum_ID FROM discussionforum ";
      $result = mysqli_query($conn,$query);
      if (!$result) {
      die("Select failed");}



      $i = 1;
      $oldno = 0;
      $allRows = mysqli_num_rows($result);
      while($row1 = mysqli_fetch_array($result)){

        // echo $row1[0];
        // echo nl2br("\n");
          if ($allRows==$i) 
          {

              $oldno = (int)substr($row1[0],3);
          } 
          $i++;
      }
      
      $newno = (string)($oldno + 1);
      $prefix = "DIS";
      $newid = $prefix.$newno;
// $newid="13";
      // attempt insert query execution
      $sql1="INSERT INTO `discussionforum`(`Forum_ID`,`username`,`Date`, `Time`, `Category`, `Topic`, `Forum_Post`) VALUES ('$newid','$username','$date','$time','$category','$topic','$des')";
      
      if(mysqli_query($conn, $sql1)){
          
      } else{
          mysqli_error($conn);
      }

    header('location: agrariandiscussion.php');
    //  // Close connection
    mysqli_close($conn);
    //  //ob_end_flush();
                
    }

  ?>


