<?php
// Vérifier si l'identifiant du client est présent dans la requête GET
session_start();

if (isset($_GET['client_id'])) {
    $clientId = $_GET['client_id'];

    include('etablissement.php');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " . $conn->connect_error);
    }

    // Démarrer une transaction pour effectuer les suppressions de manière atomique
    $conn->begin_transaction();

    try {
        // Supprimer les messages du client
        $sql1 = "DELETE FROM message WHERE id_client = $clientId";
        $conn->query($sql1);

        // Supprimer les commandes du client
        $sql2 = "DELETE FROM commande WHERE id_client = $clientId";
        $conn->query($sql2);

        // Supprimer le compte du client
        $sql3 = "DELETE FROM compte WHERE id_client = $clientId";
        $conn->query($sql3);

        // Supprimer le client lui-même
        $sql4 = "DELETE FROM clients WHERE id_client = $clientId";
        $conn->query($sql4);

        $sql5 = "DELETE FROM facture WHERE id_client = $clientId";
        $conn->query($sql5);

        // Valider la transaction si toutes les requêtes ont été exécutées avec succès
        $conn->commit();

        // Définir la session pour indiquer que l'utilisateur n'est plus connecté
        $_SESSION['is_logged_in'] = false;

        // Renvoyer un JSON avec un message de succès
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction et renvoyer un JSON avec un message d'échec
        $conn->rollback();
        echo json_encode(['success' => false]);
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // Si l'identifiant du client n'est pas spécifié, rediriger vers une page d'erreur ou de gestion des erreurs
    header("Location: home.php");
    exit();
}
?>
