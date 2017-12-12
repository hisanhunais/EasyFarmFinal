<?php

// Initializing variables.
$homeActive =  $paddyOrderActive = $historyActive = $reportActive =  '';
$active = "active main-color-bg";

switch(basename($_SERVER['PHP_SELF'])) {
    case 'home.php':
        $homeActive = $active;
    break;

    case 'order.php':
        $paddyOrderActive = $active;
    break;

    case 'orderhistory.php':
        $historyActive = $active;
    break;

    case 'report.php':
        $reportActive = $active;
    break;

    case 'productPage.php':
        $paddyOrderActive = $active;
    break;

    // By default, we assume you will be at index.php (setting $homeActive).
    default:
        $homeActive = $active;
    break;
}
?>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/homepage.css" rel="stylesheet">

<div class="list-group">
    <a href="home.php" id="homeBtn" class="list-group-item <?php echo $homeActive;?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
    <a href="order.php" id="paddyOrderBtn" class="list-group-item <?php echo $paddyOrderActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Paddy Orders</a>
    <a href="orderhistory.php" id="historyBtn" class="list-group-item <?php echo $historyActive;?>"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> My Orders</a>
    <a href="report.php" id="reportBtn" class="list-group-item <?php echo $reportActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
</div>