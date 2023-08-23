<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$message = '';

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

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_start();

    $user = sanitize($_POST['user']);
    $pwd = sanitize($_POST['pwd']);

    $pwdDigest = password_hash($pwd, PASSWORD_BCRYPT);

    $params = [];
    $params[':user'] = $user;
    $params[':pwd'] = $pwdDigest;

    try
    {
        $pdo = getPDO();

        $sql = "INSERT into registration
                (user, pwd)
                VALUES
                (:user, :pwd)";

        $stm = $pdo->prepare($sql);
        $stm->execute($params);

        if ($stm->rowCount() == 1)
        {
            $userRecord = $stm->fetch(PDO::FETCH_ASSOC);
            $dbPwd = $userRecord['pwd'];
            $pdo = null;

            header('Location: login.php');
        }
        else
        {
            header('Location: signup.php');

            die ("Account could not be created.");
        }

        $pdo = null;

    }
    catch (PDOException $e)
    {
        if ($e->errorInfo[1] == 1062)
        {
            $message = "Please use different information to sign-up.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://www.w3schools.com/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">

    <title>Center of Chaos Sign-up Page</title>
</head>
<body>
    <div class="form">
     <h1>Sign-up to join us in the Chaos Wastes!</h1>
        <form action="<?php getPostback();?>" method="post">
            <input autofocus required type="text" name="user" placeholder="Username">
            <input required type="password" name="pwd" placeholder="Password">
            <button>Sign-up</button>
            <p class="message">Already registered? <a href="login.php">Log In</a></p>
        </form>
    </div>
</body>
</html>