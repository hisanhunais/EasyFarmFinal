<?php

	require 'connect.php';

// Agrarians service center reports

	function total_production() {
		require 'connect.php';
   if(isset($_POST['btn_generate']))
   {
     $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
      
		  $qur="SELECT Paddy_quantity FROM paddy WHERE Paddy_date LIKE '%$selectyear%'";

        if($result = mysqli_query($conn, $qur)){
                                                      
                                                          
            if(mysqli_num_rows($result) > 0){

                $total_Production=0;
                $in_ton=0;
                while($row = mysqli_fetch_array($result)){
                                                                
                                                
                    $total_Production=$total_Production+$row['Paddy_quantity'];
                    $in_ton=$total_Production/1000;
                                                                
                }

               echo"</br>";                            
               echo "<h4><b>Total Production - </b>".$total_Production."
               Kg"." (".$in_ton."  Metric Tons)</h4>";
             }
        }

	}
  }

  // function generate(){
  //     require '../controller/connect.php';
  //     $erryear="";

  //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //         if (empty($_POST["year"])) {
  //             $erryear = "year is required";
  //         } else {
  //             $selectyear = mysqli_real_escape_string($conn, $_POST["year"]);
  //             /*$err = validate_text_and_numbers($title);*/
  //         }



  //         if($erryear==""){
  //             total_production($selectyear);
  //         }
  //     }
  // }
  function year(){
    require 'connect.php';

    echo "
    <form class='form-inline' method='POST' action='../agrarianservicecenter/agrarianreport.php'>
    <fieldset>
    <label for='paddytype'>Select year</label>
    <select name='year' class='form-control' placeholder='Select category' id='year'>";
    
                            

                                  for ($i=2017; $i <2025 ; $i++) { 
                                    echo "<option value='$i'>".$i."</option>";
                                  }

                           
    echo"</select>";
    echo "  ";
    echo"<button type='submit' class='btn btn-primary' name='btn_generate'>Generate Report</button>"; 

    echo "</fieldset>
    

    </table>";
        require 'connect.php';
      $erryear="";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["year"])) {
              $erryear = "year is required";
          } else {
              $selectyear = mysqli_real_escape_string($conn, $_POST["year"]);
              /*$err = validate_text_and_numbers($title);*/
          }



          if($erryear==""){
              total_production($selectyear);
          }
      }
  
    // generate();

  }


  function paddytype_details(){
    require 'connect.php';
    $sql="SELECT * FROM paddytype ";
                    if($reslt = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($reslt) > 0){
                            
                                
                          while($data = mysqli_fetch_array($reslt)){
                            echo "<table class='table table-responsive'>";
                            $dat = $data['Type_Value'];
                            list($eng,$sin ) = explode('|', $dat);
                      
                            echo "<tr>";
                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";
                            $type=$data['Type_Value'];
                                        
                                        
                            $qur="SELECT * FROM paddy WHERE Paddy_type LIKE '%$type%'";

                            if($result = mysqli_query($conn, $qur)){
                                                      
                                                          
                              if(mysqli_num_rows($result) > 0){

                                $sum=0;
                                $sumpro=0;
                                $totalpro_inton=0;
                                while($row = mysqli_fetch_array($result)){
                                                                
                                                
                                  $total=$row['Paddy_price']*$row['Paddy_quantity'];
                                  $sum=$sum+$total;
                                  $totalpro=$row['Paddy_quantity'];
                                  $sumpro=$sumpro+$totalpro;
                                  $totalpro_inton=$sumpro/1000;
                                }
                                            
                                $option="SELECT Paddy_price FROM paddy";
                                $res=mysqli_query($conn,$option);
                                                            // $op=array();

                                                            // $arraylength=count($op);
                                                            // rsort($op);
                                $avg=$sum/$sumpro;

                                                            
                                echo "</tbody> 

                                                            
                                <tr>
                                  <td></td>
                                  <td><b>Total Production</b></td>
                                  <td>".$sumpro."Kg</td>
                                                            
                                  <td></td>
                                </tr>

                                <tr>
                                  <td></td>
                                  <td><b>Total Expected Sales revenue</b></td>
                                  <td>".$sum."/=</td>
                                  <td></td>
                                </tr>
                                                            
                                <tr>
                                  <td></td>
                                  <td><b>Average Selling Price</b></td>
                                  <td>".round($avg)."/=</td>
                                  <td></td>
                                </tr>
                                                            
                                                            
                                                            
                                ";
                                        // echo '</br>';
                                        // echo '</br>';
                              }
                                        // Free result set
                              mysqli_free_result($result);
                            } 
                          }                              
                                             
                          echo "</tr>";
                                        
                          echo "</table>";

                      }                          
                                
                                   
                                 
                  }
                 

                  else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                  }
 
                    // Close connection
                  mysqli_close($conn);

                            // Free result set
                            // mysqli_free_result();

                        // }
                    
  }
?>