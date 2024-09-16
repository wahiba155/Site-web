<?php
session_start();

include 'Database.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "pfe";

$databaseObj = new Database($servername, $username, $password, $database);
$bdd = $databaseObj->connect();

$user_name = $_SESSION['user_name'];

if (isset($_POST["ok"])) {
    $mot_passe1 = $_POST['MDP'];
    $mot_passe2 = $_POST['MDPC'];



    if ($mot_passe1 != "" && $mot_passe2 != "" && $mot_passe1 == $mot_passe2) {

        if (!preg_match('/(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{5,}/', $mot_passe1)) {
            echo "<script>alert('Mot de passe invalide ! Le mot de passe doit contenir au moins 5 caractères avec au moins un chiffre, une lettre et un caractère spécial.'); window.location.href = 'se_connecter.php';</script>";
            exit;
        }
        $queryClient = "UPDATE clients SET mot_passe = '$mot_passe1' WHERE user_name = '$user_name'";
        $queryCompte = "UPDATE compte SET password = '$mot_passe1' WHERE user_name = '$user_name'";

        $resultClient = $bdd->exec($queryClient);
        $resultCompte = $bdd->exec($queryCompte);


        $queryadmin = "UPDATE administrateur SET password = '$mot_passe1' WHERE id_admin = 1";

        $resultadmin = $bdd->exec($queryadmin);

        if ($resultClient !== false && $resultCompte !== false) {
            echo "<script>alert('Modification réussie !');</script>";
            echo "<script>setTimeout(function() { window.location.href = 'se_connecter.php'; }, 1000);</script>";
            exit;}
        elseif($resultadmin !== false){
            echo "<script>alert('Modification réussie !');</script>";
            echo "<script>setTimeout(function() { window.location.href = 'se_connecter.php'; }, 1000);</script>";
            exit;
        }
        else {
            echo "<script>alert('Erreur lors de la modification dans la base de données !');</script>";
        }
    } else {
        echo "<script>alert('Les mots de passe ne correspondent pas !');</script>";
        echo "<script>setTimeout(function() { window.location.href = '../changerMDP.html'; }, 1000);</script>";
        exit;
    }
}
?>