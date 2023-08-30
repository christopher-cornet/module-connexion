<?php
session_start();

error_reporting(0);

if ($_SESSION['username'] !== "") {
    $name = $_SESSION['username']; 
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
        <?php if ($_SESSION['username'] == true) {echo '<a href="pages/logout.php" class="logout">Se déconnecter</a><br>';} else {echo "";}?>
        <nav>
            <ol>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="pages/signup.php">Inscription</a></li>
                <li><a href="pages/login.php">Connexion</a></li>
                <li><a href="pages/profile.php">Profil</a></li>
                <?php if ($_SESSION['username'] == true && $_SESSION['username'] == 'admin') {echo '<li><a href="pages/admin.php">Admin</a></li>';}?>
            </ol>
        </nav>
        <h2><?php if ($_SESSION['username'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
    </header>
    <h1>Bienvenue <?php if ($_SESSION['username'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1>
</body>
</html>