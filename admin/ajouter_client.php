<?php
/// Connexion à la base de données
include('etablissement.php');

// Récupération des données du formulaire
if (isset($_POST['ajouter'])){

    $nomComplet = $_POST['nom_complet'];
    $email = $_POST['email'];
    $nomUtilisateur = $_POST['nom_user'];
    $motDePasse = $_POST['psswrd'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $image ='inconnu_user';
    $dateNaissance='0000-00-00';

    // Requête d'insertion des données dans la table "clients"
    $sql = "INSERT INTO clients
            VALUES (DEFAULT,'$image', '$nomComplet', '$email', '$nomUtilisateur', '$motDePasse', '$telephone','$dateNaissance','$adresse')";

    if ($conn->query($sql) === TRUE) {
        $id_client = $conn->insert_id; // Récupère l'id du client inséré précédemment

        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Le client et le compte ont été ajoutés avec succès.",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    target: document.body // Spécifie l\'élément cible où afficher la SweetAlert
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "home.php"; // Redirection vers acceuil.php après confirmation
                    }
                });
            });
        </script>';

    } else {
        echo "<script>alert('Erreur lors de l'ajout du client : " . $conn->error . "')</script>";
    }

    // Requête d'insertion des données dans la table "compte"
    $sqlCompte = "INSERT INTO compte (user_name, password, id_client)
                  VALUES ('$nomUtilisateur', '$motDePasse', '$id_client')";

    if ($conn->query($sqlCompte) === TRUE) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Le client et le compte ont été ajoutés avec succès.",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    target: document.body // Spécifie l\'élément cible où afficher la SweetAlert
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "home.php"; // Redirection vers acceuil.php après confirmation
                    }
                });
            });
        </script>';

    } else {
        echo "<script>alert('Erreur lors de l'ajout du compte : " . $conn->error . "')</script>";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>