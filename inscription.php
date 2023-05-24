<?php
session_start();

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

if (isset($_POST['register_name'])) {
    if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
        echo "User est inscrit.";
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $query = "INSERT INTO user (id, login, firstname, lastname, password) VALUES ('', '$username', '$firstname', '$name', '$password')";
        $db->query($query);
    }
    else {
        echo "Informations manquantes. Vous ne pouvez pas vous inscrire.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/inscription.css" type=text/css>
    <title>Inscription</title>
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
    <section class="registration-form">
        <form action="inscription.php" method="post">
            <!-- Password = 8 char / 1 Maj / 1 Min / 1 Number / 1 Spe char -->
            <input type="text" placeholder="Nom d'utilisateur*" name="username" required>
            <input type="text" placeholder="Prenom*" name="firstname" required>
            <input type="text" placeholder="Nom*" name="name" required>
            <input type="password" placeholder="Mot de passe*" name="password" required>
            <input type="password" placeholder="Confirmation mot de passe*" name="confirmpassword" required>
            <input class="register" type="submit" name="register_name" value="S'inscrire">
        </form>
    </section>
</body>
</html>