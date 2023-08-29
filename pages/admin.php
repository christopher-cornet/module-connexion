<?php
session_start();

// error_reporting(0);

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

if ($_SESSION['user'] == true && $_SESSION['user'] == 'admin') {
    $name = $_SESSION['user']; 
}
else {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <h1>Panel Administrateur</h1>
    <table class="test" border=1>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Password</th>
        </tr>
    <?php
    $sql = "SELECT * FROM user";
    $statement = $db->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $result = $statement->fetchAll();
    if($result) {
        foreach($result as $row) {
        ?>
        <tr>
            <td><?= $row->id; ?></td>
            <td><?= $row->login; ?></td>
            <td><?= $row->firstname; ?></td>
            <td><?= $row->lastname; ?></td>
            <td><?= $row->password; ?></td>
        </tr>
        <?php
        }
    }
    ?>
    </table>
</body>
</html>