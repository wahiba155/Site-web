<?php
session_start();

// Déconnexion
$_SESSION['is_logged_in'] = false;

// Redirection vers la page d'accueil
header("Location: acceuil.php");
exit();
?>