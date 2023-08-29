<?php
session_start();

error_reporting(0);

if ($_SESSION['user'] !== "") {
    $name = $_SESSION['user']; 
}

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

if(ISSET($_POST['login'])){
    if($_POST['user_login'] != "" || $_POST['password'] != ""){
        $user_login = $_POST['user_login'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE login=? AND password=? ";
        $query = $db->prepare($sql);
        $query->execute(array($user_login,$password));
        $row = $query->rowCount();
        $fetch = $query->fetch();
        if($row > 0) {
            $_SESSION['user'] = $user_login;
            header("location: ../index.php");
        }
    else {
        echo "User can't login";
    }
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main class="login-form">
        <form action="" method="post">
            <!-- Login & Password -->
            <input type="text" placeholder="Nom d'utilisateur" name="user_login" required>
            <input type="password" placeholder="Mot de passe" name="password" required>
            <input class="login" type="submit" name="login" value="Se connecter">
        </form>
    </main>
</body>
</html>