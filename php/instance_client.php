<?php
session_start();
include 'Classe_client.php';
include 'Database.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "pfe";

// TRAITEMENT
$databaseObj = new Database($servername, $username, $password, $database);
$bdd = $databaseObj->connect();

$idClient = $_SESSION['id_client'];

// Effectuer la requête pour récupérer les données de commande
$sqlcl = "SELECT image,email,user_name,mot_passe,Date_naissance, Adresse,Tele, nom_complet FROM clients WHERE id_client = :idClient";
$stmt = $bdd->prepare($sqlcl);
$stmt->bindParam(':idClient', $idClient);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Récupérer les données 
    $rowcl = $stmt->fetch(PDO::FETCH_ASSOC);
    $image =$rowcl['image'];
    $adresse = $rowcl['Adresse'];
    $tele = $rowcl['Tele'];
    $email = $rowcl['email'];
    $user = $rowcl['user_name'];
    $mdp = $rowcl['mot_passe'];
    $DateN = $rowcl['Date_naissance'];
    $nomC = $rowcl['nom_complet'];

    // Créer une instance de la classe Client avec les données récupérées
    $client = new Client($nomC,$tele,$adresse, $user, $mdp,$DateN, $email,$image);
}

// Fermer la connexion à la base de données
$bdd = null;
?>