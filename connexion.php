<?php
session_start();

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

if (isset($_POST['login']) && isset($_POST['password'])) {
    if (!empty($_POST['user_login']) && !empty($_POST['password'])) {
        echo "User can login";
        $user_login = $_POST['user_login'];
        $password = $_POST['password'];
        $query = "SELECT login, password FROM user WHERE login = '$user_login' and password = '$password'";
        $result = $db->prepare($query);
        $result->execute();
        if ($result->rowCount() > 0) {
            $data = $result->fetchAll();
            if (password_verify($password, $data[0]["password"])) {
                echo "Connecté";
                $_SESSION['user_login'] = $user_login;
            }
        }
        // if ($user_login === )
        // $_SESSION['user'] = 
    }
    else {
        echo "User can't login...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <header>
        <nav>
            <ol>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
            </ol>
        </nav>
    </header>
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