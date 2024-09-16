<?php
// Se connecter à la base de données


session_start();

include 'etablissement.php';




$idClient = $_SESSION['id_client'];
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nomUtilisateur = $_POST["nom"];
    $email = $_POST["email"];
    $motDePasse = $_POST["psswd"];
    $tele = $_POST["tele"];
    $dateNaissance = $_POST["date_naissance"];
    $adresse = $_POST["adresse"];
        $image = $_FILES["foto"]["tmp_name"];
        if (!empty($nomUtilisateur) && !empty($email) && !empty($motDePasse) && !empty($tele) && !empty($dateNaissance) && !empty($adresse)) {
              
            if (!preg_match('/(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{5,}/', $motDePasse)) {
                echo "<script>alert('Mot de passe invalide ! Le mot de passe doit contenir au moins 5 caractères avec au moins un chiffre, une lettre et un caractère spécial.'); window.location.href = 'changer_profile.php';</script>";
                exit;
            }
            if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $nomUtilisateur)) {
                echo "<script>alert('Nom d\'utilisateur invalide ! Le nom d\'utilisateur doit contenir entre 4 et 20 caractères alphanumériques.'); window.location.href = 'changer_profile.php';</script>";
                exit;
            }

            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Adresse e-mail invalide ! Veuillez entrer une adresse e-mail valide.'); window.location.href = 'changer_profile.php';</script>";
                exit;
            }

            // Vérification du numéro de téléphone
            if (!preg_match('/^\d{10,14}$/', $tele)) {
                echo "<script>alert('Numéro de téléphone invalide ! Le numéro de téléphone doit contenir entre 10 et 14 chiffres.'); window.location.href = 'changer_profile.php';</script>";
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
            $tele = mysqli_real_escape_string($conn, $tele);
            $dateNaissance = mysqli_real_escape_string($conn, $dateNaissance);
            $adresse = mysqli_real_escape_string($conn, $adresse);
            // Préparer la requête SQL avec une instruction préparée
            $sql = "UPDATE clients SET user_name = ?, email = ?, mot_passe = ?,Tele = ?, Date_naissance = ?, Adresse = ? , image = ? WHERE id_client = $idClient";
            $stmt = $conn->prepare($sql);
            $sql1 = "UPDATE compte SET user_name = ?, password = ? WHERE id_client = $idClient";
            $stmt1 = $conn->prepare($sql1);

            // Lier les valeurs aux paramètres de la requête
            $stmt->bind_param("sssssss", $nomUtilisateur, $email, $motDePasse, $tele, $dateNaissance, $adresse, $imageURL);
            $stmt1->bind_param("ss", $nomUtilisateur, $motDePasse);
            // Exécuter la requête préparée
            if ($stmt->execute() && $stmt1->execute()) {
               
                echo "<script>alert('Modification réussie !');</script>";
                echo "<script>setTimeout(function() { window.location.href = 'Profileclient.php'; }, 1000);</script>";
                exit;
            } else {
                echo "Erreur lors de la mise à jour : " . $stmt->error;
            }

            // Fermer les instructions préparées
            $stmt->close();
            $stmt1->close();
        } else {
            echo "Erreur lors du déplacement de l'image vers le répertoire de destination.";
        }
    } else {
        // Définir le répertoire de destination
       

            // Échapper les caractères spéciaux dans les valeurs récupérées
            $nomUtilisateur = mysqli_real_escape_string($conn, $nomUtilisateur);
            $email = mysqli_real_escape_string($conn, $email);
            $motDePasse = mysqli_real_escape_string($conn, $motDePasse);
            $tele = mysqli_real_escape_string($conn, $tele);
            $dateNaissance = mysqli_real_escape_string($conn, $dateNaissance);
            $adresse = mysqli_real_escape_string($conn, $adresse);
            // Préparer la requête SQL avec une instruction préparée
            $sql = "UPDATE clients SET user_name = ?, email = ?, mot_passe = ?,Tele = ?, Date_naissance = ?, Adresse = ?  WHERE id_client = $idClient";
            $stmt = $conn->prepare($sql);
            $sql1 = "UPDATE compte SET user_name = ?, password = ? WHERE id_client = $idClient";
            $stmt1 = $conn->prepare($sql1);

            // Lier les valeurs aux paramètres de la requête
            $stmt->bind_param("ssssss", $nomUtilisateur, $email, $motDePasse, $tele, $dateNaissance, $adresse);
            $stmt1->bind_param("ss", $nomUtilisateur, $motDePasse);
            // Exécuter la requête préparée
            if ($stmt->execute() && $stmt1->execute()) {
               
                echo "<script>alert('Modification réussie !');</script>";
                echo "<script>setTimeout(function() { window.location.href = 'Profileclient.php'; }, 1000);</script>";
                exit;
            } else {
                echo "Erreur lors de la mise à jour : " . $stmt->error;
            }

            // Fermer les instructions préparées
            $stmt->close();
            $stmt1->close();
        
        
    }
} else {
    // Afficher une alerte indiquant de remplir tous les champs
    echo "<script>alert('Veuillez remplir tous les champs.'); window.location.href = 'changer_profile.php';</script>";
    exit;
}
}

// Fermer la connexion à la base de données
$conn->close();
?>