<?php //session_start();
$sessionID=$_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<!--<link href="../../css/bootstrap.min.css" rel="stylesheet">-->
	<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>
<body>
	<div class=scroll >
	<?php

			require("../../dbconfig/config.php");
			$category = "";
			$sql="SELECT * FROM announcement ORDER BY Date DESC" ; 

			$res=Mysqli_query($con,$sql);
			echo "<table class='table table-bordered'>
							<tr>
							
							<th width='15%'>Date</th>
							<th width='15%'>Category</th>
							<th width='15%'>Title</th>
							<th width='40%'>Short Description</th>
							<th width='15%'></th>
							<th width='15%'></th>
							</tr>
						
					";
					//echo "</table>";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					//echo "<div class='tbl'>";
					//echo "<table border=0 >
					$shortLen = strlen($row[5]);
					$shortDesc = "";
					if($shortLen<=50)
					{
						$shortDesc = $row[5];
					}
					else
					{
					$shortDesc = substr($row[5], 0,50)." .........";
					}
						echo "	<tr>
							<td width='15%'>$row[1]</td>
							<td width='15%'>$row[3]</td>
							<td width='15%'>$row[4]</td>

							
							<td width='40%'>$shortDesc</td>
							<td width='15%'><center><input type='button' name='view' value='View Details' id='".$row[0]."' class='view_details btn btn-info btn-xs' /></center></td>
							<td width='15%'><center><input type='button' name='view' value='Delete' id='".$row[0]."' class='delete_data btn btn-danger btn-xs' /></center></td>
							<!-- <td width='15%'><center><input type='button' name='view' value='Update' id='".$row[0]."'  class='update_data btn btn-success btn-xs' /></center></td>-->
							</tr>
						
					";
					
				}
				echo "</div>";
				echo "</table>";
			}else{
				echo "error";
			}

		?>
		<!-- modal for the viewing  Announcement Details -->
	</div>
		<div class = "modal fade" id = "viewDescription"  tabindex="-1" role="dialog" aria-labelledby="addLabel">
			<div class="modal-dialog">
				<form method="post" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Announcement Details</h4>
					</div>
					<div class="modal-body" id="announcement_details">
						<p><?php echo $category; ?></p>
						<!-- <input type="hidden" name="viewdata" id="viewdata"> -->
					</div>
					<div class="modal-footer">
						  
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
			</div>
		</div>
		<!-- modal for the updating  Announcement Details -->
<!-- 		<div class = "modal fade" id = "updateStock"  tabindex="-1" role="dialog" aria-labelledby="addLabel">
			<div class="modal-dialog">
				<form method="post" id="edit_stock_form" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update Announcement</h4>
					</div>
					<div class="modal-body" id="announcement_details">
						<p><?php # echo $category; ?></p>
						<input type="hidden" name="updatedata" id="updatedata">
		

						
						
					              
                <div class="form-group">
                  <label >Category</label>
                  <input type="text" name="category" class="form-control"  id="category">
                </div>
                                
                <div class="form-group">
                  <label >Topic</label>
                  <input type="text" name="topic" class="form-control" placeholder=" topic" id="topic">
                </div>
                                 
                <div class="form-group">
                  <label >Description</label>
                  <textarea name="editor1" class="form-control" id="editor1"></textarea>
                </div>  
                 
					</div>
					<div class="modal-footer">
						 <input type='submit'  name='insert' id='submit' value='Update'  class='btn btn-success btn-sm ' >
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
			</div>
		</div> -->

<!-- modal for the deleting  Announcement Details -->
<div id="deleteStock" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="delete_stock_form"  action="add_stock.php">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Announcement</h4>
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
</body>
</html>
<script>
  CKEDITOR.replace( 'editor1' );
</script>
<script>
	$(document).ready(function(){
		$('.view_details').click(function(){
			var anid = $(this).attr("id");
			$('#updatedata').val(anid);
			$.ajax({
				url:"getAnnouncementDetails.php",
				method:"post",
				data:{anid:anid},
				success:function(data){
					$('#announcement_details').html(data);
					$('#viewDescription').modal("show");

				
				}
			});	
		});



		$(document).on('click', '.delete_data', function(){
			var del_ID = $(this).attr("id");
			$('#deletedata').val(del_ID);
			$('#deleteStock').modal('show');
		});

	// 	$(document).on('click', '.update_data', function(){
	// 		var anid = $(this).attr("id");
	// 		$('#updatedata').val(anid);
	// 		$.ajax({
	// 			url:"fetch_announcement.php",
	// 			method:"POST",
	// 			data:{anid:anid},
	// 			dataType:"json",
	// 			success: function(data){
	// 				$('#category').val(data.Category);
	// 				$('#topic').val(data.Topic);
	// 				$('#editor1').val(data.Description);
	// 				$('#updatedata').val(data.An_ID);
	// 				$('#updateStock').modal('show');
	// 			}
	// 		})
			

	// 	 // $('#updateStock').modal('show');
	// 	});


	// 	$('#edit_stock_form').on('submit',function(event){
	// 		event.preventDefault();
	// 		$.ajax({
	// 			url:"add_stock.php",
	// 			method:"POST",
	// 			data:$('#edit_stock_form').serialize(),
	// 			success:function(data)
	// 			{
	// 				$('#edit_stock_form')[0].reset();
	// 				$('#updateStock').modal('hide');
	// 				$('#stock_table').html(data);
	// 			}
	// 		});
	// 	});


	 });


</script>
