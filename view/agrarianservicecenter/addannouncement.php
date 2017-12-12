<?php ob_start();?>
<?php //session_start();
$sessionID=$_SESSION["username"];
?>
<html>
<head>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>
  <body>
<!--     <center>
      <button class="btn btn-success pull-right"  data-toggle='modal' title="Insert Posts" data-target="#adddata" style="font-family: arial;"><span class="glyphicon glyphicon-plus-sign" > New</span>
      </button>
    </center> -->
       <!-- Modal -->
      <div class="modal fade" id="adddata" role="dialog">
        <div class="modal-dialog">
    
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Announcement</h4>
            </div>
            <form action="func_announcement.php" method="POST" id="add_data_form">
              <div class="modal-body">
                              
               

                <div class="form-group">
                  <label >Category</label>
                  <input type="text" name="category" class="form-control" placeholder=" category" id="category">
                </div>
                                
                <div class="form-group">
                  <label >Topic</label>
                  <input type="text" name="topic" class="form-control" placeholder=" topic" id="topic">
                </div>
                                 
                <div class="form-group">
                  <label >Description</label>
                  <textarea name="editor1" class="form-control" id="editor1"></textarea>
                </div> 

                                              

                <center>
                  <button type="submit"  class="btn btn-success btn-green" name="insertpost" class="btn btn-success" data-toggle="modal">Submit</button>
                </center>
              </div>
            </form>

          </div>
      
        </div>
      </div>
  
    

  </body> 
   
</html>

<script>
  CKEDITOR.replace( 'editor1' );
</script>