<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	        <style>
            div.scroll {
    
                width: 900px;
                height: 400px;
                overflow: scroll;
            }

        </style>
	<!--<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/homepage.css" rel="stylesheet">
	<script src="../../js/bootstrap.min.js"></script>-->

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>
<body>

	


	<?php
		include('../../controller/connect.php');
		$sql="SELECT * FROM login WHERE type='Farmer'";

		$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	?>	

		<div class=scroll>
		<table class="table table-bordered">
	 					<tr>
                                  <td width="20%"><b>Username</b></td>
                                  <td width="20%"><b>First Name</b></td>
                                  <td width="20%"><b>Last Name</b></td>
                                  <td width="20%"><b>Contact No</b></td>
                                   <td width="10%"></td>
                                  <td width="10%"></td>
						</tr>	
		<?php 
			while($row=mysqli_fetch_row($res))
			{
		?>
                             <tr>
                               <td width="20%"><?php echo $row[0]; ?></td>
                                 <td width="20%"><?php echo $row[1]; ?></td>
                                 <td width="20%"><?php echo $row[2]; ?></td>
                                <td width="20%"><?php echo $row[3]; ?><!--<img src="<?php #echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--></td>
                               <td width="10%"><input type="button" name="edit" value="Edit" id="<?php echo $row[0]; ?>" class="btn btn-info btn-sm edit_data" ></td>
                                <!-- <td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-danger btn-sm delete_data" ></td> -->
                                <td width="10%"> <a data-toggle="modal" data-id="<?=$row[0];?>" href="#delete" class="btn btn-danger btn-sm view-admin">Delete</a></td>
                              </tr>		
		<?php 

			}
		?>
		</table>
	</div>


<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Order Details</h4>
			</div>
			<div class="modal-body" id="order_details">
		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="delete" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="delete_stock_form" action=func_profile.php >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Announcement</h4>
        </div>
        <div class="modal-body">


          <p>Are you sure you want to delete the user called</p>
          <b><p id="showid"> ?</p></b>
          <input type="hidden" name="deletedata" id="deletedata">
        </div>
        <div class="modal-footer">
         <input type='button'  name='delete' value='Delete' id='<?php echo $row[0]; ?>' class='btn btn-danger btn-sm delete_data' > 
          <!-- <button type="submit"  class="btn main-color-bg" id = "showid" name="delete" >Delete</button>  -->
          <!-- <a class="btn main-color-bg" href="func_announcement.php?An_ID=<?php #echo urlencode($An_ID); ?>"><i class="icon-trash icon-white"></i> Delete</a> -->
          <!-- <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" /> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>  
</body>
</html>

<script type="text/javascript">
$(document).on("click", ".view-admin", function() {
    var adminid = $(this).data('id');
    $(".modal-body #showid").text(adminid);
    $('#delete').modal('show');
});
</script>


