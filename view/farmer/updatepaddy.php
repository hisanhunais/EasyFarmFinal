<?php
  include('../../controller/func_paddy.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 900px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="modaL"]').tooltip();   
        });
    </script>
  </head>
  <body>
    

    <div class="container">
      <p></p>
          <div class="modal-dialog" role="document">
          <div class="modal-content">
                                      <div class="modal-header">
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                        <h4 class="modal-title" id="addLabel"><center>Update Paddy Details</center></h4>
                                      </div>
                                      <form action="updatepaddy.php" method="POST">
                                      <div class="modal-body">
                                        
                                          <div class="form-group">
                                            <label for="id">Paddy ID </label>
                                            <input type="label" name="paddy_ID" class="form-control"  id="id" value=<?php echo $_GET['id']; ?>>
                                          </div>
                                          <div class="form-group">                                               
                                  
                                              <label for="paddytype">Paddy Type</label>

                                                <select name='paddy_type' class='form-control' placeholder='Select category' id='paddytype'>
                                                <?php
                                                  $option="SELECT * FROM paddytype";
                                                  $res=mysqli_query($conn,$option);
                                                  while($d=mysqli_fetch_assoc($res)){

                                                  echo "<option value='".$d['Paddy_Type'].' | '.$d['Type_Sinhala']."'>".$d['Paddy_Type']."</option>";
                                                }

                                                ?>
                                                
                                              </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="price">Price per Kg.(Rs.) </label>
                                            <input type="text" name="paddy_price" class="form-control" placeholder="Price per Kg" id="price">
                                          </div>
                                          <div class="form-group">
                                            <label for="inputquantity">Quantity</label>
                                            <input type="text" name="paddy_quantity" class="form-control" placeholder="Quantity" id="inputquantity">
                                          </div>
                                         
                                          </div>
                                          <button type="submit" onclick="updatepaddy()" class="btn btn-default" name="bpaddy" class="btn-primary">Submit</button>
                                        
                                      </div>
                                      <div class="modal-footer">
                                        
                                      </div>
                                      </form>
                                    </div>                          
          </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>