<!DOCTYPE html>
<?php 
  include ('../../controller/func.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paddy Dashboard </title>
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
    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script> -->
</head>
<body>
    <?php
      require_once '../../controller/connect.php'
       
    ?>
    <?php
        $errtype="";
        $errprice="";
        $errquantity="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["paddy_type"])) {
                $errtype = "Paddy Type is required";
            } else {
                $paddytype = mysqli_real_escape_string($conn, $_POST["paddy_type"]);
                /*$err = validate_text_and_numbers($title);*/
            }

            if (empty($_POST["paddy_price"])) {
                $errprice = "Paddy price is required";
            } else {
                $paddyprice = mysqli_real_escape_string($conn, $_POST["paddy_price"]);
                
            }

            if (empty($_POST["paddy_quantity"])) {
                $errquantity = "Paddy quantity is required";
            } else {
                $paddyquantity = mysqli_real_escape_string($conn, $_POST["paddy_quantity"]);
                
            }            

            if($errtype=="" and $errprice=="" and $errquantity==""){
                insertpaddy($paddytype,$paddyprice,$paddyquantity);
            }
        }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Paddy Details</h2>
                        <button class="btn btn-success pull-right"  data-toggle='modal' title="Insert Paddy Details" data-target="#adddata" style="font-family: arial;"><span class="glyphicon glyphicon-plus-sign" >  New</span></button>
                        <div class="modal fade" id="adddata" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <!-- <h4 class="modal-title" id="addLabel"><center>වී තොරතුරු ඇතුලත් කරන්න </center></h4> -->
                            </div>
                            <form action="paddy.php" method="POST">
                            <div class="modal-body">
                              
                                
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
                                  <label for="price">Price per Kg</label>
                                  <input type="text" name="paddy_price" class="form-control" placeholder="Price per kg" id="price">
                                </div>
                                <div class="form-group">
                                  <label for="inputquantity">Quantity</label>
                                  <input type="text" name="paddy_quantity" class="form-control" placeholder=" Quantity" id="inputquantity">
                                </div>
                                <!-- <div class="form-group">
                                  
                                  <input type="date" name="paddy_date" id="date" hidden>
                                </div> -->
                               <!--  <div class="form-group">
                                  <label for="exampleInputFile">File input</label>
                                  <input type="file" id="exampleInputFile">
                                  <p class="help-block">Example block-level help text here.</p>
                                </div> -->
                                <!-- <div class="checkbox">
                                  <label>
                                    <input type="checkbox"> Check me out
                                  </label> -->
                                </div>
                                <button type="submit"  class="btn btn-primary" name="insertpaddy" class="btn btn-success" data-toggle="modal">Submit</button>
                                    <!-- <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          
                                        </div>
                                        <div class="modal-body">
                                          <p>ඔබ විසින් නව වී තොරතුරු ඇතුලත් කරන ලදි. </p>
                                        </div>
                                        <div class="modal-footer">
                                          <a href="viewpaddy123sinhala.php"><input type="button" name="සනාථ කරන්න "></a>
                                        </div>
                                      </div>
                                    </div> -->
                              
                            </div>
                            <!-- <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                               <button type="submit" onclick="" class="btn-success" name="bpaddy">Submit</button> -->
                            </div> -->
                            </form>
                          </div>
                        </div>
                      </div>
                      <p></p>
                    </div>

                    </div>
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
                    <?php
                    // Include config file
                    require_once '../../controller/connect.php';
                    
                    // Attempt select query execution
                    $sql="SELECT * FROM paddy ORDER BY Paddy_date DESC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th></th>";
                                        echo "<th>Paddy ID</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Quantity</th>";
                                        echo "<th>Date </th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Paddy_ID'] . "</td>";
                                        echo "<td>" . $row['Paddy_type'] . "</td>";
                                        echo "<td>" . $row['Paddy_price'] . "</td>";
                                        echo "<td>" . $row['Paddy_quantity'] . "</td>";
                                        echo "<td>" . $row['Paddy_date'] . "</td>";
                                        echo "<td><center>";
                                            // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='updatepaddy.php?id=". $row['Paddy_ID'] ."' title='Update Record' data-toggle='modal' ><button class='btn btn-primary'><span class='glyphicon glyphicon-pencil'>  Update</span></button></a>


                                            ";
                                        echo "</center></td>";
                                        echo "<td><center>";
                                            echo "<a href='../view/deletepaddy.php?id=". $row['Paddy_ID'] ."' title='Delete Record' data-toggle='tooltip'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'> Delete</span></button></a>";
                                        echo "</center></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>

    
</body>
</html>