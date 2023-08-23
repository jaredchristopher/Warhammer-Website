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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO favorites (mini_name) VALUES (?)");
$stmt->bind_param("s", $mini_name);

// Set parameters and execute statement
if(isset($_POST['Great_Unclean_One'])){
    $mini_name = "Great_Unclean_One";
    $stmt->execute();
}
if(isset($_POST['Glottkin'])){
    $mini_name = "Glottkin";
    $stmt->execute();
}
if(isset($_POST['Plagueridden'])){
    $mini_name = "Plagueridden";
    $stmt->execute();
}

// Close connection and redirect to the previous page
$stmt->close();
$conn->close();
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>