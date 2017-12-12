
<!-- <?php ob_start();?> -->
<html>
<head>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
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
                  <label >Date</label>
                  <input type="text" name="date" class="form-control" placeholder="date" id="date">
                </div>

                <div class="form-group">
                  <label >Time</label>
                  <input type="text" name="time" class="form-control" placeholder="time" id="time">
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
                  <input type="text" name="des" class="form-control" placeholder=" description" id="des">
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
