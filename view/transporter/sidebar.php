<?php

// Initializing variables.
$homeActive = $deliveryActive = $reportActive = '';
$active = "active main-color-bg";

switch(basename($_SERVER['PHP_SELF'])) {
    case 'home.php':
        $homeActive = $active;
    break;

    case 'delivery.php':
        $deliveryActive = $active;
    break;

    case 'reports.php':
        $reportActive = $active;
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
    <!-- <a href="home.php" id="homeBtn" class="list-group-item <?php echo $homeActive;?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> -->
    <a href="delivery.php" id="deliveryBtn" class="list-group-item <?php echo $deliveryActive;?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Delivery</a>
    <a href="reports.php" id="reportBtn" class="list-group-item <?php echo $reportActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
</div>