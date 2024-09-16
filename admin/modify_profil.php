<?php
// Se connecter à la base de données
include 'etablissement.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nomUtilisateur = $_POST["nom"];
    $email = $_POST["email"];
    $motDePasse = $_POST["psswd"];
    // Récupérer l'image
    $image = $_FILES["foto"]["tmp_name"];

    if (!empty($nomUtilisateur) && !empty($email) && !empty($motDePasse)) {


        if (!preg_match('/(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{5,}/', $motDePasse)) {
            echo "<script>alert('Mot de passe invalide ! Le mot de passe doit contenir au moins 5 caractères avec au moins un chiffre, une lettre et un caractère spécial.'); window.location.href = 'profil_photo.php';</script>";
            exit;
        }
        if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $nomUtilisateur)) {
            echo "<script>alert('Nom d\'administrateur invalide ! Le nom d\'administrateur doit contenir entre 4 et 20 caractères alphanumériques.'); window.location.href = 'profil_photo.php';</script>";
            exit;
        }

        // Vérification de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Adresse e-mail invalide ! Veuillez entrer une adresse e-mail valide.'); window.location.href = 'profil_photo.php';</script>";
            exit;
        }

    // Vérifier si l'image a été téléchargée avec succès
    if (is_uploaded_file($image)) {
        // Définir le répertoire de destination
        $destination = '../site/' . $_FILES['foto']['name'];
        
        // Déplacer l'image téléchargée vers le répertoire de destination
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destination)) {
            // Récupérer l'URL de l'image
            $imageURL = '../site/' . $_FILES['foto']['name'];

            // Échapper les caractères spéciaux dans les valeurs récupérées
            $nomUtilisateur = mysqli_real_escape_string($conn, $nomUtilisateur);
            $email = mysqli_real_escape_string($conn, $email);
            $motDePasse = mysqli_real_escape_string($conn, $motDePasse);
            $imageURL = mysqli_real_escape_string($conn, $imageURL);

            // Préparer la requête SQL avec une instruction préparée
            $sql = "UPDATE administrateur SET user_name = ?, email = ?, password = ?, avatar = ? WHERE id_admin = 1";
            $stmt = $conn->prepare($sql);

            // Lier les valeurs aux paramètres de la requête
            $stmt->bind_param("ssss", $nomUtilisateur, $email, $motDePasse, $imageURL);

            // Exécuter la requête préparée
            if ($stmt->execute()) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "modification avec succès",
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
                echo "Erreur lors de la mise à jour : " . $stmt->error;
            }

            // Fermer l'instruction préparée
            $stmt->close();
        } else {
            echo "Erreur lors du déplacement de l'image vers le répertoire de destination.";
        }
    } else {
        $nomUtilisateur = mysqli_real_escape_string($conn, $nomUtilisateur);
        $email = mysqli_real_escape_string($conn, $email);
        $motDePasse = mysqli_real_escape_string($conn, $motDePasse);

        // Préparer la requête SQL avec une instruction préparée
        $sql = "UPDATE administrateur SET user_name = ?, email = ?, password = ?  WHERE id_admin = 1";
        $stmt = $conn->prepare($sql);

        // Lier les valeurs aux paramètres de la requête
        $stmt->bind_param("sss", $nomUtilisateur, $email, $motDePasse);

        // Exécuter la requête préparée
        if ($stmt->execute()) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "modification avec succès",
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
            echo "Erreur lors de la mise à jour : " . $stmt->error;
        }

        // Fermer l'instruction préparée
        $stmt->close();
    }
} else {
    // Afficher une alerte indiquant de remplir tous les champs
    echo "<script>alert('Veuillez remplir tous les champs.'); window.location.href = 'profil_photo.php';</script>";
    exit;
}
}



// Fermer la connexion à la base de données
$conn->close();
?>