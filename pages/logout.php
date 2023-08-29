<?php
session_start();

error_reporting(0);

unset($_SESSION['user']);

header('Location: connexion.php');
exit;
?>