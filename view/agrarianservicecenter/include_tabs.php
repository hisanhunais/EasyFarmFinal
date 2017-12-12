<div class="tab-content" id="orderTabs">
<div id="farmers" class="tab-pane fade in active">
<div class="col-md-8">
    <!--                                  <div id="curve_chart" style="width: 600px; height: 300px;" ></div>-->
    <div id="donutchart" style="width: 600px; height: 300px;" ></div>

</div>
<!--                              <div class="col-md-4">-->
<!--                              --><?php
//                              ?>
<!---->
<!--                              </div>-->

<div>




    <?php


    //
    total_production ();

    //                      ?>
    <hr>
    <br>
    <br>
</div>
<!--                                  <div id="curve_chart" style="width: 600px; height: 300px;" ></div>-->
<div class="col-md-8">
    <div id="columnchart" style="width: 500px; height: 250px;" ></div>
</div>
<div class="col-md-4">
    <br><br><br><br><br><br>


</div>
<div>
    <?php
    //


    production_yala();
    production_maha();
    ?>
    <form method="post" action="sales zero.php">
        <a > <input type="submit" name="generate_pdf"  value="Generate PDF"  href="sales zero.php" align="right"/></a>
    </form><br>
</div>

</div>
    <div id="sales" class="tab-pane fade in active">
<div class="col-md-8">
    <br><hr>
    <div id="donutchart_sales" style="width: 600px; height: 300px;" ></div>

</div>

<div class="col-md-12">
    <br>
    <br>
    <br><br>
    <?php


    require '../../controller/connect.php';

    paddy_salesreport();
    paddy_salestype();

    ?>
    <hr>
</div>
    </div>
    <div id="pther" class="tab-pane fade in active">
<div class="col-md-12">
    <?php
    require '../../controller/connect.php';
    new_profiles();
//    meeting_details ();
    ?>
</div>
    </div>
</div>