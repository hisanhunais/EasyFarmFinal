<?php

//issues................................................................................................................
//issues with the sales calculation
//selecting the status
//not displaying the values



//connection............................................................................................................
    require 'connect.php';
//session_start();
//variables.............................................................................................................
//$sessionID=$_SESSION["username"];
    $sessionID="KamalPerera";
$length=0;
//get the current year to generate reports
$today=Date("Y-m-d");
list($yr,$month,$day) = explode('-', $today);
$year_new=$yr+1;
$selectyear=$yr."/".$year_new;

//functions.............................................................................................................



    function production_cal()
    {
        require 'connect.php';

        GLOBAL $selectyear,$sessionID;

        $qur = "SELECT * FROM paddy WHERE Paddy_year LIKE '%$selectyear%' AND farmer_username LIKE '%$sessionID%'";

        if ($result = mysqli_query($conn, $qur)) {


            if (mysqli_num_rows($result) > 0) {

                require 'connect.php';
                $total_Production = 0;
                $in_ton = 0;
                $cost_tp = 0;
                $cost_unit = 0;
//        $harvested=[];
                $value = "";
                $Paddy_array = array();
                $Paddyproduction_array = array();
                while ($row = mysqli_fetch_array($result)) {
//            $value=$row['Paddy_type'];
                    $Paddy_array [] = $row['Paddy_type'];
                    $harvested = $row['Paddy_type'];
                    $total_Production = $total_Production + $row['Paddy_quantity'];//total production in units
                    $in_ton = $total_Production / 1000; // in metric ton
                    $cost_unit = $row['Paddy_quantity'] * $row['Paddy_price']; // cost per unit
                    $cost_tp = $cost_tp + $cost_unit; //total cost
                    $num_inthousands = number_format($cost_tp);// break into thousands
                    $into_round=round($in_ton,2);
                }
                //check availability
                $sql_qur = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE'$selectyear' and username LIKE '%$sessionID%'";
                if ($check = mysqli_query($conn, $sql_qur)) {
                    if (mysqli_num_rows($check) > 0) {
                        echo "</br>";
                        echo "<h3><b>Paddy Production " . $selectyear . "</b></h3>" . "<b>Total Production   - </b>" . $total_Production . "
               Kg" . " (" . $in_ton . "  Metric Tons)<br>";
                        echo "<b>Total Production cost  - </b>Rs." . $num_inthousands . "
               /=";
                        echo "<hr>";
                        echo "";
//                        echo "<h4>Paddy Production Details for each Paddy Type</h4>";
                        paddy_production($total_Production);
                    } else {
                        //insert to table for graphs
                        $sql="INSERT INTO `tp_paddygraph`(`Year_pro`, `Total_Pro`, `Total_provalue`,`username`) VALUES ('$selectyear','$total_Production','$cost_tp','$sessionID')";
                        if(mysqli_query($conn, $sql)){

                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        echo "</br>";
                        echo "<h3><b>Paddy Production " . $selectyear . "</b></h3>" . "Total Production   - </b>" . $total_Production . "
               Kg" . " (" . $in_ton . "  Metric Tons)<br>";
                        echo "Total Production cost  - </b>Rs." . $num_inthousands . "
               /=";
                        echo "<hr>";
                        echo "";
                        paddy_production($total_Production);


                    }
                    }
                }
            }
        }

function paddy_production($total_Production){

    GLOBAL $selectyear,$sessionID;
    require 'connect.php';


    $sql="SELECT * FROM paddytype2 ";// selecting the paddy types  in the datbase
    if($reslt = mysqli_query($conn, $sql)){

        if(mysqli_num_rows($reslt) > 0) {

            while ($data = mysqli_fetch_array($reslt)) {

                $type = $data['Type_Value'];
                list($eng, $sin) = explode('|', $type);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";
                $qur = "SELECT * FROM paddy WHERE Paddy_type='$eng' AND Paddy_year='$selectyear' AND farmer_username='$sessionID'";// query to run the production

                if ($check = mysqli_query($conn, $qur)) {


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
                        $sql_qur = "SELECT * FROM paddytype_graph WHERE Paddy_type LIKE '%$eng%' and year LIKE '%$selectyear%' and username LIKE '%$sessionID%'";
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
                    
                    
</h5></b>";
                            } else {
                                $sql = "INSERT INTO `paddytype_graph`(`year`, `Paddy_type`, `production_inton`, `pro_value`, `percentage`,`username`) VALUES ('$selectyear','$eng','$inton_round','$sumpro','$pecent_round','$sessionID')";
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
                    </h5></b>";
                            }
                        }
                        echo "
                    </tbody>
                  </table>

                    ";
                    }
                }

                mysqli_free_result($check);
            }
        }else{
            echo "No results found";
        }

    }
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }


}

        function paddy_sales()
        {

            require 'connect.php';
            if (isset($_POST['btn_generate'])) {
                $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
                $selectseason = mysqli_real_escape_string($conn, $_REQUEST['season']);

                GLOBAL $sessionID;
                require 'connect.php';
//            list($year1, $year2) = explode('/', $selectyear);

                $qur = "SELECT * FROM ordertable WHERE seller_username LIKE '%" . $sessionID . "%'";

                if ($result = mysqli_query($conn, $qur)) {


                    if (mysqli_num_rows($result) > 0) {
                        $sales_inunits = 0;
//                    $sales_array = array ();
                        $sales_invalue = 0;
                        while ($row = mysqli_fetch_array($result)) {
//                        $sales_array []=$row['Paddy_type'];
                            $sales_inunits = $sales_inunits + $row['Quantity'];
                            $sales_invalue = $sales_invalue + $row['Ord_Total'];
                            $sales_inton = $sales_inunits / 1000;

                        }
//                $sales_array=[$sales_inunits];
//                echo $sales_array;
                        echo "<br><h4>Paddy Sales Details</h4><hr>
        ";
//            table_details($total_Production,$in_ton);
                        echo "
                  <table border='0'>
                    <tbody><b><h5>
                    <tr>
                        
                        <td class='col-md-8'><ul><li><b>Total Sales for the period</b></li></ul></td>
                        <td class='col-md-4'>- " . number_format($sales_inunits) . "Kg (" . $sales_inton . " Metric Tons)</td>
                    </tr>
                    
                    
                    <tr>
                        <td class='col-md-8'><ul><li><b>Total Sales Income</b></li></ul></td>
                        <td class='col-md-4'>- Rs. " . number_format($sales_invalue) . "/=</td>
                    </tr>
                    </h5>
                    </b>
                    </tbody>
                  </table>
                    ";
                    }
                } else {

                }
            }
        }


