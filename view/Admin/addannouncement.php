<?php ob_start();?>
<html>
<head>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
  <script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
  </script>
  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

  

</script>
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
              <h4 class="modal-title">Add Data Type</h4>
            </div>
            <form action="func_announcement.php" method="POST" id="add_data_form"  enctype="multipart/form-data" >
              <div class="modal-body">
                
                  <center> 
                    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>

                    <img id="uploadPreview" src="http://placehold.it/500x300" alt="" width="500px" height="300px">
                  <!-- <img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br> -->
      
    </center>


                <div class="form-group">
                  <label >Type</label>
                  <input type="text" name="type" class="form-control" placeholder=" category" id="category">
                </div>
                              
                                 
                <div class="form-group">
                  <label >Description</label>
                  <textarea name="description" class="form-control" id="editor1"></textarea>
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