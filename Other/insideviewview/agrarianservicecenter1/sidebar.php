<?php

// Initializing variables.
//null variables
$homeActive =  $proActive = $annActive = $reportActive =$discussionActive= '';
// if active, change the colour
$active = "active main-color-bg";

switch(basename($_SERVER['PHP_SELF'])) {
    case 'agrarianhome.php':
        $homeActive = $active;
    break;
    case 'farmerprofiles.php';
        $proActive=$active;
    break;
    case 'agrariandiscussion.php':
        $discussionActive = $active;
    break;
        case 'discussiondetails.php':
        $discussionActive = $active;
    break;
    case'agrarianannouncement.php';
        $annActive=$active;
    break;

    case 'report.php':
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
    
    <a href="agrarianhome.php" class="list-group-item <?php echo $homeActive;?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>

    <a href="farmerprofiles.php" class="list-group-item <?php echo $proActive;?>"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Farmer Profiles</a>

    <a href="agrariandiscussion.php" class="list-group-item <?php echo $discussionActive;?>"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Discussion Forum<span class="badge">12</span></a>

    <a href="agrarianannouncement.php" class="list-group-item <?php echo $annActive;?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Announcement</a>

    <a href="agrarianreport.php" class="list-group-item <?php echo $reportActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>

</div>