<?php
require 'connect.php';



//functions.............................................................................................................
//calculate year
function year(){
    require 'connect.php';

    echo "
    <form class='form-inline' method='POST' >
    <fieldset>
    <div align='left'>
    <label for='year1'>Select year</label>
    <select name='year' class='form-control'  id='year'>";



    for ($i=2017; $i <2025 ; $i++) {
        $a=$i+1;
        echo "<option value='$i/$a'>$i/$a</option>";
    }


    echo"</select>";
    echo "  ";
    echo"<button type='submit' class='btn btn-primary' name='btn_generate'>Generate Report</button>
    </div>
    
    ";
    echo "</fieldset>
    

    </table>";


    // generate();

}


function select_year(){
    require 'connect.php';

    echo "
    <fieldset>
    <div align='left'>
    <label for='seyear'>Select year</label>
    <select name='se_year' class='form-control'  id='year'>";



    for ($i=2017; $i <2025 ; $i++) {

        echo "<option value='$i'>$i</option>";

    }


    echo"</select>";
    echo "  ";
    echo"<button type='submit' class='btn btn-primary' name='btn_year'>Generate Report</button>
    </div>
    
    ";
    echo "</fieldset>
    

    </table>";


    // generate();

}


?>