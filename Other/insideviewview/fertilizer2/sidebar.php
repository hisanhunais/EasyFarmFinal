<?php

// Initializing variables.
$homeActive = $stockActive = $fertilizerOrderActive = $transportActive = $reportActive = '';
$active = "active main-color-bg";

switch(basename($_SERVER['PHP_SELF'])) {
    case 'home.php':
        $homeActive = $active;
    break;

    case 'stock.php':
        $stockActive = $active;
    break;

    case 'orders.php':
        $fertilizerOrderActive = $active;
    break;

    case 'transport.php':
        $transportActive = $active;
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
    <a href="home.php" id="homeBtn" class="list-group-item <?php echo $homeActive;?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
    <a href="stock.php" id="harvestBtn" class="list-group-item <?php echo $stockActive;?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Stock</a>
    <a href="orders.php" id="fertlizerOrderBtn" class="list-group-item <?php echo $fertilizerOrderActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Fertilizer Orders</a>
    <a href="transport.php" id="transportBtn" class="list-group-item <?php echo $transportActive;?>"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Transport</a>
    <a href="reports.php" id="reportBtn" class="list-group-item <?php echo $reportActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
</div>