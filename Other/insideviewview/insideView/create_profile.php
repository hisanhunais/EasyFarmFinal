
<!DOCTYPE html>
<html>
<head>
    <title>Create Farmer Profiles</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



<div class="container">
    <div class="content">
        <h2>Farmer Details</h2>

    </div>
    <div class="form" >
        <b><h4>
                <form method="post" action="model/createfarmer.php">

                    <table border="0" align="">

                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr>
                            <td>First Name </td>
                            <td>:</td>
                            <td ><input type="text" name="fname" size="30" maxlength="10">



                        </tr>

                        <tr>
                            <td height="10px" colspan="3" ></td>
                        </tr>

                        <tr >
                            <td >Last Name</td>
                            <td>:</td>
                            <td ><input type="text" name="lname" size="30" maxlength="30"></td>


                        </tr>

                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr >
                            <td >Telephone Number</td>
                            <td>:</td>
                            <td ><input type="number" name="tele" size="30" maxlength="10"></td>

                        </tr>

                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr >
                            <td >Farmer Address</td>
                            <td>:</td>
                            <td ><input type="text" name="add" size="30" maxlength="100" ></td>
							 <td ><input type="text" name="add" size="30" maxlength="100" ></td>
							  <td ><input type="text" name="add" size="30" maxlength="100" ></td>
                        </tr>

                        <!--<tr><td height="20px" colspan="3"></td></tr>
                        <tr >
                            <td  colspan="2">Vehicle Details(if owns)</td>
                        </tr>

                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr >
                            <td >Vehicle Type</td>
                            <td>:</td>
                            <td ><input type="text" name="vehtype" size="30" maxlength="30"></td>
                        </tr>

                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr >
                            <td >Vehicle Number</td>
                            <td>:</td>
                            <td ><input type="text" name="vehnum" size="30" maxlength="30"></td>
                        </tr>

                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr >
                            <td >Capacity</td>
                            <td>:</td>
                            <td ><input type="text" name="capacity" size="30" maxlength="30"></td>
                        </tr>-->
                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td ><input type="password" name="pwd" onchange="validatePassword()" size="30" maxlength="30"></td>
                        </tr>
                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr>
                            <td >User Name</td>
                            <td>:</td>
                            <td ><input type="text" name="usr" size="30" maxlength="30"></td>
                        </tr>
                        <tr>
                        <tr><td height="10px" colspan="3"></td></tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td>:</td>
                            <td ><input type="password" name="pwd" size="30" maxlength="30"></td>
                        </tr>

                        <tr><td height="20px" colspan="3"></td></tr>
                            <td ><center></center></td>
                            <td width="100px"></td>
                            <td><center><button name="submit" type="submit" value="submit">CREATE PROFILE</button>   <button type="Reset" value="Reset">CANCEL</button></center></td>
                        </tr>

                    </table>

                </form>
            </h4>
        </b>
    </div>
</div>
</div>
</body>
</html>