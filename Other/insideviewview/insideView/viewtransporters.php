<html>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <body>
    <?php
    require "../controller/connect.php";



            echo "</br>";
            echo "</br>";
//            echo "<form action='viewtransporters.php'>";
            echo"<table class='table table-stripped table-hover'>;
        <tr><td width='150px'>
        <select name='select' class='btn btn-primary dropdown-toggle'>
            <option value='Lorry' >Lorry</option>
            <option value=Tractor'>Tractor</option>
            <option value='Land Master'>Land Master</option>
        
        </td>
        <td><input type='button' name='search'  value='Search' class='btn btn-primary'></td></tr></table>";


        if(isset($_POST['Search'])) {
            $search = $_POST['select'];
            $sql = "SELECT * FROM transporter
					WHERE Veh_Type='$search' ORDER BY Tr_Id DESC";
            $res = mysqli_query($conn, $sql)
            or die(mysqli_error($conn));
            echo "<form method='post' action='viewtransporters.php'><table border=0 class='table table-stripped table-hover'>
							<tr>
							
							<td width='100px'>Transporter ID</td>
							<td width='100px'>Name</td>
							<td width='100px'>Tel No</td>
							<td width='100px'>Reg Date</td>
							<td width='100px'>Vehicle No</td>
							<td width='100px'>Model</td>
							</tr>
						</table>
					";


            if ($res) {
                while ($row = mysqli_fetch_row($res)) {
                    echo "<div class='tbl'>";
                    echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							<td width='100px'>$row[0]</td>
							<td width='100px'>$row[1]</a></td>
							<td width='100px'>$row[3]</td>
							<td width='100px'>$row[4]</td>
							<td width='100px'>$row[5]</td>
							<td width='100px'>$row[6]</td>
							
							";

                    echo "</tr>";
                    echo "</table></form>";


                }
            } else {
                echo "error" . mysql_error();
            }
        }

    ?>


    </body>
</html>