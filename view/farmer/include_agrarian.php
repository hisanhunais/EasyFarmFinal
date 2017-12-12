<div class="tab-content" id="orderTabs">
<div id="farmers" class="tab-pane fade in active">
<div class="col-md-8">
    <!--                                  <div id="curve_chart" style="width: 600px; height: 300px;" ></div>-->
    <div id="donutchart" style="width: 600px; height: 300px;" ></div>

</div>
<div class="col-md-4">
    <?php
    ?>

</div>

<div>
    <?php
//    GLOBAL $sessionID;
    //
    production_cal();

    //                                    total_production($type_farmer,$sessionID);

    //                      ?>
    <!--                                    <hr>-->
    <!--                                    <br>-->
    <!--                                    <br>-->
</div>

<div class="col-md-8">
    <div id="columnchart" style="width: 500px; height: 250px;" ></div>
</div>

<div>
    <?php
    production_yala();
    production_maha();

    ?>

</div>
    <div class="row">
        <br>
        <form method="post" action="total_pro.php">
            <a > <input type="submit" name="generate_pdf"  value="Generate PDF Total Production"  href="total_pro.php" align="right"/></a>
        </form>
        <br>
        <form method="post" action="sales zero.php">
            <a > <input type="submit" name="generate_pdf"  value="Generate PDF"  href="sales zero.php" align="right"/></a>
        </form><br>
    </div>
</div>
<div class="row"></div>
<div id="sales" class="tab-pane fade in active">
    <div class="col-md-8">
        <br><br>
        <div id="donutchart_sales" style="width: 600px; height: 300px;" ></div>

    </div>
    <?php
    paddy_salesreport();
    paddy_salestype();
    ?>


</div>
    <div id="fertilizerSellers" class="tab-pane fade in active">
<br>
        <div class="col-md-8">
        <div id="columnchart_fertilizer" style="width: 500px; height: 250px;" ></div>
        </div>
        <?php

        total_purchases();
        ?>

    </div>
</div>