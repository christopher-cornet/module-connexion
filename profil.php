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
    <link rel="stylesheet" href="css/profil.css">
    <title>Profil</title>
</head>
<body>
    <header>
        <nav>
            <ol>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
                <?php if ($_SESSION['user'] == true && $_SESSION['user'] == 'admin') {echo '<li><a href="admin.php">Admin</a></li>';}?>
            </ol>
        </nav>
        <h2><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
    </header>
    <main>
        <div class="account">
            <h1>Informations du compte</h1>
            <h3><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";}?></h3>
        </div>
        <form action="" method="post">
            <input type="text" placeholder="Modifier le nom d'utilisateur">
            <input type="text" placeholder="Modifier le prénom">
            <input type="text" placeholder="Modifier le nom">
            <input type="password" placeholder="Modifier le mot de passe">
            <input class="modify" type="submit" name="modify" value="Modifier">
        </form>
    </main>
</body>
</html>