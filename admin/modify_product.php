<?php
// Vérifier si le formulaire a été soumis
if(isset($_POST['modifier'])) {
    // Récupérer les valeurs du formulaire
    $nomProduit = $_POST['nom_produit'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['Prix'];
    $description = $_POST['Description'];
    $categorie = $_POST['categorie'];

    // Effectuer le traitement de mise à jour du produit dans la base de données

    // connexion à la base de données
    include('etablissement.php');

    // Préparer la requête de mise à jour
    $sql = "UPDATE produit SET Categorie='$categorie', Prix='$prix', Description='$description' WHERE Nom_produit='$nomProduit'";
    $sql2 = "UPDATE stock SET quantite_totale='$quantite' WHERE nom_produit='$nomProduit'";

    // Exécuter la requête de mise à jour
    if (($conn->query($sql) === TRUE) && ($conn->query($sql2) === TRUE)) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Le produit a été modifié avec succès.",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    target: document.body // Spécifie l\'élément cible où afficher la SweetAlert
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "stock.php"; // Redirection vers acceuil.php après confirmation
                    }
                });
            });
        </script>';
        
    } else {
        echo "Erreur lors de la modification du produit: " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>