//function total_fertilizer (){
//
//}

function production_yala()
{
    require 'connect.php';
    GLOBAL $selectyear,$sessionID;

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
            $sql_qur = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE '%$selectyear%' and season='Yala' AND username LIKE '%$sessionID%'";
            if ($check = mysqli_query($conn, $sql_qur)) {
                if (mysqli_num_rows($check) > 0) {
                    echo "</br>";

                    echo "<b>Total Production cost for Yala season - </b>Rs." . number_format($tp_value) . "
               /=";

                } else {
                    GLOBAL $selectyear;

                    //insert to table for graphs
                    $sql = "INSERT INTO `tp_paddygraph`(`Year_pro`, `season`, `Total_Pro`, `Total_provalue`,`username`) VALUES ('$selectyear','Yala','$into_round','$tp_value','$sessionID')";
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
    GLOBAL $selectyear,$sessionID;

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
            $sql_qur = "SELECT * FROM tp_paddygraph WHERE Year_pro LIKE '%$selectyear%' and season='Maha' AND username LIKE '%$sessionID%'";
            if ($check = mysqli_query($conn, $sql_qur)) {
                if (mysqli_num_rows($check) > 0) {
                    echo "</br>";

                    echo "<b>Total Production cost Maha season - </b>Rs." . number_format($tp_value) . "
               /=";

                } else {
                    GLOBAL $selectyear;

                    //insert to table for graphs
                    $sql = "INSERT INTO `tp_paddygraph`(`Year_pro`, `season`, `Total_Pro`, `Total_provalue`,`username`) VALUES ('$selectyear','Maha','$into_round','$tp_value','$sessionID')";
                    if (mysqli_query($conn, $sql)) {

                    } else {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    echo "</br>";
//
                    echo "<b>Total Production cost Maha Season  - </b>Rs." . number_format($tp_value) . "
               /=";

                }
            }


        }
    }



}

function paddy_salesreport (){
    GLOBAL $yr,$sessionID;
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
            $sql_qur = "SELECT * FROM sales_report WHERE sales_year LIKE '%$yr%' AND username LIKE '%$sessionID%'";
            if ($check = mysqli_query($conn, $sql_qur)) {
                if (mysqli_num_rows($check) > 0) {
                    echo "</br>";
                    echo "<h3><b>Paddy Sales ".$yr."</b></h3>" . "<b>Total Sales   - </b>" . $sum . "
               Kg" . " (" . $totalsales_inton . "  Metric Tons)<br>";
                    echo "<b>Total Sales in Rs.   - </b>" . $sumsales . "
               /=<br>";

                } else {
                    $sql = "INSERT INTO `sales_report`(`sales_year`, `Sales`, `in_value`,`username`) VALUES ('$yr','$totalsales_inton','$sumsales','$sessionID')";
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

    GLOBAL $selectyear,$sessionID;
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
                        $sql_qur = "SELECT * FROM sales_typegraph WHERE Paddy_type LIKE '%$eng%' and year_sales LIKE '%$selectyear%' and username LIKE '%$sessionID%'";
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
                                $sql = "INSERT INTO `sales_typegraph`(`Paddy_type`,`year_sales`,`in_ton`,`username`) VALUES ('$eng','$selectyear','$inton_round','$sessionID')";
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
//function calculate_bytype($selectyear,$selectseason,$Paddy_array){
//    require 'connect.php';
//    GLOBAL $sessionID;
//    foreach ($Paddy_array as $value) {
//
//        $qur = "SELECT * FROM paddy WHERE Paddy_season LIKE '%" . $selectseason . "&' and Paddy_year LIKE '%" . $selectyear . "%' and Paddy_type LIKE '%" . $value . "%'  and farmer_username LIKE '%" . $sessionID . "%'";
////        echo $selectseason;
////        echo $selectyear;
//        if ($result = mysqli_query($conn, $qur)) {
//
//            if (mysqli_num_rows($result) > 0) {
//
//                $pro_unit=0;
//
//                $pro_value=0;
//                while ($row = mysqli_fetch_array($result)) {
//                    $pro_unit=$pro_unit+$row['Paddy_quantity'];
//                    $pro_inton=$pro_unit/1000;
//                    $value_per=$row['Paddy_price']*$row['Paddy_quantity'];
//                    $pro_value=$pro_value+$value_per;
//
//                }
//                echo "
//                  <table border='0'>
//                    <tbody><b><h5>
//                    <tr>
//
//                        <td class='col-md-8'><ul><li>Total Production for the Period in each Paddy Type </li></ul></td>
//                        <td class='col-md-4'>- " . number_format($pro_unit) . "Kg (" . $pro_inton . " Metric Tons)</td>
//                    </tr>
//
//
//                    <tr>
//                        <td class='col-md-8'><ul><li>Total production cost</li></ul></td>
//                        <td class='col-md-4'>- Rs. " . number_format($pro_value) . "/=</td>
//                    </tr>
//                    </h5>
//                    </b>
//                    </tbody>
//                  </table>
//                    ";
//            } else {
//                echo "<h3><e>No results found</e></h3>";
//            }
//        }
//fertilizer purchases
        function total_purchases ()
        {

            require 'connect.php';

            GLOBAL $yr;
            GLOBAL $sessionID;

            $qur = "SELECT * FROM fer_ordertable WHERE Fer_date LIKE '%$yr%' and Buyer_username LIKE '%$sessionID%' and status='completed'";

            if ($result = mysqli_query($conn, $qur)) {


                if (mysqli_num_rows($result) > 0) {

                    $total_Purchasesvalue = 0;
                    $in_ton = 0;
                    $tp_value = 0;
                    while ($row = mysqli_fetch_array($result)) {

                        $tp_value = $tp_value + $row['Fer_quantity'];   //total calculated tp value
                        $total_Purchasesvalue = $total_Purchasesvalue + $row['total']; // Total Production (tp or TP)
                        $in_ton = $tp_value / 1000; // tp in metric ton
                        $into_round = round($in_ton, 2);

                    }

                    //check availability
                    $sql_qur = "SELECT * FROM fertilizer_purchases WHERE year_purchases LIKE '%$yr%' and buyer_username LIKE '%$sessionID%' AND status='Completed'";
                    if ($check = mysqli_query($conn, $sql_qur)) {
                        if (mysqli_num_rows($check) > 0) {
                            echo "</br>";
                            echo "<h3><b>Fertilizer Purchases ".$yr."</b></h3>" . "";
                            echo "<b>Total fertilizer purchases   - </b>" . $tp_value . "
               Kg" . "";
                            echo "<br>";
                            echo "<b>Total Fertilizer cost in Rs.   - </b>" . $total_Purchasesvalue . "
               /=<br>";

                        }else{
                            //insert to table for graphs
                            $sql="INSERT INTO `fertilizer_purchases`(`year_purchases`, `buyer_username`, `purchases`,`purchases_value`,`status`) VALUES ('$yr','$sessionID','$tp_value','$total_Purchasesvalue','Completed')";
                            if(mysqli_query($conn, $sql)){

                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                            }
                            echo "</br>";
                            echo "<h3><b>Paddy Sales ".$yr."</b></h3>" . "<b>Total fertilizer purchases   - </b>" . $tp_value . "
               Kg" . "";
                            echo "<b>Total fertilizer cost in Rs.   - </b>" . $total_Purchasesvalue . "
               /=<br>";



                        }
                    }
                }else {
                    echo "<br>";
                    echo "<h5>No any fertilizer purchases have done during the period</h5>";

                }

            }
    }


?>