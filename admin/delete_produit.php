<?php
// Vérification si le nom du produit à supprimer est spécifié dans la requête POST
if (isset($_POST['nom_produit'])) {
    // Récupération du nom du produit à supprimer
    $nomProduit = $_POST['nom_produit'];
    
    // Connexion à la base de données
    include('etablissement.php');
    
    // Requête de suppression du produit dans la table "stock"
    $sql = "DELETE FROM stock WHERE nom_produit = '$nomProduit'";
    $sql2 = "DELETE FROM produit WHERE nom_produit = '$nomProduit'";
    
    if (($conn->query($sql) === TRUE)&&($conn->query($sql2) === TRUE)) {
        // Suppression réussie, rediriger vers la page de stock par exemple
        header("Location: stock.php");
        exit();
    } else {
        // Erreur lors de la suppression
        echo "Erreur lors de la suppression du produit : " . $conn->error;
    }
    
    // Fermeture de la connexion à la base de données
    $conn->close();
} else {
    // Si le nom du produit n'est pas spécifié, rediriger vers une page d'erreur ou de gestion des erreurs
    header("Location: stock.php");
    exit();
}
?>