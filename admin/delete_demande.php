
<?php
// Vérifier si l'identifiant du client est présent dans la requête GET
if (isset($_GET['commande_id'])) {
    $commandeId = $_GET['commande_id'];

    include('etablissement.php');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " . $conn->connect_error);
    }

    // Requête de suppression du client
    $sql = "DELETE FROM commande WHERE id_comande = $commandeId";

    if (($conn->query($sql) === TRUE)) {
        // Si la suppression réussit, renvoyer un JSON avec un message de succès
        echo json_encode(['success' => 'true']);
    } else {
        echo json_encode(['success' => 'false']);
    }
    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // Si le nom du produit n'est pas spécifié, rediriger vers une page d'erreur ou de gestion des erreurs
    header("Location: demande.php");
    exit();
}
?>
