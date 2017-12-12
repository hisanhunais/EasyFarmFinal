<?php
require "../controller/connect.php";
if(isset($_POST["submit"])){

    //$Farmer_ID=$_POST['FarmerId'];
    $First_Name=$_POST['fname'];
    $Last_Name=$_POST['lname'];
    $Telephone = $_POST['tele'];
    $Farmer_Address = $_POST['add'];
    $user = $_POST['usr'];
    $password= $_POST['pwd'];
    $veh_type= $_POST['vehtype'];
    $veh_num= $_POST['vehnum'];
    $capacity= $_POST['capacity'];
    $type="Farmer";

    //query
    $sql="INSERT INTO farmer (FName,LName,Farmer_Tel,Farmer_add,veh_type,veh_num,capacity) VALUES ('$First_Name','$Last_Name','$Telephone','$Farmer_Address','$veh_type','$veh_num','$capacity');";


    $sql1="INSERT INTO login (username,FirstName,LastName,password,Contact_No,User_Type) VALUES ('$user','$First_Name','$Last_Name','$password','$Telephone','$type')";
    $records =$conn->query($sql);
    $records1 =$conn->query($sql1);

    if($records1){

        echo'<script>';
        echo"alert('SUCCESS | Successfully Added')";
        echo'</script>';
        
    }
    else{
        echo'<script>';
        echo"alert('FAILED | Not added')";
        echo'</script>';
    }
}
header("location:../agrariancreatepro.php");
?>