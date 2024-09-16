<?php
// Vérifier si l'identifiant du message est présent dans la requête GET
if (isset($_GET['message_id'])) {
    $messageId = $_GET['message_id'];

    // Inclure le fichier de connexion à la base de données
    include('etablissement.php');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " . $conn->connect_error);
    }

    // Requête de suppression du message
    $sql = "DELETE FROM message WHERE id_message = $messageId";

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
