<?php
require("../../dbconfig/config.php");
//session_start();
//$un = $_SESSION['username'];

$sql = "SELECT * FROM fertilizer";
$rs_result = mysqli_query($con,$sql);

while($row = mysqli_fetch_row($rs_result)) 
{
?>
	<tr>
  	<td width="20%"><?php echo $row[1]; ?></td>
		<td width="20%"><?php echo $row[2]; ?></td>
		<td width="20%"><?php echo $row[3]; ?></td>
		<td width="10%"><input type="button" name="edit" value="Edit" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs edit_data" ></td> 
		<td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-danger btn-xs delete_data" ></td>
	</tr>
<?php              								 
}
?>                                