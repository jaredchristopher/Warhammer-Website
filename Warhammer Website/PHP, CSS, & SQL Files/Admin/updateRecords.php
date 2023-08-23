<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if (isset($_SESSION['user']) && isset($_SESSION['password'])) { 
    $user = ($_SESSION['user']);

    if (($user == 'admin')) { 
        $user = ($_SESSION['user']);
    }
    else {
        header('Location: home.php');
        die;
    }
}
if (!isset($_SESSION['user'])) {
    header('Location: home.php');
    die;
}  

function idDropdown() {
    try {
        $pdo = getPDO();
        $pdoStatement = $pdo->query(sqlJoinQuery());

        $select = "<select name='id'><option selected disabled>Select a user</option>";
        foreach ($pdoStatement as $rowData) {
            $select .= "<option>$rowData[id]</option>";
        }
        $select .= "</select>";
        $pdo = null;

        return $select;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function favoriteDropdown() {
    try {
        $pdo = getPDO();
        $pdoStatement = $pdo->query(sqlJoinQuery());

        $select = "<select name='new_mini_name'><option selected disabled>Select a mini fig</option>";

        $select .= "<option>Great_Unclean_One</option>";
        $select .= "<option>Glottkin</option>";
        $select .= "<option>Plagueridden</option>";
        $select .= "<option>Bloodthirster</option>";
        $select .= "<option>Bloodletter</option>";
        $select .= "<option>Crusher</option>";
        $select .= "<option>Lord_of_Change</option>";
        $select .= "<option>Blue_Horror</option>";
        $select .= "<option>Pink_Horror</option>";
        $select .= "<option>Keeper_of_Secrets</option>";
        $select .= "<option>Fiend</option>";
        $select .= "<option>Tactica</option>";

        $select .= "</select>";
        $pdo = null;

        return $select;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function sanitize($value) {
    return htmlspecialchars(trim($value));
}
    function getPostback() {
        $_SERVER['PHP_SELF'] = htmlspecialchars($_SERVER['PHP_SELF']);
        $_SERVER['PHP_SELF'] = trim($_SERVER['PHP_SELF']);
        return $_SERVER['PHP_SELF'];
    }

    function getDSN() {
        $prefix = 'mysql';
        $host = 'localhost';
        $port = '8889';
        $dbname = 'project';

        $dsn = "$prefix:host=$host:$port;dbname=$dbname";
        return $dsn;
    }
    function getUsername() {
        $user = "root";
        return $user;
    }
    function getPassword() {
        $password = "root";
        return $password;
    }
    function getPDO()
    {
        $dsn = getDSN();
        $user = getUsername();
        $pwd = getPassword();

        $pdo = new PDO($dsn, $user, $pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function sqlJoinQuery()
    {
        $stm = "SELECT r.user, r.id, c.email, c.phone, f.mini_name
                FROM registration AS r, favorites AS f, contact AS c
                WHERE r.id = f.registration\$id
                AND r.id = c.registration\$id
                ORDER BY id";
        return $stm;
    }

    function sqlUpdateQuery()
    {
        $stm = 'UPDATE favorites
                SET mini_name = :new_mini_name
                WHERE registration$id=:id;';

        return $stm;
    }

    function buildTable($pdoStatement)
    {
        $count = 0;
        $table = '';

        $table .= '<table class="w3-table-all"><caption class="w3-large" style="color:white">';
        $table .= 'User Records</caption>';
        $table .= '<thead><tr><th>#</th><th>id</th><th>username</th>';
        $table .= '<th>email</th><th>phone number</th><th>favorite</th></tr></thead>';
        $table .= '<tbody>';

        foreach($pdoStatement as $info)
        {   
            $count += 1;
            $table .= "<tr><td>$count</td>";
            $table .= "<td>$info[id]</td>";
            $table .= "<td>$info[user]</td>";
            $table .= "<td>$info[email]</td>";
            $table .= "<td>$info[phone]</td>";
            $table .= "<td>$info[mini_name]</td></tr>";
        }

        $table .= '</tbody></table>';

        return $table; 
    }
    function displayRecords()
    {
        try
        {
            $pdo=getPDO();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ( $_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $params =[];
            $params[":new_mini_name"]  = sanitize($_POST['new_mini_name']);
            $params[":id"]  = sanitize($_POST['id']);

            $pdoStatement = $pdo->prepare(sqlUpdateQuery());
            $pdoStatement->execute($params);
        }
            $pdoStatement = $pdo->query(sqlJoinQuery()); 

            echo buildTable($pdoStatement);

            $pdo= null; 
        }
        catch(PDOException $e)
        {
           echo $e->getMessage();
        }
    }
    
    
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>


<body class="main">

<div class="topnav">
        <a href="homepage.php"><i class="fa fa-fw fa-home"></i><b>Home</b></a>
        <a href="minis.php"><i class="fa fa-briefcase"></i><b>Minis</b></a>
        <!-- <a href="aboutus.php"><i class="fa fa-users"></i><b>About Us</b></a> -->
        <a class="active" style="color:black" href="admin.php"><i class="fa fa-star"></i><b>Admin</b></a>
        <a href="logout.php"><i class="fa fa-sign-out"></i><b>Logout</b></a>
    </div>


<div class="card">
    <p class="w3-center" style="font-size: 300%; color:white; font-family:sigmar"><b>Admin Management</b></p>
    <p class="w3-center" style="font-size: 250%; color:white; font-family:sigmar"><b>Update Records</b></p>
</div>

<div class="topnav">
    <a href="retrieveRecords.php">Retrieve Records</a>
    <a href="updateRecords.php">Update Favorites</a>
    <a href="deleteRecords.php">Delete User</a>
    <a href="signup.php">Create New User</a>
</div>



    <?php displayRecords(); ?>

<form action="<?php getPostback(); ?>" method="POST">
    <div class='w3-center'>
        <div class='container'>
            <p>
            <label class="w3-large" style="color:white">Update favorite mini fig to: <?php echo favoriteDropdown(); ?></label>
                <label class="w3-large" style="color:white">for record id: <?php echo idDropdown(); ?></label>
            </p>
    
            <p><button class="button">Update</button></p>
        </div>
    </div>
</form>





</body>

<footer class="w3-panel w3-center">

</footer>

</html>