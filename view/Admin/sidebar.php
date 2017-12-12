<?php

// Initializing variables.
$homeActive = $usersActive = $fertilizerOrderActive = $paddytypeActive = $commentsActive  = '';
$active = "active main-color-bg";

switch(basename($_SERVER['PHP_SELF'])) {
    case 'home.php':
        $homeActive = $active;
    break;

    case 'users.php':
        $usersActive = $active;
    break;

    case 'paddytype.php':
        $paddytypeActive = $active;
    break;

    case 'comments.php':
        $commentsActive = $active;
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
    <a href="users.php" id="harvestBtn" class="list-group-item <?php echo $usersActive;?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> User Profiles</a>
     <a href="paddytype.php" id="harvestBtn" class="list-group-item <?php echo $paddytypeActive;?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Paddy Type</a>
     <a href="comments.php" id="harvestBtn" class="list-group-item <?php echo $commentsActive;?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> comments</a>
</div>