<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	  include ('../../controller/func_paddy.php');
	?>
	<meta charset="UTF-8">
    <title></title>
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
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<!-- <div class="modal-dialog" role="document"> -->
                           <center>
                           <div class="modal-content" style="width: 600px; height: 240px;">
                            <div class="modal-header">
                              
                              <h3 class="modal-title" id="addLabel"><center> <b>!</b> Delete Confirmation</center></h3>
                             </div>
                            <form action="deletepaddy.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="modal-body"> 
                              <!-- <h4>You are about to delete following record.</h4>  --> 
                             <br>
                             <?php
                             	require ('../../controller/connect.php');
                             	$paddy_id = $_GET['id'];
                             	$sql="SELECT * FROM `paddy` WHERE Paddy_ID='$paddy_id'";
              								$res=mysqli_query($conn,$sql);
              								if($result = mysqli_query($conn, $sql)){
			                         if(mysqli_num_rows($result) > 0){
			                             echo "<table class='table table-bordered table-striped'>";
			                                
			                            while($row = mysqli_fetch_array($result)){
			                                    echo "<tr>";
			                                        echo "<td>" . $row['Paddy_ID'] . "</td>";
			                                        echo "<td>" . $row['Paddy_type'] . "</td>";
			                                        echo "<td>" . $row['Paddy_price'] . "</td>";
			                                        echo "<td>" . $row['Paddy_quantity'] . "</td>";
			                                        echo "<td>" . $row['Paddy_date'] . "</td>";
			                                        
			                                    echo "</tr>";
			                                 }
			                                echo "</tbody>";                            
			                            echo "</table>";
			                            
			                            mysqli_free_result($result);
			                        }
			                     }
                             ?>   
                            <h4>Are you sure you want to delete this record  ? </h4>  
                            </div>
                            <div class="modal-footer">
                            	<button type="submit" class="btn btn-primary" name="btndelete">Delete</button> 
                            	<a href="harvest.php"><button type="button" class="btn btn-danger" name="btncancel">Cancel</button></a> 
                              
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <p></p>
                    </div>
                    </center>

                    <?php
                      if(isset($_POST['btndelete']))
                      {
                        deletepaddy($paddy_id);
                      }
                    ?>
                    <!-- </div> -->
</body>
</html>