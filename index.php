<?php
session_start();

error_reporting(0);

if ($_SESSION['user'] !== "") {
    $name = $_SESSION['user']; 
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <?php if ($_SESSION['user'] == true) {echo '<a href="php/logout.php" class="logout">Se déconnecter</a><br>';} else {echo "";}?>
        <nav>
            <ol>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="php/inscription.php">Inscription</a></li>
                <li><a href="php/connexion.php">Connexion</a></li>
                <li><a href="php/profil.php">Profil</a></li>
                <?php if ($_SESSION['user'] == true && $_SESSION['user'] == 'admin') {echo '<li><a href="admin.php">Admin</a></li>';}?>
            </ol>
        </nav>
        <h2><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
    </header>
    <h1>Bienvenue <?php if ($_SESSION['user'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1>
</body>
</html>