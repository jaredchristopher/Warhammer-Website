<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

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

function sanitize($value)
{
    return htmlspecialchars(trim($value));
}

function getPostback()
{
    $_SERVER['PHP_SELF'] = htmlspecialchars($_SERVER['PHP_SELF']);
    $_SERVER['PHP_SELF'] = trim($_SERVER['PHP_SELF']);
        
    return $_SERVER['PHP_SELF'];
}

function getDSN()
{
    $prefix = 'mysql';
    $host = 'localhost';
    $port = '8889';
    $dbname = 'project';
    $dsn = "$prefix:host=$host:$port;dbname=$dbname";

    return $dsn;
}

function getUser()
{
    $user = 'root';

    return $user;
}

function getPwd()
{
    $pwd = 'root';

    return $pwd;
}

function getPDO()
{
    $pdo = new PDO(getDSN(), getUser(), getPwd());
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function sqlJoinQuery()
{
    $stm = 'SELECT r.user, m.year, m.faction, m.type
            FROM registration AS r, m AS miniature
            WHERE r.id=m.registration$id';

    return $stm;
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

    <title>The Center of Chaos Home</title>
</head>
<body class="main">

<!-- Navigation Bar -->
<div class="topnav">
    <a class="active" style="color:black" href="homepage.php"><i class="fa fa-fw fa-home"></i><b>Home</b></a>
    <a href="minis.php"><i class="fa fa-briefcase"></i><b>Minis</b></a>
    <!-- <a href="aboutus.php"><i class="fa fa-users"></i><b>About Us</b></a> -->
    <a href="retrieveRecords.php"><i class="fa fa-star"></i><b>Admin</b></a>
    <a href="logout.php"><i class="fa fa-sign-out"></i><b>Logout</b></a>
</div>

<!-- Welcome Part -->
<div class="text-box" id="welcome">
            <h1>Welcome to the Center of Chaos!</h1>
            <p><a href="minis.php" class="hero-btn">Find your favorite Daemons!</a></p>
</div>

<div class="card">
    <div class="clearfix">
        <div class="container">
            <img class="image" src="homepagebanner.jpeg">
    
    <!-- Factions Section -->
            <div class="factions">
                <h1 class="w3-center" style="font-size: 400%; color:white; font-family:sigmar">WHO WOULD YOU JOIN?</h1>

                <div class="row">
                   <div class="col1">
                        <h3 style="font-size: 275%"><b>Nurlge</b></h3>
                            <p>Nurgle is a vile faction who are the bringers of death, disease, and decay. All hail Grandfather Nurgle!</p>
                   </div> 
                   <div class="col2">
                        <h3 style="font-size: 275%"><b>Khorne</b></h3>
                            <p>Followers of Khorne only seek to spill the blood of their enemies and take their skulls. Glory to the Blood Father!</p>
                   </div> 
                   <div class="col3">
                        <h3 style="font-size: 275%"><b>Tzeentch</b></h3>
                            <p>The followers of Tzeentch strive to twist the mortal realm with their magic and deceit. It is all already forseen!</p>
                   </div> 
                   <div class="col4">
                        <h3 style="font-size: 275%"><b>Slaanesh</b></h3>
                            <p>The Slaanesh faction seek endless pleasure through the tormenting and pain of others. Hail to the Prince of Delight!</p>
                    </div>

            </div>
        </div>
    </div>
</div>

</body>

<footer class="w3-yellow w3-center">Created by: Jared Christopher</footer>
</html>