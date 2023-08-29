<?php
session_start();

error_reporting(0);

if ($_SESSION['user'] !== "") {
    $name = $_SESSION['user']; 
}

$db = new PDO ('mysql:host=localhost; dbname=moduleconnexion', 'root', '');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Profil</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main>
        <div class="account">
            <h1>Informations du compte</h1>
            <h3><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";}?></h3>
        </div>
        <form action="" method="post">
            <?php
            $sql = "SELECT login, firstname, lastname, password FROM user";
            $statement = $db->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $result = $statement->fetchAll();
            if($result) {
                foreach($result as $row) {
                    $username = $row->login;
                    $firstname = $row->firstname;
                    $lastname = $row->lastname;
                    $password = $row->password;
                }
            }
            ?>
            <input type="text" placeholder="<?php if ($_SESSION['user'] == true) {echo $username;} else {echo "Nom d'utilisateur";}?>">
            <input type="text" placeholder="<?php if ($_SESSION['user'] == true) {echo $firstname;} else {echo "Prénom";}?>">
            <input type="text" placeholder="<?php if ($_SESSION['user'] == true) {echo $lastname;} else {echo "Nom";}?>">
            <input type="password" placeholder="<?php if ($_SESSION['user'] == true) {echo $password;} else {echo "Mot de passe";}?>">
            <input class="modify" type="submit" name="modify" value="Modifier">
        </form>
    </main>
</body>
</html>