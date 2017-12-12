<?php ob_start();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Agrarian Service Center</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

  <style>
div.scroll {
    
    width: 900px;
    height: 400px;
    overflow: scroll;
}

div.hidden {
    background-color: #00FF00;
    width: 900px;
    height: 400px;
    overflow: hidden;
}
</style>

  </head>

  <body>
	<!--<nav class = "navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="homefe.php">EasyFarm</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<!<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">WELCOME</a></li>
					<li><a href="index.php">LogOut</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<section id="breadcrumb">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="active">Agrarian Service Center Profile</li>
			</ol>
		</div>
	</section>-->
    <?php include 'header.php'; ?>
	
	<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
					  <a href="agrarianhome.php" class="list-group-item ">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
					  </a>

					  <a href="agrariancreatepro.php" class="list-group-item"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Create Farmer Profiles</a>
					  <a href="agrarianmeeting.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Meetings</a>
					  <a href="agrariandiscussion.php" class="list-group-item"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Discussion <span class="badge">12</span></a>
					  <a href="agrarianannouncement.php" class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Posts</a>
					  <a href="agrarianreport.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
					</div>
            </div>
			<div class="col-md-9">
					<div class="panel panel-default">
					  <!--<div class="panel-heading main-color-bg">
						<h3 class="panel-title">Home Buyer</h3>
						
					  </div>-->
					  <div class="panel-body">
						<div class="row">
							<div class = "col-md-12" id="loadSection">
								<!DOCTYPE html>
<?php 
  include ('../../controller/func_meeting.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meeting Dashboard </title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">-->
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
      require_once ('../../controller/connect.php');
       
    ?>
   <?php
        $errdate="";
        $errtime="";
        $errpurpose="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["date"])) {
                $errdate = "Date is required";
            } else {
                $date = mysqli_real_escape_string($conn, $_POST["date"]);
                /*$err = validate_text_and_numbers($title);*/
            }

            if (empty($_POST["time"])) {
                $errtime = "Time is required";
            } else {
                $time = mysqli_real_escape_string($conn, $_POST["time"]);
                
            }

            if (empty($_POST["purpose"])) {
                $errpurpose = "Purpose is required";
            } else {
                $purpose = mysqli_real_escape_string($conn, $_POST["purpose"]);
                
            }            

            if($errdate=="" and $errtime=="" and $errpurpose==""){
                insertmeeting($date,$time,$purpose);
            }
        }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Meetings</h2>
                        <button class="btn btn-success pull-right"  data-toggle='modal' title="Insert Meetings" data-target="#adddata" style="font-family: arial;"><span class="glyphicon glyphicon-plus-sign" >  New</span></button>
                        <div class="modal fade" id="adddata" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <!-- <h4 class="modal-title" id="addLabel"><center>වී තොරතුරු ඇතුලත් කරන්න </center></h4> -->
                            </div>
                            <form action="agrarianmeeting.php" method="POST">
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
                                  <label >Purpose</label>
                                  <input type="text" name="purpose" class="form-control" placeholder=" purpose" id="purpose">
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
                                <center>
                                <button type="submit"  class="btn btn-primary" name="insertmeeting" class="btn btn-success" data-toggle="modal">Submit</button></center>
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
                     <div class=scroll>
                    <?php
                    // Include config file
                    require_once '../../controller/connect.php';
                    
                    // Attempt select query execution
                    $sql="SELECT * FROM meetings ORDER BY Date DESC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                       
                                        echo "<th>Meeting_ID</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Time</th>";
                                        echo "<th>Purpose</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['meetingID'] . "</td>";
                                        echo "<td>" . $row['Date'] . "</td>";
                                        echo "<td>" . $row['Time'] . "</td>";
                                        echo "<td>" . $row['Purpose'] . "</td>";
                                        echo "<td><center>";
                                            // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";


                                            echo "<a href='updatemeeting.php?meetingid=". $row['meetingID'] ."' title='Update Record' data-toggle='tooltip' ><button class='btn btn-primary'><span class='glyphicon glyphicon-pencil'>  Update</span></button></a>


                                            ";

                                        echo "</center></td>";
                                        echo "<td><center>";
                                            echo "<a href='deletemeeting.php?meetingid=". $row['meetingID'] ."' title='Delete Record' data-toggle='tooltip'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'> Delete</span></button></a>";
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
    </div>

    
</body>
</html>
							</div>
						</div>
					  </div>
					</div>
				</div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
