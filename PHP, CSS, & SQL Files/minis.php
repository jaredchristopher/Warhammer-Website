<?php
session_start();

if (isset($_SESSION['user']) && isset($_SESSION['pwd']))
{
    $user = ($_SESSION['user']);
}

if (!(isset($_SESSION['user']) && isset($_SESSION['pwd'])))
{
    header('Location: login.php');

    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <title>Minis</title>
</head>
<body class="main">

    <div class="topnav">
        <a href="homepage.php"><i class="fa fa-fw fa-home"></i><b>Home</b></a>
        <a class="active" style="color:black" href="minis.php"><i class="fa fa-briefcase"></i><b>Minis</b></a>
        <!-- <a href="aboutus.php"><i class="fa fa-users"></i><b>About Us</b></a> -->
        <a href="retrieveRecords.php"><i class="fa fa-star"></i><b>Admin</b></a>
        <a href="logout.php"><i class="fa fa-sign-out"></i><b>Logout</b></a>
    </div>

    <div class="factions">
                <h1 class="w3-center" style="font-size: 400%; color:white; font-family:sigmar">Choose a faction you want to see!</h1>

                <div class="row">
                   <div class="col1">
                        <h3 style="font-size: 275%"><a href="nurgle.php"><b>Nurlge</b></h3></a>
                            <!-- <p>Nurgle is a vile faction who are the bringers of death, disease, and decay. All hail Grandfather Nurgle!</p> -->
                   </div> 
                   <div class="col2">
                        <h3 style="font-size: 275%"><a href="khorne.php"><b>Khorne</b></h3></a>
                            <!-- <p>Followers of Khorne only seek to spill the blood of their enemies and take their skulls. Glory to the Blood Father!</p> -->
                   </div> 
                   <div class="col3">
                        <h3 style="font-size: 275%"><a href="tzeentch.php"><b>Tzeentch</b></h3></a>
                            <!-- <p>The followers of Tzeentch strive to twist the mortal realm with their magic and deceit. It is all already forseen!</p> -->
                   </div> 
                   <div class="col4">
                        <h3 style="font-size: 275%"><a href="slaanesh.php"><b>Slaanesh</b></h3></a>
                            <!-- <p>The Slaanesh faction seek endless pleasure through the tormenting and pain of others. Hail to the Prince of Delight!</p> -->
                    </div>

    </div>
    
</body>
</html>