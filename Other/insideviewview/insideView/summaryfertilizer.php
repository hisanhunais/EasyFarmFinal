<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
require "../controller/connect.php";
echo "<b>Report of the fertilizer updated: By fertilizer type</b>";
echo "</br>";
echo "</br>";
//..................................................................//

// //..................................................................//

// echo "</br>";
// echo "</br>";
//..................................................................//



echo"</br>";



$sql="SELECT Fer_type,sum(Fer_quantity) FROM fertilizer
					GROUP BY Fer_type";
$result=mysqli_query($conn,$sql);
echo "<form>";
echo "<table class='table table-stripped table-hover'>";
// $sum=0;
//$row=mysqli_fetch_array($result,MYSQLI_NUM)

while($row=mysqli_fetch_array($result)){
    echo "<tr><td>".$row[0]." </td><td>".$row[1]."</td></tr>";
    //;
    echo "</table>";
    echo"</br>";
    
}
echo"</br>";
echo "</form>";
echo "<hr>";
//.............................................................................
?>
<?php
require "../controller/connect.php";
echo "<b>Report of the Fertilizer updated : By date</b>";
echo "</br>";
echo "</br>";






echo "</br>";
$sql1="SELECT DISTINCT Fer_date FROM fertilizer";

$result1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_array($result1)) {
    echo "Date :";
    echo"<b>".$row1[0]."</b>";

    $sql = "SELECT Fer_type,sum(Fer_quantity) FROM fertilizer WHERE Fer_date='$row1[0]'
					GROUP BY Fer_type";
    $result = mysqli_query($conn, $sql);

    echo "<table border='0'>";
    echo "</br>";
echo "</br>";
// $sum=0;
//$row=mysqli_fetch_array($result,MYSQLI_NUM)

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td width=>". $row[0] . "-"." </td><td width='100px'>" . $row[1] . " kg</td></tr>";
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