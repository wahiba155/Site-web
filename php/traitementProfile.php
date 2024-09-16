<?php
include 'Classe_commande.php';
$databaseObj = new Database($servername, $username, $password, $database);
$bdd = $databaseObj->connect();

$id_client = $_SESSION['id_client'];
// Requête SQL pour récupérer les commandes du client
$sqlc1 = "SELECT * FROM commande WHERE id_client = $id_client";

$resultc1 = $bdd->prepare($sqlc1);
$resultc1->execute(); // Execute the prepared statement

$count = 1; // Start count from 1 instead of 0

if ($resultc1->rowCount() > 0) {
    // Récupérer les données
    echo "
    <table class='table bg-white rounded shadow-sm table-hover' border='1' style='display: none;'>
    <thead>
        <tr>
            <th scope='col' width='70'>#</th>
            <th scope='col'>Nom produit</th>
            <th scope='col'>Prix</th>
            <th scope='col'>Quantité</th>
            <th scope='col'>Date de commande</th>
            <th scope='col'>Catégorie du produit</th>
        </tr>
    </thead>
    <tbody>
    ";

    while ($rowc1 = $resultc1->fetch(PDO::FETCH_ASSOC)) {
        $idCommande1 = $rowc1['id_comande']; // Use correct column name 'id_commande'
        $titre1 = $rowc1['titre'];
        $prix1 = $rowc1['prix'];
        $quantite1 = $rowc1['quantite'];
        $dateCommande1 = $rowc1['date_commande'];
        $categorie1 = $rowc1['categorie'];
        $idclient1 = $rowc1['id_client'];
        $image = $rowc1['image']; // Use $rowc1 instead of $row1

        // Créer une instance de la classe Commande avec les données récupérées
        $commande1 = new Commande($idCommande1, $image, $titre1, $prix1, $quantite1, $dateCommande1, $categorie1, $idclient1);

        // Affichage des commandes dans un tableau HTML
        echo "
        <tr>
            <th scope='row'>" . $count++ . "</th>
            <td class='bloc'>" . $commande1->getTitre() . "</td>
            <td class='bloc'>" . $commande1->getPrix() . "</td>
            <td class='bloc'>" . $commande1->getQuantite() . "</td>
            <td class='bloc'>" . $commande1->getDateCommande() . "</td>
            <td class='bloc'>" . $commande1->getCategorie() . "</td>
        </tr>
        ";
    }

    echo "
    </tbody>
    </table>
    ";
} else {
    echo "Aucune commande trouvée ";
}
?>