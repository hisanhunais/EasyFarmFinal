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
			$sql="SELECT * FROM paddytype" ; 

			$res=Mysqli_query($con,$sql);
			echo "<table class='table table-bordered'>
							<tr>
							
							<th width='15%'>Type ID</th>
							<th width='15%'>Type</th>
							<th width='40%'>Short Description</th>
							<th width='15%'></th>
							</tr>
						
					";
					//echo "</table>";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					//echo "<div class='tbl'>";
					//echo "<table border=0 >
					
						echo "	<tr>
							<td width='15%'>$row[0]</td>
							<td width='15%'>$row[1]</td>
							<td width='15%'>$row[2]</td>
							<td width='15%'><center><input type='button' name='view' value='Delete' id='".$row[0]."' class='delete_data btn btn-danger btn-xs' /></center></td>
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
		
		<!-- modal for the updating  Announcement Details -->
		
						


<!-- modal for the deleting  Announcement Details -->
<div id="deleteStock" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="delete_stock_form"  action="delpaddyfunc.php">
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

		$(document).on('click', '.update_data', function(){
			var update_ID = $(this).attr("id");
			$('#updatedata').val(update_ID);
			$ajax({
				url:"fetch_announcement.php",
				method:"POST",
				data:{update_ID,update_ID},
				dataType:"json",
				success: function(data){
					$('#category').val(Category);
					$('#topic').val(Topic);
					$('#editor1').val(Description);
					$('#updatedata').val(An_ID);
					$('#updateStock').modal('show');
				}
			})
			

		 // $('#updateStock').modal('show');
		});


		// 		$(document).on('click', '.edit_data', function(){
		// 	var paddyID = $(this).attr("id");
		// 	$.ajax({
		// 		url:"fetch_stock.php",
		// 		method:"POST",
		// 		data:{paddyID:paddyID},
		// 		dataType:"json",
		// 		success:function(data)
		// 		{
		// 			$('#item_name1').val(data.Paddy_type);
		// 			$('#item_qty1').val(data.Paddy_quantity);
		// 			$('#item_qty2').val(0);
		// 			$('#item_price1').val(data.Paddy_price);
		// 			//$('#item_price').val(data.Paddy_price);
		// 			$('#paddyID1').val(data.Paddy_ID);
		// 			$('#editStock').modal('show');
		// 		}

		// 	});
		// });

		$('#edit_stock_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"add_stock.php",
				method:"POST",
				data:$('#edit_stock_form').serialize(),
				success:function(data)
				{
					$('#edit_stock_form')[0].reset();
					$('#updateStock').modal('hide');
					$('#stock_table').html(data);
				}
			});
		});
		// $('#delete_stock_form').on('submit',function(event){
		// 	event.preventDefault();
		// 	$.ajax({
		// 		url:"add_stock.php",
		// 		method:"POST",
		// 		data:$('#delete_stock_form').serialize(),
		// 		success:function(data)
		// 		{
		// 			$('#delete_stock_form')[0].reset();
		// 			$('#deleteStock').modal('hide');
		// 			$('#stock_table').html(data);
		// 		}
		// 	});
		// });

	});


</script>
<script>
  CKEDITOR.replace( 'editor1' );
</script>