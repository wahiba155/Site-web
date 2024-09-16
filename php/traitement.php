<?php
include 'Database.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "pfe";

$databaseObj = new Database($servername, $username, $password, $database);
$bdd = $databaseObj->connect();

if (isset($_POST["enregistrer"])) {
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=pfe", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $tele = $_POST['tele'];
        $pass = $_POST['pass'];
        $user = $_POST['user'];
        $naissance = $_POST['naissance'];
        $nomrue = $_POST['nomrue'];
        $ville = $_POST['ville'];
        $batiment = $_POST['batiment'];
        $region = $_POST['region'];
        $numrue = $_POST['numrue'];
        $codepstale = $_POST['codepostale'];
        $image = '../site/inconnu_user.png';

        // Vérification pour tous les champs
        if ($user != "" && $pass != "" && $nom != "" && $email != "" && $tele != "" && $naissance != "" && $nomrue != "" && $ville != "" && $region != "" && $numrue != "" && $codepstale != "") {
            // Vérification du nom complet
            if (!preg_match('/^[a-zA-Z0-9_ ]{1,20}$/', $nom)) {
                echo "<script>alert('Nom complet invalide ! Le nom complet ne doit pas dépasser 20 caractères et ne peut contenir que des lettres, des espaces et le caractère \"_\".'); window.location.href = 'connexion2.php';</script>";
                exit;
            }
            if (!preg_match('/(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{5,}/', $pass)) {
                echo "<script>alert('Mot de passe invalide ! Le mot de passe doit contenir au moins 5 caractères avec au moins un chiffre, une lettre et un caractère spécial.'); window.location.href = 'connexion2.php';</script>";
                exit;
            }
            if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $user)) {
                echo "<script>alert('Nom d\'utilisateur invalide ! Le nom d\'utilisateur doit contenir entre 4 et 20 caractères alphanumériques.'); window.location.href = 'connexion2.php';</script>";
                exit;
            }
            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Adresse e-mail invalide ! Veuillez entrer une adresse e-mail valide.'); window.location.href = 'connexion2.php';</script>";
                exit;
            }

            // Vérification du numéro de téléphone
            if (!preg_match('/^\d{10,14}$/', $tele)) {
                echo "<script>alert('Numéro de téléphone invalide ! Le numéro de téléphone doit contenir entre 10 et 14 chiffres.'); window.location.href = 'connexion2.php';</script>";
                exit;
            }
            if (!is_numeric($numrue)) {
                echo "<script>alert('Le numéro de rue doit être numérique !'); window.location.href = 'connexion2.php';</script>";
                exit;
            }

            // Vérification du code postal (doit être numérique)
            if (!is_numeric($codepstale)) {
                echo "<script>alert('Le code postal doit être numérique !'); window.location.href = 'connexion2.php';</script>";
                exit;
            }

            // Vérification de la ville (doit contenir uniquement des caractères alphabétiques)
            if (!preg_match('/^[a-zA-Z0-9_ ]{1,20}$/', $ville)) {
                echo "<script>alert('La ville ne peut contenir que des lettres !'); window.location.href = 'connexion2.php';</script>";
                exit;
            }

            // Vérification de la région (doit contenir uniquement des caractères alphabétiques)
            if (!preg_match('/^[a-zA-Z0-9_ ]{1,20}$/', $region)) {
                echo "<script>alert('La région ne peut contenir que des lettres !'); window.location.href = 'connexion2.php';</script>";
                exit;
            }

           
            
            // Vérification du nom de rue (peut contenir des chiffres et des lettres)
            if (!preg_match('/^[a-zA-Z0-9_ ]{1,20}$/', $nomrue)) {
                echo "<script>alert('Le nom de rue est invalide !'); window.location.href = 'connexion2.php';</script>";
                exit;
            }

            if ($batiment == null) {
                $adresse = $nomrue . ', ' . $numrue . ' , ' . $region . ', ' . $ville . ', ' . $codepstale;
            } else {
                $adresse = $nomrue . ', ' . $numrue . ', batiment ' . $batiment . ', ' . $region . ', ' . $ville . ', ' . $codepstale;
            }
            $requeteVerifEmail = $bdd->prepare("SELECT COUNT(*) FROM clients WHERE email = :email");
$requeteVerifEmail->bindParam(':email', $email);
$requeteVerifEmail->execute();
$emailExiste = $requeteVerifEmail->fetchColumn();

$requeteVerifUsername = $bdd->prepare("SELECT COUNT(*) FROM compte WHERE user_name = :user");
$requeteVerifUsername->bindParam(':user', $user);
$requeteVerifUsername->execute();
$usernameExiste = $requeteVerifUsername->fetchColumn();

if ($emailExiste) {
    echo "<div class='alert alert-success'>Cet email existe déjà. Veuillez utiliser un autre email.</div>";    exit;
} elseif ($usernameExiste) {
    echo "<script>alert('Ce nom d\'utilisateur existe déjà. Veuillez choisir un autre nom d\'utilisateur.'); window.location.href = 'se_connecter.php';</script>";
    exit;
}
else{

            // Préparation et exécution de la requête
            $requete = $bdd->prepare("INSERT INTO clients VALUES (DEFAULT,:icon ,:nom, :email, :user, :pass, :tele, :naissance, :adresse)");

            $requete->execute(array(
                "nom" => $nom,
                "email" => $email,
                "tele" => $tele,
                "pass" => $pass,
                "user" => $user,
                "naissance" => $naissance,
                "adresse" => $adresse,
                "icon" => $image,
            ));
           
            $id_client = $bdd->lastInsertId(); // Récupère l'id du client inséré précédemment
            $requete1 = $bdd->prepare("INSERT INTO compte VALUES (DEFAULT, :user, :pass,:id_client)");

            $requete1->execute(array(
                "pass" => $pass,
                "user" => $user,
                "id_client" => $id_client,
            ));

            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
            echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Votre compte a été créé avec succès !",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
                target: document.body // Spécifie l\'élément cible où afficher la SweetAlert
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "se_connecter.php"; // Redirection vers acceuil.php après confirmation
                }
            });
        });
    </script>' ;

            
        }} 
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>