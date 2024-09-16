<?php
// Connexion à la base de données
include('etablissement.php');

// Récupération des données du formulaire
if (isset($_POST['ajouter'])) {
    $nomProduit = $_POST['nom_produit'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['Prix'];
    $description = $_POST['Description'];

    if ($_FILES['image_produit']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['image_produit']['tmp_name'];
        $targetPath = '../site/bebe/'; // Spécifiez le chemin où vous souhaitez stocker vos images
        $targetFile = $targetPath . basename($_FILES['image_produit']['name']);
        
        // Déplacez le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($tempFile, $targetFile)) {
            // L'URL de l'image sera le chemin relatif ou absolu de l'image sur votre serveur
            $imageProduit = '../site/bebe/' . basename($_FILES['image_produit']['name']);
            
            // Requête d'insertion des données dans la table "produit"
            $sql2 = "INSERT INTO produit (Nom_produit, image, Categorie, Prix, Description)
                     VALUES ('$nomProduit', '$imageProduit', '$categorie', '$prix', '$description')";
    
            if ($conn->query($sql2) === TRUE) {
                // Récupérer l'ID du produit inséré
                $idProduit = $conn->insert_id;          
                
                // Requête d'insertion des données dans la table "stock"
                $sql = "INSERT INTO stock (nom_produit, id_produit, image, categorie, quantite_totale)
                        VALUES ('$nomProduit', '$idProduit', '$imageProduit', '$categorie', '$quantite')";
    
                if ($conn->query($sql) === TRUE) {
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Le produit a été ajouté avec succès..",
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
                    echo "<script>alert('Erreur lors de l'ajout du produit : " . $conn->error . "')</script>";
                }
            } else {
                echo "<script>alert('Erreur lors de l'ajout du produit : " . $conn->error . "')</script>";
            }
        } else {
            echo "<script>alert('Une erreur s'est produite lors de l'envoi du fichier.')</script>";
        }
    } else {
        echo "<script>alert('Erreur lors du téléchargement du fichier.')</script>";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
