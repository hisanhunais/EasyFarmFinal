
<!-- <?php #ob_start();?> -->
<?php// session_start();
$sessionID=$_SESSION["username"];
?>
<html>
<head>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

        <script type="text/javascript">
      function PreviewImage()
      {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imgLink").files[0]);
        oFReader.onload = function(oFREvent)
        {
          document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
      };
    </script>
</head>

  <body>
<!--           <center>
              <button class="btn btn-success"  data-toggle='modal' title="Insert ForumPost" data-target="#adddata" style="font-family: arial;"><span class="glyphicon glyphicon-plus-sign" >  New</span></button>
          </center> -->
          <div class="modal fade" id="adddata" role="dialog">
          <div class="modal-dialog">
    
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Forum Posts</h4>
            </div>
            <form action="func_discussion.php" method="POST" id="add_data_form">
              <div class="modal-body">

                <div class="form-group">                
                  <label >Username</label>
                  <input type="text" name="username" class="form-control" placeholder="username" id="username">
                </div>
                              
               

                <div class="form-group">
                  <label >Category</label>
                  <input type="text" name="category" class="form-control" placeholder=" category" id="category">
                </div>
                                
                <div class="form-group">
                  <label >Topic</label>
                  <input type="text" name="topic" class="form-control" placeholder=" topic" id="topic">
                </div>
                                 
                <div class="form-group">
                  <label >Forum_Post</label>
                  <textarea name="editor1" class="form-control" id="editor1"></textarea>
                </div> 

                                  <div class="form-group">
                    <center>
            <input type="file" id="imgLink" name="imgLink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();">
            <label>Ex: image.jpg, image.jpeg, image.png</label>
            <img id="uploadPreview" src="http://placehold.it/500x300" alt="" width="500px" height="300px" >
            </center> 
          </div>                              

                <center>
                  <button type="submit"  name="insert" class="btn btn-success btn-green" data-toggle="modal">Submit</button>
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
