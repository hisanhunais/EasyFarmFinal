<?php 
//session_start();
$sessionID=$_SESSION["username"];
?>
<html>
<head>
	  		<script type="text/javascript">
			function PreviewImage()
			{
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
				oFReader.onload = function(oFREvent)
				{
					document.getElementById("uploadPreview").src = oFREvent.target.result;
				};
			};
		</script>
	</head>
<body>
	<div class="modal fade" id="adddata" role="dialog">
        <div class="modal-dialog">
    
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Farmer Profile</h4>
            </div>


	<form  action="func_profile.php" method="post" enctype="multipart/form-data">
		 <div class="modal-body">
		 <div class="form-group">
		 	<center>
		 <img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br>
			<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
		</center>
	</div>
		 <div class="form-group"> 
		<label><b>Name</b></label>
		<input name="firstname" type="text" class="form-control"  placeholder="Type your first name"  required/><br>
		<input name="lastname" type="text" class="form-control" placeholder="Type your last name"  required/><br><br>
	</div>
	<div class="form-group"> 
		<label><b>Address</b></label>
		<input name="addressNo" type="text" class="form-control" placeholder="Type Address Number"  required/><br>
		<input name="Street" type="text" class="form-control" placeholder="Type Street"  required/><br>
		<input name="City" type="text" class="form-control"  placeholder="Type City"  required/><br><br>
	</div>
	<div class="form-group">
			<label><b>NIC Number</b></label>
		<input name="nicno" type="text" pattern="(^\d{9}[V|v|x|X]$)|(^\d{12}$)" class="form-control" placeholder="Type your National Identity card number (ex: 123456789v or 941234567890 )"  title= "enter your NIC number using only 9 numbers and x or v to end or 12 numbers" required/><br>
	</div>
	<div class="form-group"> 
		<label><b>Contact Number</b></label>
		<input name="contactno" type="text" class="form-control" placeholder="Type your contact number" required/><br><br>
	</div>
	<div class="form-group"> 
		<label><b>Username</b></label>
		<input name="username" type="text" class="form-control"  placeholder="Type your username" required/><br>
	</div>
	<div class="form-group"> 
		<label><b>Password</b></label>
		<input name="password" type="password" class="form-control" placeholder="Your password" required/><br>
	</div>
	<div class="form-group"> 
		<label><b>Confirm Password</b></label>
		<input name="cpassword" type="password" class="form-control"  placeholder="Confirm password" required/><br>
	</div>
		         <center>
                  <button type="submit"  class="btn btn-success btn-green" name="insert" class="btn btn-success" data-toggle="modal">Submit</button>
                </center>
		<div class="modal-footer">
          
          <!-- <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" /> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
	</div>
	</form>
 </div>
      
        </div>
      </div>
  
</body>	
</html>