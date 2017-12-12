<?php
//connection............................................................................................................
require 'connect.php';

// Agrarians service center reports.....................................................................................

//vatiables.............................................................................................................
$type="";


//functions.............................................................................................................

function total_production() {
    require 'connect.php';
    if(isset($_POST['btn_generate']))
    {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
//        echo "<div align='right'>
//        <a href='' ><h4>Graphical representation <span class=\"badge\">Click Here</span></h4></a>
//        </div>";
        $qur="SELECT Paddy_quantity FROM paddy WHERE Paddy_year LIKE '%$selectyear%'";

        if($result = mysqli_query($conn, $qur)){


            if(mysqli_num_rows($result) > 0){

                $total_Production=0;
                $in_ton=0;
                while($row = mysqli_fetch_array($result)){


                    $total_Production=$total_Production+$row['Paddy_quantity'];
                    $in_ton=$total_Production/1000;

                }

                echo"</br>";
                echo "<h4><b>Total Production for the year $selectyear - </b>".$total_Production."
               Kg"." (".$in_ton."  Metric Tons)</h4>";
               paddytype_details($total_Production);
            }
        }

    }else{
        echo "No results found";
    }
}




function paddytype_details($total_Production){
    GLOBAL $type;
    require 'connect.php';
    if(isset($_POST['btn_generate']))
    {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
        echo "<table class='table table-bordered'>";
        echo "<thead>
            <tr style='background-color: #EBEDEF'><h3><b>
                <th class='col-md-2' align='center'>Paddy Type</th>
                <th class='col-md-3' align='center'>Production</th>
                <th class='col-md-3' align='center'>Sales</th>
                <th class='col-md-4' align='center'>Selling Price</th>
            </b></h3>    
            </tr>
       </thead>";
        $sql="SELECT * FROM paddytype ";
        if($reslt = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($reslt) > 0){


                while($data = mysqli_fetch_array($reslt)){

                    $dat = $data['Type_Value'];
                    list($eng,$sin ) = explode('|', $dat);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";
                    GLOBAL $type;
                    $type=$data['Type_Value'];
//                    production_yala($type);

                    $qur="SELECT * FROM paddy WHERE Paddy_type LIKE '%$type%' AND Paddy_year LIKE '%$selectyear%'";

                    if($result = mysqli_query($conn, $qur)){


                        if(mysqli_num_rows($result) > 0){

                            $sum=0;
                            $sumpro=0;
                            $totalpro_inton=0;
                            $percentage=0;
                            $max_value=array();
                            while($row = mysqli_fetch_array($result)){

                                $max_value=$row['Paddy_price'];

                                $total=$row['Paddy_price']*$row['Paddy_quantity'];
                                $sum=$sum+$total;
                                $totalpro=$row['Paddy_quantity'];
                                $sumpro=$sumpro+$totalpro; // total of paddy type
                                $totalpro_inton=$sumpro/1000;
                                $percentage=($sumpro/$total_Production)*100;
//                                  maximum_price();
                            }

                            $avg=$sum/$sumpro;

                            table($total,$sumpro,$sum,$total,$totalpro,$totalpro_inton,$eng,$max_value,$percentage,$avg);


//
                        }
                        // Free result set
                        mysqli_free_result($result);
                    }
                    //werthyj
                }




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
        echo "</table>";
    }
}

//function calculate_sales_period ($new_date){
//
//    require 'connect.php';
//    $qur = "SELECT * FROM ordertable WHERE Ord_Date LIKE '%$new_date%' and status='Completed'";
//
//    if ($result = mysqli_query($conn, $qur)) {
//
//
//        if (mysqli_num_rows($result) > 0) {
//            $total_sales=0;
//            $total_salesval=0;
//            while ($row = mysqli_fetch_array($result)) {
//                $total_sales=$total_sales+$row['Quantity'];
//                $total_salesval=$total_salesval+$row['Ord_Total'];
//                ;
//
//            }
//            sales_details($total_salesval,$total_sales);
//        }
//    }
//}
//.......................CHECK....................................................................................................................................................
//  function production_yala($type)
//  {
//      require '../controller/connect.php';
//      if(isset($_POST['btn_generate'])) {
//          $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
//          $qur = "SELECT * FROM paddy WHERE Paddy_type LIKE '%$type%' AND Paddy_date LIKE '%$selectyear%' AND Paddy_season='Yala'";
//
//          if ($result = mysqli_query($conn, $qur)) {
//
//
//              if (mysqli_num_rows($result) > 0) {
//
//                  $sum_yala = 0;
//                  while ($row = mysqli_fetch_array($result)) {
//                      $sum_yala = $sum_yala + $row['Paddy_quantity'];
//                  }
//                  table($sum_yala);
//              } else {
//
//                  echo "No results found";
//              }
//
//          }
//      }
//
//  }
//
//  function production_maha($type,$selectyear){
//      require '../controller/connect.php';
//      if(isset($_POST['btn_generate'])) {
//          $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
//          $qur = "SELECT * FROM paddy WHERE Paddy_type LIKE '%$type%' AND Paddy_date LIKE '%$selectyear%' AND Paddy_season='Maha'";
//
//          if ($result = mysqli_query($conn, $qur)) {
//
//
//              if (mysqli_num_rows($result) > 0) {
//
//                  $sum_maha = 0;
//                  while ($row = mysqli_fetch_array($result)) {
//                      $sum_maha = $sum_maha + $row['Paddy_quantity'];
//                  }
//                  paddytype_details($sum_maha);
//              }
//          }
//      }
//  }

//.............................UPTO..........................................................................................................................

function table($total,$sumpro,$sum,$total,$totalpro,$totalpro_inton,$eng,$max_value,$percentage,$avg){
    echo "<table class='table table-bordered'>";
    echo "
                                <tbody>
                                <tr>
                                  <th rowspan='4' style='background-color: #EBEDEF' class='col-md-2'>".$eng."</th>
                                  <td colspan='2' class='col-md-3'><b>Total Production      (".round($percentage,2)."%)</b></td>
                                  <th colspan='2'class='col-md-3'>Expected Sales Revenue (Rs.)</th> 
                                  <th class='col-md-2'>Maximum Selling Price (Rs.)</th>    
                                  <td class='col-md-2'>".$max_value."</td>                    
                                  
                                </tr>                            
                                <tr>
                                  
                                  <td colspan='2'>".$sumpro."Kg (".$totalpro_inton." Metric Tons)</td>
                                  <td colspan='2'>".$sum."</td>
                                  <th>Minimum Selling Price (Rs.)</th> 
                                  <td style='color: red'>COMPLETE</td>                      
                                  
                                </tr>

                                <tr >
                                  
                                  <th>Yala</th>
                                  <th>Maha</th> 
                                  <th colspan='2'>Total Sales Revenue</th>
                                  <th rowspan='2'>Average Selling Price (Rs.)</th> 
                                  <td rowspan='2'>".round($avg)."</td>                                                      
                                </tr>
                                <tr>
                                    <td style='color: red'>COMPLETE</td>
                                    <td style='color: red'>COMPLETE</td>
                                    <td style='color: red'><b>Units:</b>????</td>
                                    <td style='color: red'><b>Rs:</b>??????</td>
                                                                                      
                                </tr>
                                </tbody>";
    echo "</table>";
}





//---------------------------FARMER PROFILES--------------------------------------------------------------
//function farmer_details(){
//    require 'connect.php';
//    if(isset($_POST['btn_generate'])) {
//        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
//        echo $selectyear;
//    }
//}
?>