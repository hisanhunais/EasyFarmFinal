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
// echo "<table><tr><td colspan='2'>Paddy type: Samba</td></tr></table>";


// echo"</br>";



// $sql="SELECT sum(Paddy_quantity) FROM paddy
// 		WHERE Paddy_type='Samba'";
// $result=mysqli_query($conn,$sql);

// //echo "<table>";
// // $sum=0;
// //$row=mysqli_fetch_array($result,MYSQLI_NUM)

// while($row=mysqli_fetch_array($result)){
// echo "<tr><td>Total updated paddy quantity: </td><td>".$row[0]." kg</td></tr>";
// 	//;
// echo "</table>";
// echo"</br>";
// echo"</br>";
// }
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
//for($i=0;$i<sizeof($row);$i++)
//{
//$sum=$sum+$i;

//}
//echo $i;
//echo "</table>";

// $res=Mysqli_query($conn,$sql);
// $datas=array();
// if ($res){
// 	if(mysqli_num_rows())

// 	}
// }else{
// 	echo "error";
// }




?>
</body>
</html>