<?php
session_start();

if ($_SESSION['user'] !== "") {
    $name = $_SESSION['user']; 
}

// $db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Accueil</title>
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
    <h1>Bienvenue <?php echo $name; ?> !</h1>
</body>
</html>