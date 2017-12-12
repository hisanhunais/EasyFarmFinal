<?php
session_start();
$sessionID=$_SESSION{"username"};
$today=Date("Y-m-d");
list($yr,$month,$day) = explode('-', $today);
$year_new=$yr+1;
$selectyear=$yr."/".$year_new;

 function fetch_data()  
 {
     GLOBAL $selectyear;
      $output = '';  
      $conn = mysqli_connect("", "root", "", "easyfarmdb");  
      $sql = "SELECT * FROM paddytype_graph WHERE year  LIKE '%$selectyear%' and username='total'";
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["Paddy_type"].'</td>  
                          <td>'.$row["production_inton"].'</td> 
                           <td>'.$row["pro_value"].'</td>   
                            
                     </tr>  
                          ';  
      }  
      return $output;  
 }



 if(isset($_POST["generate_pdf"]))  
 {  
      require('../../tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Download");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();

      $content = '';
      $content .= '  



      <h1 align= "center"> Easy Farm Web Application </h1>
      <h2 align= "center"> Agrarians Service Center</h2>
      <br><br>
      <hr>

      <br><br><br>

      <h2 align= "center">Seasonal Production</h2>

      <br><br><br>
        
      <table align="center" border="0" cellspacing="0" cellpadding="3" border="1">  
           <tr>  
                <th width="30%"><b>Paddy Type</b></th>  
                <th width="30%"><b>Production in Metric tons</b></th>
                 <th width="30%"><b>Production Value in Rupees</b></th>  
                  
           </tr> 

      ';
      $content .= fetch_data();
      $content .= '</table> ';
      //$content .= '<img src="/Images/SmarTID.png"  width="50" height="50">';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>PDF Generate</title>

       </head>  
      <body>  
                   
                      



                           <?php  
                               fetch_data();  
                            ?>  
                      
                      </body>  
 </html>
                     