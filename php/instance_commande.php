<?php
// Inclure le fichier contenant la classe Commande
include('Classe_commande.php');
// Se connecter à la base de données
include('etablissement.php');


// Effectuer la requête pour récupérer les données de commande
$sqlc = "SELECT id_comande, image, titre, prix, quantite, date_commande, categorie, id_client FROM commande ";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {
    // Récupérer les données 
    $rowc = $resultc->fetch_assoc();
    $idCommande = $rowc['id_comande'];
    $image = $rowc['image'];
    $titre = $rowc['titre'];
    $prix = $rowc['prix'];
    $quantite = $rowc['quantite'];
    $dateCommande = $rowc['date_commande'];
    $categorie = $rowc['categorie'];
    $idClient = $rowc['id_client'];

    // Créer une instance de la classe Commande avec les données récupérées
    $commande = new Commande($idCommande, $image, $titre, $prix, $quantite, $dateCommande, $categorie, $idClient);
}

// Fermer la connexion à la base de données
$conn->close();
?>