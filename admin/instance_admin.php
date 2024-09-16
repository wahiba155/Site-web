<?php
// Inclure le fichier contenant la classe Admin
include('class_admin.php');

// Se connecter à la base de données et effectuer la requête pour récupérer les données de l'administrateur
include('etablissement.php');

// Effectuer la requête pour récupérer les données de l'administrateur
$sqla = "SELECT id_admin, avatar, nom, prenom, email, user_name, password FROM administrateur WHERE id_admin = 1";
$resulta = $conn->query($sqla);

if ($resulta->num_rows > 0) {
    // Récupérer les données de l'administrateur
    $rowa = $resulta->fetch_assoc();
    $idAdmin = $rowa['id_admin'];
    $avatar = $rowa['avatar'];
    $nom = $rowa['nom'];
    $prenom = $rowa['prenom'];
    $email = $rowa['email'];
    $userName = $rowa['user_name'];
    $password = $rowa['password'];

    // Créer une instance de la classe Admin avec les données récupérées
    $admin = new Admin($idAdmin, $avatar, $nom, $prenom, $email, $userName, $password);
}
?>