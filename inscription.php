<?php
session_start();

$host = "localhost";  
$username = "root";  
$password = "";  
$database = "testing"; 

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

$query = "INSERT INTO utilisateurs ('login', 'prenom', 'nom', 'password') VALUES ('')";
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
    <section class="registration-form">
        <form action="" method="post">
            <!-- Password = 8 char / 1 Maj / 1 Min / 1 Number / 1 Spe char -->
            <input type="text" placeholder="Nom d'utilisateur" required>
            <input type="text" placeholder="Prenom" required>
            <input type="text" placeholder="Nom" required>
            <input type="password" placeholder="Mot de passe" required>
            <input type="password" placeholder="Confirmation Mot de passe" required>
            <input class="register" type="submit" value="S'inscrire">
        </form>
    </section>
</body>
</html>