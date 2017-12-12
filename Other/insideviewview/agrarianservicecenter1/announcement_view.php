
 <body>
  

                  <div class="table-responsive">
                    <button type="button" class="btn btn-md main-color-bg" data-toggle="modal" data-target="#addStock">
                      <span class="glyphicon glyphicon-plus-sign"> Add
                    </button>
                    <br><br>
                    <div class="scroll">
                    <div id="stock_table">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                    <th width='25%'>Date</th>
                  <th width='25%'>Announcement type</th>
                    <th width='25%'>Time</th>
                    <th width='10%'></th>
                    <th width='10%'></th>
<<<<<<< HEAD

                </tr>";
                //echo "</table>";

                if ($res){
                	while($row=mysqli_fetch_row($res)){

                	echo "  
                	<tr>

                   		<td width='25%'>$row[1]</td>
                    	<td width='25%'>$row[3]</td>
                    	<td width='25%'>$row[2]</td>

                    	

                      <td width='10%'><input type='button'  name='edit' value='View Description' id='".$row[0]."' class='btn btn-info btn-sm edit_data' ></td>
                      <td width='10%'><input type='button' data-toggle='modal' data-target='#deleteStock' name='delete' value='Delete' id='".$row[0]."' class='btn btn-danger btn-sm delete_data' ></td>
                     

                            
                	</tr>
                        
                	";
                    
                	}
                
                echo "</table>";

                }else{
                    echo "error";
                }

            ?>
                                               
=======
                        </tr>
                      </thead>
                      <tbody>

<?php

/*require("../../dbconfig/config.php");

$sql = "SELECT * FROM fertilizer";
$rs_result = mysqli_query($con,$sql);

while($row = mysqli_fetch_row($rs_result)) 
{
?>
  <tr>
    <td width="20%"><?php echo $row[1]; ?></td>
    <td width="20%"><?php echo $row[2]; ?></td>
    <td width="20%"><?php echo $row[3]; ?></td>
    <td width="20%">Image<!--<img src="<?php echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--></td>
    <td width="10%"><input type="button" name="edit" value="Edit" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs edit_data" ></td>
    <td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
  </tr>
<?php                              
}*/



require("../../dbconfig/config.php");

$sql = "SELECT * FROM announcement";
$rs_result = mysqli_query($con,$sql);
$output = '';

while($row = mysqli_fetch_row($rs_result)) 
{
  $output .= '<tr>
    <td width="20%">'.$row[1].'</td>
    <td width="20%">'.$row[3].'</td>
    <td width="20%">'.$row[2].'</td>
    
    <td width="10%"><input type="button" name="edit" value="View Description" id="'.$row[0].'" class="btn btn-info btn-sm edit_data" ></td>
    <td width="10%"><input type="button" name="delete" value="Delete" id="'.$row[0].'" class="btn btn-danger btn-sm delete_data" ></td>
  </tr>';
 }
 echo $output; 

?>  

                              </tbody>
                    </table>
                  </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
>>>>>>> ed779bfc23ee253ff3dba30fd8195b28e535ba29
        </div>
          </div>
      </div>
  </section>



<div id="addStock" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="add_stock_form">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Announcement</h4>
        </div>
          <div class="modal-body">
                              
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
                  <label >Description</label>
                  <input type="text" name="des" class="form-control" placeholder=" description" id="des">
                </div>
                 <input type="hidden" name="fertilizerID" id="fertilizerID">
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" value="Submit" id="insert" class="btn main-color-bg" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div id="deleteStock" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="delete_stock_form">
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
          <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>  
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>-->
    <!--<script src="../../js/jquery.js"></script>-->
  </body>
</html>

<script>
  $(document).ready(function(){
    $('#add_stock_form').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:"add_Stock.php",
        method:"POST",
        data:$('#add_stock_form').serialize(),
        success:function(data)
        {
          $('#add_stock_form')[0].reset();
          $('#addStock').modal('hide');
          $('#stock_table').html(data);
        }
      });
    });

    $(document).on('click', '.edit_data', function(){
      var fertilizerID = $(this).attr("id");
      $.ajax({
        url:"fetch_stock.php",
        method:"POST",
        data:{fertilizerID:fertilizerID},
        dataType:"json",
        success:function(data)
        {
          $('#date').val(data.Date);
          $('#time').val(data.Time);
          $('#category').val(data.Category);
          $('#topic').val(data.Topic);
          $('#des').val(data.Description);
          $('#fertilizerID').val(data.An_ID);
          $('#insert').val('Update');
          $('#addStock').modal('show');
        }

      });
    });

    $(document).on('click', '.delete_data', function(){
      var del_fertilizerID = $(this).attr("id");
      //alert(del_fertilizerID);
      $('#deletedata').val(del_fertilizerID);
      $('#deleteStock').modal('show');
    });

    $('#delete_stock_form').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:"add_Stock.php",
        method:"POST",
        data:$('#delete_stock_form').serialize(),
        success:function(data)
        {
          $('#delete_stock_form')[0].reset();
          $('#deleteStock').modal('hide');
          $('#stock_table').html(data);
        }
      });
    });
  });
</script>





