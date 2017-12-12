<?php
	require '../../dbconfig/config.php';
   //session_start();
$sessionID=$_SESSION["username"];

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
                                <td width="20%"><?php echo $row[7]; ?><!--<img src="<?php #echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--></td>
                               <td width='15%'><center><input type='button' name='view' value='View Details' id="<?php echo $row[0]; ?>" class='view_details btn btn-info btn-xs' /></center></td>
                                <!-- <td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-danger btn-sm delete_data" ></td> -->
                                
                                <td width='15%'><center><input type='button' name='view' value='Update' id="<?php echo $row[0]; ?>"  class='update_data btn btn-success btn-xs' /></center></td>

                                <td width='15%'><center><input type='button' name='delete' value='Delete' id="<?php echo $row[0]; ?>" class='delete_data btn btn-danger btn-xs' /></center></td>
                              </tr>		
		<?php 

			}
		?>
		</table>
	</div>


<div class = "modal fade" id = "viewDescription"  tabindex="-1" role="dialog" aria-labelledby="addLabel">
      <div class="modal-dialog">
        <form method="post" >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Farmer Profile Details</h4>
          </div>
          <div class="modal-body" id="details">
            
            <input type="text" name="updatedata" id="updatedata">
          </div>
          <div class="modal-footer">
              
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
      </div>
    </div>

<div id="deleteStock" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="delete_stock_form"  action="func_profile.php">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Farmer Profile</h4>
        </div>
        <div class="modal-body">


          <p>Are you sure you want to delete ?</p>
         <!--  <b><p id="showid"> ?</p></b> -->
          <input type="hidden" name="deletedata" id="deletedata">
        </div>
        <div class="modal-footer">
         <input type='submit'  name='submit' id='submit' value='Delete'  class='btn btn-danger btn-sm ' > 
          <!-- <button type="submit"  class="btn main-color-bg" id = "showid" name="delete" >Delete</button>  -->
          <!-- <a class="btn main-color-bg" href="func_announcement.php?An_ID=<?php #echo urlencode($An_ID); ?>"><i class="icon-trash icon-white"></i> Delete</a> -->
          <!-- <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" /> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- modal for update farmer profile -->
<div id="updateStock" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="delete_stock_form"  action="func_profile.php">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Farmer Profile</h4>
        </div>
        <div class="modal-body">


     <div class="form-group"> 
    <label><b>Name</b></label>
    <input name="firstname" id="firstname" type="text" class="form-control"  placeholder="Type your first name"  required/><br>
    <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Type your last name"  required/><br><br>
  </div>
  <div class="form-group"> 
    <label><b>Address</b></label>
    <input name="addressNo" id="addressNo" type="text" class="form-control" placeholder="Type Address Number"  required/><br>
    <input name="Street" id="Street" type="text" class="form-control" placeholder="Type Street"  required/><br>
    <input name="City" id="City" type="text" class="form-control"  placeholder="Type City"  required/><br><br>
  </div>
  <div class="form-group"> 
    <label><b>Contact Number</b></label>
    <input name="contactno" id="contactno" type="text" class="form-control" placeholder="Type your contact number" required/><br><br>
  </div>
<!--   <div class="form-group"> 
    <label><b>Username</b></label>
    <input name="username" id="username" type="text" class="form-control"  placeholder="Type your username" required/><br>
  </div> -->
  
  <input type="hidden" name="updatedata" id="updatedata">
             
    <div class="modal-footer">
          <button type="submit"  class="btn btn-success btn-green" name="update" class="btn btn-success" data-toggle="modal">Update</button>
          <!-- <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" /> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

          
         <!--  <b><p id="showid"> ?</p></b> -->
          
        </div>

      </div>
    </form>
  </div>
</div>

</body>
</html>

<script >


      $(document).on('click', '.view_details', function(){
      var del_ID = $(this).attr("id");
      $('#updatedata').val(del_ID);
       $.ajax({
          url:"getFarmerDetails.php",
          method:"post",
          data:{del_ID:del_ID},
          success:function(data){
              $('#details').html(data);
              $('#viewDescription').modal('show');
    }
  })
    });

    $(document).on('click', '.delete_data', function(){
      var del_ID = $(this).attr("id");
      $('#deletedata').val(del_ID);
      $('#deleteStock').modal('show');
    });

        $(document).on('click', '.update_data', function(){
      var del_ID = $(this).attr("id");
      $('#updatedata').val(del_ID);
      $.ajax({
        url:"fetch_announcement.php",
        method:"POST",
        data:{del_ID:del_ID},
        dataType:"json",
        success:function(data)
        {
          $('#firstname').val(data.firstName);
          $('#lastname').val(data.lastName);
          $('#addressNo').val(data.addressNo);
          $('#Street').val(data.addressStreet);
          //$('#item_price').val(data.Paddy_price);
          $('#City').val(data.addressCity);
          $('#contactno').val(data.contactNo);
          // $('#password').val(data.password);
          $('#updatedata').val(data.username);
          // $('#cpassword').val(data.cpassword);
          $('#updateStock').modal('show');
        }

      });      
      // $('#updateStock').modal('show');
    });
</script>


