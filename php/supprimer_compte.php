<?php
session_start();
include 'Database.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "pfe";

// TRAITEMENT
$databaseObj = new Database($servername, $username, $password, $database);
$bdd = $databaseObj->connect();
$id_client = $_SESSION['id_client'];


if (isset($_POST['confirmation'])) {
    // Supprimer l'enregistrement de la table compte
    $sql = "DELETE FROM compte WHERE id_client = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$id_client]);

    // Supprimer les commandes du client
    $sql_commandes = "DELETE FROM commande WHERE id_client = ?";
    $stmt_commandes = $bdd->prepare($sql_commandes);
    $stmt_commandes->execute([$id_client]);

    // Supprimer les messages du client
    $sql_messages = "DELETE FROM message WHERE id_client = ?";
    $stmt_messages = $bdd->prepare($sql_messages);
    $stmt_messages->execute([$id_client]);

    // Supprimer les factures du client
    $sql_factures = "DELETE FROM facture WHERE id_client = ?";
    $stmt_factures = $bdd->prepare($sql_factures);
    $stmt_factures->execute([$id_client]);

    $sql_clients = "DELETE FROM clients WHERE id_client = ?";
    $stmt_clients = $bdd->prepare($sql_clients);
    $stmt_clients->execute([$id_client]);

    if ($stmt->rowCount() > 0 && $stmt_clients->rowCount() > 0) {
        // Suppression réussie
        header('Location: acceuil.php');
        $_SESSION['is_logged_in'] = false;
        echo "<script> alert('Suppression réussie.'); </script>";
        exit;
    } else {
        echo "Erreur lors de la suppression.";
    }
}

?>