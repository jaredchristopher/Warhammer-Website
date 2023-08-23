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
    <link rel="stylesheet" href="minis.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <title>Tzeentch Minis</title>
</head>
<body class="main">

    <div class="topnav">
        <a href="homepage.php"><i class="fa fa-fw fa-home"></i><b>Home</b></a>
        <a class="active" style="color:black" href="minis.php"><i class="fa fa-briefcase"></i><b>Minis</b></a>
        <a href="aboutus.php"><i class="fa fa-users"></i><b>About Us</b></a>
        <!-- <a href="retrieveRecords.php"><i class="fa fa-star"></i><b>Admin</b></a> -->
        <a href="logout.php"><i class="fa fa-sign-out"></i><b>Logout</b></a>
    </div>

    <div id="minis">
        <center><a id="change"><img src="change.jpeg" width="300" height="300" alt="Lord of Change"/></a></center>
        <center><label class="heart-button">
                        <input type="checkbox" name="Lord_of_Change">
                        <i class="icon-heart fa fa-heart"></i>
                        <i class="icon-plus-sign fa fa-plus"></i>
                    </label></center>
        <center><a id="blue"><img src="blue.webp" width="300" height="300" alt="Blue Horror"/></a></center>
        <center><label class="heart-button">
                    <input type="checkbox" name="Blue_Horror">
                    <i class="icon-heart fa fa-heart"></i>
                    <i class="icon-plus-sign fa fa-plus"></i>
                </label></center>
        <center><a id="pink"><img src="pink.webp" width="300" height="300" alt="Pink Horror"/></a></center>
        <center><label class="heart-button">
                    <input type="checkbox" name="Pink_Horror">
                    <i class="icon-heart fa fa-heart"></i>
                    <i class="icon-plus-sign fa fa-plus"></i>
                </label></center>
        <span class="stretch"></span>

    </div>

    <center><div><input type="submit" value="Save Favorites"></div></center>
    
</body>
</html>