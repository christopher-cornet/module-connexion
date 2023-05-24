<?php
session_start();

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
        echo "User peut s'inscrire";
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $query = "INSERT INTO utilisateurs (id, login, prenom, nom, password) VALUES ('', '$username', '$firstname', '$name', '$password')";
        $db->query($query);
    }
    else {
        echo "User ne peut pas s'inscrire...";
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
    <section class="login-form">
        <form action="" method="post">
            <!-- Login & Password -->
            <input type="text" placeholder="Nom d'utilisateur" name="username" required>
            <input type="password" placeholder="Mot de passe" name="password" required>
            <button class="login" name="connexion">Se connecter</button>
        </form>
    </section>
</body>
</html>