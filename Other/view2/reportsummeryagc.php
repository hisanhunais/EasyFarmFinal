<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<body>
<?php
require "../controller/connect.php";
echo "<b>Report of the Paddy updated : By date</b>";
echo "</br>";
echo "</br>";






echo "</br>";
$sql1="SELECT DISTINCT Paddy_date FROM paddy";

$result1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_array($result1)) {
    echo "Date :";
    echo $row1[0];

    $sql = "SELECT Paddy_type,sum(Paddy_quantity) FROM paddy WHERE paddy_date='$row1[0]'
					GROUP BY paddy_type";
    $result = mysqli_query($conn, $sql);

    echo "<table border='0'>";
    echo "</br>";
echo "</br>";
// $sum=0;
//$row=mysqli_fetch_array($result,MYSQLI_NUM)

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td width='120px'>" . $row[0] . " </td><td width='100px'>" . $row[1] . " kg</td></tr>";
        //;
        echo "</table>";
        echo "</br>";
    }
    echo "</table>";
        echo "</br>";
        echo "<hr>";
}





?>
</body>
</html>