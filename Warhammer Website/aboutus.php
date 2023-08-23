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
        <a href="minis.php"><i class="fa fa-briefcase"></i><b>Minis</b></a>
        <a class="active" style="color:black" href="aboutus.php"><i class="fa fa-users"></i><b>About Us</b></a>
        <a href="retrieveRecords.php"><i class="fa fa-star"></i><b>Admin</b></a>
        <a href="logout.php"><i class="fa fa-sign-out"></i><b>Logout</b></a>
    </div>

    <div class="factions">
                
        <h1 class="w3-center" style="font-size: 350%; color:white; font-family:sigmar">We welcome you to the Center of Chaos!</h1>
        <p class="w3-center" style="font-size: 200%; color:white; font-family:sigmar">The Center of Chaos is a database driven website that allows you to pick your favorite miniatures from the tabletop game Warhammer 40k.
            We hope you enjoy our site and what it has to offer!
        </p>
    
    </div>
    
</body>
</html>