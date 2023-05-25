<?php
$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

if (isset($_POST['register_name'])) {
    if (!empty($_POST['user_login']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
        echo "User est inscrit.";
        $user_login = $_POST['user_login'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $query = "INSERT INTO user (id, login, firstname, lastname, password) VALUES ('', '$user_login', '$firstname', '$lastname', '$password')";
        $db->query($query);
        header('Location: connexion.php');
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
    <main>
        <form action="inscription.php" method="post">
            <!-- Password = 8 char / 1 Maj / 1 Min / 1 Number / 1 Spe char -->
            <input type="text" placeholder="Nom d'utilisateur*" name="user_login" required>
            <input type="text" placeholder="Prenom*" name="firstname" required>
            <input type="text" placeholder="Nom*" name="lastname" required>
            <input type="password" placeholder="Mot de passe*" name="password" required>
            <input type="password" placeholder="Confirmation mot de passe*" name="confirmpassword" required>
            <input class="register" type="submit" name="register_name" value="S'inscrire">
        </form>
    </main>
</body>
</html>