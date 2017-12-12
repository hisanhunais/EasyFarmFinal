<?php
include('config.php');
if(isset($_POST["submit"])){  
    
    $Fer_ID=$_POST['FertilizerId'];
    $Fer_Name=$_POST['ferti'];
	$Fer_Desc=$_POST['desc'];
    $Quantity = $_POST['qty'];
	$Price_per_unit = $_POST['price'];
    $expiry = $_POST['expiry'];
	
	//query
    $sql2="INSERT INTO fertilizer (Fer_ID,Fer_Name,Fer_Desc,Quantity,expiry,Price_per_unit) VALUES ('$Fer_ID','$Fer_Name','$Fer_Desc','$Quantity','$expiry','$Price_per_unit')";
    $records =$db->query($sql2);
	
	 if($records){
        echo'<script>';
        echo"alert('SUCCESS | Successfully Added')";
        echo'</script>';
        header("location:Fertilizer_seller_add.php");
    }
    else{
        echo'<script>';
        echo"alert('FAILED | Not added')";
        echo'</script>';
    }
}



?>