<html>
<body>
	<div class="modal fade" id="adddata" role="dialog">
        <div class="modal-dialog">
    
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Farmer Profile</h4>
            </div>

	<form  action="func_profile.php" method="post">
		 <div class="modal-body">
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