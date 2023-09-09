<?php
session_start();

include "../classes/User.php";

error_reporting(0);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Connexion</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main class="login-form">
        <form action="" method="post">
            <!-- Login & Password -->
            <input type="text" placeholder="Nom d'utilisateur" name="username" required>
            <input type="password" placeholder="Mot de passe" name="password" required>
            <input class="login" type="submit" name="login" value="Se connecter">
            <?php
            // Log In
            if (isset($_POST['login'])) {
                $emptyForm = empty($_POST['username']) && empty($_POST['password']);

                // If the Form is not empty
                if (!$emptyForm) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $user = new User();
                    $user->login($username, $password);

                    header("location: ../index.php");

                }
                else {
                    echo 'Informations manquantes. Veuillez remplir le formulaire.';
                }
            }
            ?>
        </form>
    </main>
</body>
</html>
