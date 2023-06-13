<?php
session_start();

error_reporting(0);

if ($_SESSION['user'] !== "") {
    $name = $_SESSION['user']; 
}

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

if (isset($_POST['register_name'])) {
    if (!empty($_POST['user_login']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
        $user_login = $_POST['user_login'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        // Preg_match return 1 (True) si le 1er paramètre a été trouvé dans la string (2e paramètre)
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $special_chars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase || !$number || !$special_chars || strlen($password) < 8) {
            echo 'Le mot de passe doit inclure au moins 1 lettre majuscule, 1 lettre minuscule, 1 nombre, 1 caractère spécial et doit faire au moins 8 caractères.';
        } else {
            $query = "INSERT INTO user (id, login, firstname, lastname, password) VALUES ('', '$user_login', '$firstname', '$lastname', '$password')";
            $db->query($query);
            header('Location: connexion.php');
        }
    }
    else {
        echo "Informations manquantes. Vous ne pouvez pas vous inscrire.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css" type=text/css>
    <title>Inscription</title>
</head>
<body>
    <header>
        <?php if ($_SESSION['user'] == true) {echo '<a href="logout.php" class="logout">Se déconnecter</a><br>';} else {echo "";}?>
        <nav>
            <ol>
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
                <?php if ($_SESSION['user'] == true && $_SESSION['user'] == 'admin') {echo '<li><a href="admin.php">Admin</a></li>';} else {echo "";}?>
            </ol>
        </nav>
        <h2><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
    </header>
    <main>
        <form action="inscription.php" method="post">
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