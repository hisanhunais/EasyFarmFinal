<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<!--<link href="../../css/bootstrap.min.css" rel="stylesheet">-->
</head>
<body>
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
							<!--<td width='250px'><button type='button' class='btn btn-secondary'><a href='announcementsDetailsScreen.php?id=$row[0]'>View Description</a></button></td>-->
							<td width='40%'>$shortDesc</td>
							<td width='15%'><center><input type='button' name='view' value='View Details' id='".$row[0]."' class='view_details btn btn-info btn-xs' /></center></td>
							
							</tr>
						
					";
					
				}
				echo "</div>";
				echo "</table>";
			}else{
				echo "error";
			}

		?>
		<?php

		function getDetails($an_id)
		{
		$an_id = $_GET['id'];
		$sql="SELECT * FROM announcement WHERE An_ID = '$an_id'";
		$date = "";
		//$category = "";
		$title = "";
		$description = "";
		$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
				if($res)
				{
					while($row=mysqli_fetch_row($res))
					{
						$date = $row[1];
						$category = $row[3];
						$title = $row[4];
						$description = $row[5];
					}
				}
		}
		?>
		<div class = "modal fade" id = "viewDescription"  tabindex="-1" role="dialog" aria-labelledby="addLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Announcement Details</h4>
					</div>
					<div class="modal-body" id="announcement_details">
						<p><?php echo $category; ?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
</body>
</html>

<script>
	$(document).ready(function(){
		$('.view_details').click(function(){
			var anid = $(this).attr("id");
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
	});
</script>

<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetchNotification.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    if(data.unseen_notification > 0)
    {
     $('.countAn').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 /*$('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });*/
 
 $(document).on('click', '#announcementBtn', function(){
  $('.countAn').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>