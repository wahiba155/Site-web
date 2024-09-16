<?php
// Inclure le fichier contenant la classe facture
include('class_facture.php');
// Se connecter à la base de données et effectuer la requête pour récupérer les données de facture
include('etablissement.php');
session_start();
// Vérifiez si l'ID du client est défini dans la session
if (isset($_SESSION['id_client'])) {
  $idclient = $_SESSION['id_client'];
  include('etablissement.php');
}
$sqlMontant = "SELECT num_facture, id_client, Montant_total FROM facture WHERE id_client = ? ORDER BY num_facture DESC LIMIT 1";
$stmtMontant = $conn->prepare($sqlMontant);
$stmtMontant->bind_param('i', $idclient);
$stmtMontant->execute();
$resultMontant = $stmtMontant->get_result();

if ($resultMontant->num_rows > 0) {
    // Récupérer les données 
    $rowf = $resultMontant->fetch_assoc();
    $numFacture = $rowf['num_facture'];
    $idClient = $rowf['id_client'];
    $montant = $rowf['Montant_total'];

    // Créer une instance de la classe Facture avec les données récupérées
    $facture = new Facture($numFacture, $idClient, $montant);
}
?>