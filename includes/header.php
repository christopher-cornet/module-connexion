<header>
    <?php if ($_SESSION['user'] == true) {echo '<a href="logout.php" class="logout">Se déconnecter</a><br>';} else {echo "";}?>
    <nav>
        <ol>
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="signup.php">Inscription</a></li>
            <li><a href="login.php">Connexion</a></li>
            <li><a href="profile.php">Profil</a></li>
            <?php 
            if ($_SESSION['user'] == true && $_SESSION['user'] == 'admin') {
                echo '<li><a href="admin.php">Admin</a></li>';
            }
            else {
                echo "";
            }
            ?>
        </ol>
    </nav>
    <h2><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
</header>