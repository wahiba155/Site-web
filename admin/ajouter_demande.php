<?php
// Connexion à la base de données
include('etablissement.php');

// Récupération des données du formulaire
if (isset($_POST['ajouter'])) {
    // Récupérer les valeurs du formulaire
    $nomClient = $_POST['nom_client'];
    $nomProduit = $_POST['nom_produit'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];
    $date = $_POST['date'];

    // Récupérer l'ID du client
    $requete1 = "SELECT id_client FROM clients WHERE nom_complet LIKE '%$nomClient%'";
    $resultat1 = $conn->query($requete1);

    if ($resultat1->num_rows > 0) {
        $row = $resultat1->fetch_assoc();
        $idClient = $row['id_client'];

        // Récupérer l'image et le prix du produit
        $requete2 = "SELECT image, Prix FROM produit WHERE Nom_produit LIKE '%$nomProduit%'";
        $resultat2 = $conn->query($requete2);

        if ($resultat2->num_rows > 0) {
            $row = $resultat2->fetch_assoc();
            $imageProduit = $row['image'];
            $prixProduit = $row['Prix'];
            
            // Insérer la commande dans la table "commande"
            $requete3 = "INSERT INTO commande VALUES (DEFAULT, '$imageProduit', '$nomProduit', $prixProduit, $quantite, '$date', '$categorie', $idClient)";
            $resultat3 = $conn->query($requete3);

            if ($resultat3) {

                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
    echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        title: "La commande a été ajoutée avec succès.",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "OK",
        target: document.body // Spécifie l\'élément cible où afficher la SweetAlert
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "demande.php"; // Redirection vers acceuil.php après confirmation
        }
    });
});
</script>' ;
            } else {
                echo "Erreur lors de l'ajout de la commande : " . $conn->error;
            }
        } else {
            echo "Produit non trouvé.";
        }
    } else {
        echo "Client non trouvé.";
    }
}