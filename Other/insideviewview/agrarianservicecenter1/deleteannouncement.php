<html>
<head>
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
	<body>
	<div id="delete" class="modal fade">
  <div class="modal-dialog">
    <form method="POST" id="delete_stock_form" action="func_announcement.php">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Item</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this item?</p>
          <input type="hidden" name="deletedata" id="deletedata">
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn main-color-bg" name="deletepost">Delete</button> 
          <!-- <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" /> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>  
</body>
</html>