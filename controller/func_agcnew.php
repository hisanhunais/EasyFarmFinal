
<?php
//connection............................................................................................................
require 'connect.php';
//session_start();
//$sessionID=$_SESSION["username"];

//variables.............................................................................................................
$today=Date("Y-m-d");
list($yr,$month,$day) = explode('-', $today);
$year_new=$yr+1;
$selectyear=$yr."/".$year_new;


//functions.............................................................................................................





//.......................Functions for Paddy production and Sales.......................................................

//calculating the total production for the period

//function total_production() {
//
//    require 'connect.php';
//
//       GLOBAL $selectyear;
//
//
//        $qur="SELECT * FROM paddy WHERE Paddy_year LIKE '%$selectyear%'";
//
//        if($result = mysqli_query($conn, $qur)){
//
//
//            if(mysqli_num_rows($result) > 0){
//
//                $total_Production=0;
//                $in_ton=0;
//                $tp_value=0;
//                while($row = mysqli_fetch_array($result)){
//                    $value_row=$row['Paddy_quantity']*$row['Paddy_price'];//value for row
//                    $tp_value=$tp_value+$value_row;   //total calculated tp value
//                    $total_Production=$total_Production+$row['Paddy_quantity']; // Total Production (tp or TP)
//                    $in_ton=$total_Production/1000; // tp in metric ton
//                    $into_round=round($in_ton,2);
//
//                }
//
//                //check availability
//                $sql_qur = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE'$selectyear'";
//                if ($check = mysqli_query($conn, $sql_qur)) {
//                    if (mysqli_num_rows($check) > 0) {
//                        $sql = "UPDATE tp_paddygraph SET year_pro='$selectyear', total_Pro='$into_round',Total_provalue='$tp_value' WHERE Year_pro LIKE'$selectyear'";
//                        if(mysqli_query($conn, $sql)){
//
//                        } else{
//                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//                        }
//                        echo "</br>";
//                        echo "<h3><b>Paddy Production " . $selectyear . "</b></h3>" . "<b>Total Production   - </b>" . $total_Production . "
//               Kg" . " (" . $in_ton . "  Metric Tons)<br>";
//                        echo "<b>Total Production cost  - </b>Rs." . number_format($tp_value) . "
//               /=";
//                        echo "<hr>";
//                        echo "";
////                        echo "<h4>Paddy Production Details for each Paddy Type</h4>";
//                        paddy_production( $total_Production);
//                    }else{
//                        //insert to table for graphs
//                        $sql="INSERT INTO `tp_paddygraph`(`Year_pro`, `Total_Pro`, `Total_provalue`) VALUES ('$selectyear','$into_round','$tp_value')";
//                        if(mysqli_query($conn, $sql)){
//
//                        } else{
//                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//                        }
//                        echo "</br>";
//                        echo "<h3><b>Paddy Production " . $selectyear . "</b></h3>" . "Total Production   - </b>" . $total_Production . "
//               Kg" . " (" . $in_ton . "  Metric Tons)<br>";
//                        echo "Total Production cost  - </b>Rs." . number_format($tp_value) . "
//               /=";
//                        echo "<hr>";
//                        echo "";
//
//
//                        paddy_production( $total_Production);
//                    }
//                }
//
//
//            }
//        }
//
//    else{
//        echo "<br>";
////        echo "<h3>No results found</h3>";
//    }
//}
function total_production() {

    require 'connect.php';

    GLOBAL $selectyear;


        $qur = "SELECT * FROM paddy WHERE Paddy_year LIKE '%$selectyear%'";

    if($result = mysqli_query($conn, $qur)){


        if(mysqli_num_rows($result) > 0){

            $total_Production=0;
            $in_ton=0;
            $tp_value=0;
            while($row = mysqli_fetch_array($result)){
                $value_row=$row['Paddy_quantity']*$row['Paddy_price'];//value for row
                $tp_value=$tp_value+$value_row;   //total calculated tp value
                $total_Production=$total_Production+$row['Paddy_quantity']; // Total Production (tp or TP)
                $in_ton=$total_Production/1000; // tp in metric ton
                $into_round=round($in_ton,2);

            }

            //check availability
            $sql_qur = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE'$selectyear' AND season='all'";
            if ($check = mysqli_query($conn, $sql_qur)) {
                if (mysqli_num_rows($check) > 0) {
//                    $sql = "UPDATE tp_paddygraph SET year_pro='$selectyear', total_Pro='$into_round',Total_provalue='$tp_value' WHERE Year_pro LIKE'$selectyear'";
//                    if(mysqli_query($conn, $sql)){
//
//                    } else{
//                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//                    }
                    echo "</br>";
                    echo "<h3><b>Paddy Production " . $selectyear . "</b></h3>" . "<b>Total Production   - </b>" . $total_Production . "
               Kg" . " (" . $in_ton . "  Metric Tons)<br>";
                    echo "<b>Total Production cost  - </b>Rs." . number_format($tp_value) . "
               /=";
                    echo "<hr>";
                    echo "";
//                        echo "<h4>Paddy Production Details for each Paddy Type</h4>";
                    paddy_production( $total_Production);
                }else{
                    //insert to table for graphs
                    $sql="INSERT INTO `tp_paddygraph`(`Year_pro`, `Total_Pro`, `Total_provalue`) VALUES ('$selectyear','$into_round','$tp_value')";
                    if(mysqli_query($conn, $sql)){

                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
                    echo "</br>";
                    echo "<h3><b>Paddy Production " . $selectyear . "</b></h3>" . "Total Production   - </b>" . $total_Production . "
               Kg" . " (" . $in_ton . "  Metric Tons)<br>";
                    echo "Total Production cost  - </b>Rs." . number_format($tp_value) . "
               /=";
                    echo "<hr>";
                    echo "";


                    paddy_production( $total_Production);
                }
            }


        }
    }

    else{
        echo "<br>";
//        echo "<h3>No results found</h3>";
    }
}
//paddy production for the period
function paddy_production($total_Production){

   GLOBAL $selectyear;
    require 'connect.php';


    $sql="SELECT * FROM paddytype2 ";// selecting the paddy types  in the datbase
    if($reslt = mysqli_query($conn, $sql)){

        if(mysqli_num_rows($reslt) > 0) {

            while ($data = mysqli_fetch_array($reslt)) {

                $type = $data['Type_Value'];
                list($eng, $sin) = explode('|', $type);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";
                $qur = "SELECT * FROM paddy WHERE Paddy_type='$eng' AND Paddy_year='$selectyear'";// query to run the production

                if ($check = mysqli_query($conn, $qur)) {
//                    echo $eng,$selectyear;

                    if (mysqli_num_rows($check) > 0) {// error occur


                        $sum = 0;
                        $sumpro = 0;
                        $totalpro_inton = 0;
                        $percentage = 0;
//                        $max_value [] = array();


                        while ($row = mysqli_fetch_array($check)) {

                            $max_value[] = $row['Paddy_price'];//storing price in an array
                            $total = $row['Paddy_price'] * $row['Paddy_quantity'];//total production in row
                            $sum = $sum + $total;// adding T.P to existing sum
                            $totalpro = $row['Paddy_quantity'];
                            $sumpro = $sumpro + $totalpro; // total of paddy type
                            $totalpro_inton = $sumpro / 1000;// T.P in metric tons
                            $percentage = ($sumpro / $total_Production) * 100;//Percentage per T.P


                        }


//
//

                        echo "           
        
        ";
//            table_details($total_Production,$in_ton);
                        $inton_round = round($totalpro_inton, 2);
                        $pecent_round = round($percentage, 2);
                        //check if exist in table data
                        $sql_qur = "SELECT * FROM paddytype_graph WHERE Paddy_type='$eng' and year LIKE'$selectyear'";
                        if ($check = mysqli_query($conn, $sql_qur)) {
                            if (mysqli_num_rows($check) > 0) {
                                echo "
                    <table class='table table-bordered'>
                    <tbody><b><h5>                    
                    <tr>                        
                        <td class='col-md-4' rowspan='6'><b>" . $eng . "</b></td>
                        <td class='col-md-6' rowspan='2'>Total Production for the period</td>
                        <td class='col-md-2'>" . $sumpro . " kg</td>
                    </tr>
                    <tr>                  
                        <td class='col-md-2'>" . $totalpro_inton . " (Metric Tons)</td>
                    </tr>
                        <tr>   
                        <td class='col-md-6'>Total Production cost for the period</td>
                        <td class='col-md-2'>Rs." . number_format($sum) . "/=</td>
                    </tr>
                    <tr>
                       <td class='col-md-6'>Percentage per Total Production</td>
                        <td class='col-md-2'>" . round($percentage, 2) . "%</td>
                    </tr>
                    <tr> 
                       <td class='col-md-6'>Minimum Paddy Price</td>
                        <td class='col-md-2'>Rs. " . min($max_value) . "</td>
                    </tr></h5></b>";
                            } else {
                                $sql = "INSERT INTO `paddytype_graph`(`year`, `Paddy_type`, `production_inton`, `pro_value`, `percentage`) VALUES ('$selectyear','$eng','$inton_round','$sumpro','$pecent_round')";
                                if (mysqli_query($conn, $sql)) {

                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                                echo "
                    <table class='table table-bordered'>
                    <tbody><b><h5>                    
                    <tr>                        
                        <td class='col-md-4' rowspan='6'><b>" . $eng . "</b></td>
                        <td class='col-md-6' rowspan='2'>Total Production for the period</td>
                        <td class='col-md-2'>" . $sumpro . " kg</td>
                    </tr>
                    <tr>                  
                        <td class='col-md-2'>" . $totalpro_inton . " (Metric Tons)</td>
                    </tr>
                        <tr>   
                        <td class='col-md-6'>Total Production cost for the period</td>
                        <td class='col-md-2'>Rs." . number_format($sum) . "/=</td>
                    </tr>
                    <tr>
                       <td class='col-md-6'>Percentage per Total Production</td>
                        <td class='col-md-2'>" . round($percentage, 2) . "%</td>
                    </tr>
                    <tr> 
                       <td class='col-md-6'>Minimum Paddy Price</td>
                        <td class='col-md-2'>Rs. " . min($max_value) . "</td>
                    </tr></h5></b>";
                            }
                        }
                        echo "
                    </tbody>
                  </table>
                 
                    ";
                    }
                }
            }
            mysqli_free_result($check);
        }else{
            echo "No results found";
        }

    }
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

}

function production_yala()
{
    require 'connect.php';
    GLOBAL $selectyear;

    $qur = "SELECT * FROM paddy WHERE Paddy_year LIKE '%$selectyear%' and Paddy_season='Yala'";

    if ($result = mysqli_query($conn, $qur)) {


        if (mysqli_num_rows($result) > 0) {

            $total_Production = 0;
            $in_ton = 0;
            $tp_value = 0;
            while ($row = mysqli_fetch_array($result)) {
                $value_row = $row['Paddy_quantity'] * $row['Paddy_price'];//value for row
                $tp_value = $tp_value + $value_row;   //total calculated tp value
                $total_Production = $total_Production + $row['Paddy_quantity']; // Total Production (tp or TP)
                $in_ton = $total_Production / 1000; // tp in metric ton
                $into_round = round($in_ton, 2);

            }

            //check availability
            $sql_qur = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE '%$selectyear%' and season='Yala'";
            if ($check = mysqli_query($conn, $sql_qur)) {
                if (mysqli_num_rows($check) > 0) {

                    echo "</br>";

                    echo "<b>Total Production cost for Yala season - </b>Rs." . number_format($tp_value) . "
               /=";

                } else {
                    GLOBAL $selectyear;

                    //insert to table for graphs
                    $sql = "INSERT INTO `tp_paddygraph`(`Year_pro`, `season`, `Total_Pro`, `Total_provalue`) VALUES ('$selectyear','Yala','$into_round','$tp_value')";
                    if (mysqli_query($conn, $sql)) {

                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    echo "</br>";
//
                    echo "<b>Total Production cost for Yala Season - </b>Rs." . number_format($tp_value) . "
               /=";

                }
            }


        }
    }



}

function production_maha()
{
    require 'connect.php';
    GLOBAL $selectyear;

    $qur = "SELECT * FROM paddy WHERE Paddy_year LIKE '%$selectyear%' and Paddy_season='Maha'";

    if ($result = mysqli_query($conn, $qur)) {


        if (mysqli_num_rows($result) > 0) {

            $total_Production = 0;
            $in_ton = 0;
            $tp_value = 0;
            while ($row = mysqli_fetch_array($result)) {
                $value_row = $row['Paddy_quantity'] * $row['Paddy_price'];//value for row
                $tp_value = $tp_value + $value_row;   //total calculated tp value
                $total_Production = $total_Production + $row['Paddy_quantity']; // Total Production (tp or TP)
                $in_ton = $total_Production / 1000; // tp in metric ton
                $into_round = round($in_ton, 2);

            }

            //check availability
            $sql_qur = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE '%$selectyear%' and season='Maha'";
            if ($check = mysqli_query($conn, $sql_qur)) {
                if (mysqli_num_rows($check) > 0) {
                    echo "</br>";
                    echo "erwr";
                    echo "<b>Total Production cost for Maha season - </b>Rs." . number_format($tp_value) . "
               /=";

                } else {
                    GLOBAL $selectyear;


                    //insert to table for graphs
                    $sql = "INSERT INTO `tp_paddygraph`(`Year_pro`, `season`, `Total_Pro`, `Total_provalue`) VALUES ('$selectyear','Maha','$into_round','$tp_value')";
                    if (mysqli_query($conn, $sql)) {

                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    echo "</br>";
//
                    echo "<b>Total Production cost for Maha Season  - </b>Rs." . number_format($tp_value) . "
               /=";

                }
            }


        }
    }



}

function paddy_salesreport (){
        GLOBAL $yr;
        require 'connect.php';
        $qur = "SELECT * FROM ordertable WHERE Ord_Date LIKE '%$yr%'";//add period

        if ($result = mysqli_query($conn, $qur)) {


            if (mysqli_num_rows($result) > 0) {

                $sum = 0;
                $sumsales = 0;
                $totalsales_inton = 0;
                $percentage = 0;
//                            $max_value = array();

                while ($row = mysqli_fetch_array($result)) {

//                               $max_value [] = $row['Paddy_price'];


                    $sum = $sum + $row['Quantity'];//total sales units
                    $totalsales_inton = $sum / 1000;// total sales units in tons
                    $sumsales = $sumsales + $row['Ord_Total'];//sales income


//                            $percentage=($sumpro/$total_Production)*100;
                }
                $sql_qur = "SELECT * FROM sales_report WHERE sales_year LIKE '%$yr%'";
                if ($check = mysqli_query($conn, $sql_qur)) {
                    if (mysqli_num_rows($check) > 0) {
                        echo "</br>";
                        echo "<h3><b>Paddy Sales ".$yr."</b></h3>" . "<b>Total Sales   - </b>" . $sum . "
               Kg" . " (" . $totalsales_inton . "  Metric Tons)<br>";
                        echo "<b>Total Sales in Rs.   - </b>" . $sumsales . "
               /=<br>";

                    } else {
                        $sql = "INSERT INTO `sales_report`(`sales_year`, `Sales`, `in_value`) VALUES ('$yr','$totalsales_inton','$sumsales')";
                        if (mysqli_query($conn, $sql)) {

                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        echo "</br>";
                        echo "<h3><b>Paddy Sales ".$yr."</b></h3>" . "<b>Total Sales   - </b>" . $sum . "
               Kg" . " (" . $totalsales_inton . "  Metric Tons)<br>";
                        echo "<b>Total Sales in Rs.   - </b>" . $sumsales . "
               /=<br>";

                    }
                }
            }
        }

}
function paddy_salestype(){
    GLOBAL $selectyear;
    require 'connect.php';


    $sql="SELECT * FROM paddytype2 ";// selecting the paddy types  in the datbase
    if($reslt = mysqli_query($conn, $sql)){

        if(mysqli_num_rows($reslt) > 0) {

            while ($data = mysqli_fetch_array($reslt)) {

                $type = $data['Type_Value'];
                list($eng, $sin) = explode('|', $type);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";
                $qur = "SELECT * FROM ordertable WHERE Product='$eng'";// query to run the production

                if ($check = mysqli_query($conn, $qur)) {


                    if (mysqli_num_rows($check) > 0) {// error occur


                        $sum = 0;
                        $sumsales = 0;
                        $totalsales_inton = 0;



                        while ($row = mysqli_fetch_array($check)) {


                            $sum = $sum + $row['Quantity'];// adding Total sales to existing sum

                            $sumsales = $sumsales + $row['Ord_Total']; // total of paddy type
                            $totalsales_inton = $sum / 1000;// T.s in metric tons


                        }


//
//

                        echo "      
        
        ";
//            table_details($total_Production,$in_ton);
                        $inton_round = round($totalsales_inton, 2);

                        //check if exist in table data
                        $sql_qur = "SELECT * FROM sales_typegraph WHERE Paddy_type LIKE '%$eng%' and year_sales LIKE '%$selectyear%'";
                        if ($check = mysqli_query($conn, $sql_qur)) {

                            if (mysqli_num_rows($check) > 0) {
                                echo "
                    <table class='table table-bordered'>
                    <tbody><b><h5>                    
                    <tr>                        
                        <th class='col-md-4' rowspan='6'><b>" . $eng . "</b></th>
                        <td class='col-md-6' rowspan='2'>Total Sales for the period</td>
                        <td class='col-md-2'>" . $sum . " kg</td>
                    </tr>
                    <tr>                  
                        <td class='col-md-2'>" . $totalsales_inton . " (Metric Tons)</td>
                    </tr>
                        <tr>   
                        <td class='col-md-6'>Total Sales income for the period</td>
                        <td class='col-md-2'>Rs." . number_format($sumsales) . "/=</td>
                    </tr>
                    </h5></b> </tbody></table>";
                            } else {
                                $sql = "INSERT INTO `sales_typegraph`(`Paddy_type`,`year_sales`,`in_ton`) VALUES ('$eng','$selectyear','$inton_round')";
                                if (mysqli_query($conn, $sql)) {

                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                                echo "
                    <table class='table table-bordered'>
                    <tbody><b><h5>                    
                    <tr>                        
                        <th class='col-md-4' rowspan='6'><b>" . $eng . "</b></th>
                        <td class='col-md-6' rowspan='2'>Total Sales for the period</td>
                        <td class='col-md-2'>" . $sum . " kg</td>
                    </tr>
                    <tr>                  
                        <td class='col-md-2'>" . $inton_round . " (Metric Tons)</td>
                    </tr>
                        <tr>   
                        <td class='col-md-6'>Total Sales income for the period</td>
                        <td class='col-md-2'>Rs." . number_format($sumsales) . "/=</td>
                    </tr>
                    </h5></b>
                    </table>";
                            }
                        }
                    }
                }



}
        }
    }
}

//function sales_yala (){
//    GLOBAL $yr;
//    require 'connect.php';
//    $qur = "SELECT * FROM ordertable WHERE Ord_Date LIKE '%$yr%'";//add period
//
//    if ($result = mysqli_query($conn, $qur)) {
//
//
//        if (mysqli_num_rows($result) > 0) {
//
//            $sum = 0;
//            $sumsales = 0;
//            $totalsales_inton = 0;
//            $percentage = 0;
////                            $max_value = array();
//
//            while ($row = mysqli_fetch_array($result)) {
//
////                               $max_value [] = $row['Paddy_price'];
//
//
//                $sum = $sum + $row['Quantity'];//total sales units
//                $totalsales_inton = $sum / 1000;// total sales units in tons
//                $sumsales = $sumsales + $row['Ord_Total'];//sales income
//
//
////                            $percentage=($sumpro/$total_Production)*100;
//            }
//            $sql_qur = "SELECT * FROM sales_report WHERE sales_year LIKE '%$yr%'";
//            if ($check = mysqli_query($conn, $sql_qur)) {
//                if (mysqli_num_rows($check) > 0) {
//                    echo "</br>";
//                    echo "<h3><b>Paddy Sales ".$yr."</b></h3>" . "<b>Total Sales   - </b>" . $sum . "
//               Kg" . " (" . $totalsales_inton . "  Metric Tons)<br>";
//                    echo "<b>Total Sales in Rs.   - </b>" . $sumsales . "
//               /=<br>";
//
//                } else {
//                    $sql = "INSERT INTO `sales_report`(`sales_year`, `Sales`, `in_value`) VALUES ('$yr','$totalsales_inton','$sumsales')";
//                    if (mysqli_query($conn, $sql)) {
//
//                    } else {
//                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//                    }
//                    echo "</br>";
//                    echo "<h3><b>Paddy Sales ".$yr."</b></h3>" . "<b>Total Sales   - </b>" . $sum . "
//               Kg" . " (" . $totalsales_inton . "  Metric Tons)<br>";
//                    echo "<b>Total Sales in Rs.   - </b>" . $sumsales . "
//               /=<br>";
//
//                }
//            }
//        }
//    }
//}





//..................................................Functions for farmer profiles.......................................
function new_profiles (){
    echo"<h3><b>Farmer Profiles</b></h3>";

    require 'connect.php';

        GLOBAL $yr;

        $qur="SELECT * FROM login WHERE type='Farmer' and Date LIKE '%$yr%'";

        if($result = mysqli_query($conn, $qur)){

            $length_arr=0;
            if(mysqli_num_rows($result) > 0){


                while($row = mysqli_fetch_array($result)){
                    $array_count []=$row['username'];





                }
                $length_arr=count($array_count);

                echo"</br>";
                echo "<h4><b>Number of Profiles Created  -</b></h4>".$length_arr." ";
                echo "Farmers Registered";



            }
        }


}
//
//
//
//
////......................................................Functions for meeting details...................................
function meeting_details ()
{
    require 'connect.php';
    if (isset($_POST['btn_generate'])) {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
        $qur = "SELECT * FROM announcement WHERE Date LIKE '%".$selectyear."%' and Topic='Meeting'";

        if ($result = mysqli_query($conn, $qur)) {


            if (mysqli_num_rows($result) > 0) {

                $length_arr=0;
                while ($row = mysqli_fetch_array($result)) {
                    $array_count []=$row['Topic'];


                }
                $length_arr=count($array_count);

                echo"</br>";
                echo "<h4><b>Number of meetings held during the period -</b></h4>".$length_arr." ";



            }
        }
    }
}



//pdf generator.........................................................................................................
//function fetch_data()
//{
//    require 'connect.php';
//    GLOBAL $selectyear;
//    $output = '';
////    $conn = mysqli_connect("localhost", "root", "root", "tut");
//    $sql = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE'$selectyear'";
//    $result = mysqli_query($conn, $sql);
//    while($row = mysqli_fetch_array($result))
//    {
//        $output .= '<tr>
//                          <td>'.$row["Year_pro"].'</td>
//                          <td>'.$row["season"].'</td>
//                          <td>'.$row["Total_pro"].'</td>
//                          <td>'.$row["username"].'</td>
//                     </tr>
//                          ';
//    }
//    return $output;
//}
//if(isset($_POST["generate_pdf"]))
//{
//    require('../tcpdf/tcpdf.php');
//    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//    $obj_pdf->SetCreator(PDF_CREATOR);
//    $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");
//    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
//    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//    $obj_pdf->SetDefaultMonospacedFont('helvetica');
//    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
//    $obj_pdf->setPrintHeader(false);
//    $obj_pdf->setPrintFooter(false);
//    $obj_pdf->SetAutoPageBreak(TRUE, 10);
//    $obj_pdf->SetFont('helvetica', '', 11);
//    $obj_pdf->AddPage();
//    $content = '';
//    $content .= '
//      <table border="1" cellspacing="0" cellpadding="3">
//           <tr>
//                <th width="5%">Id</th>
//                <th width="30%">Name</th>
//                <th width="15%">Age</th>
//                <th width="50%">Email</th>
//           </tr>
//      ';
//    $content .= fetch_data();
//    $content .= '</table>';
//    $obj_pdf->writeHTML($content);
//    $obj_pdf->Output('file.pdf', 'I');
//}
?>