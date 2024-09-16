<?php
session_start();
include 'Database.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "pfe";

$databaseObj = new Database($servername, $username, $password, $database);
$bdd = $databaseObj->connect();

$id_client = $_SESSION['id_client'];

if (isset($_POST["ok"])) {
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=pfe", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $sujet = $_POST['subject'];
        $mssg = $_POST['text'];

        if ($prenom != "" && $email != "" && $mssg != "" && $mssg!= 'Saisissez ici...') {
            if ($sujet == 1) {
                $sujet = 'Demande d\'information';
            } elseif ($sujet == 2) {
                $sujet = 'Support technique';
            } elseif ($sujet == 3) {
                $sujet = 'Retours ou suggestions';
            } elseif ($sujet == 4) {
                $sujet = 'Problème de facturation';
            }
            if (!preg_match('/^[a-zA-Z_ ]{1,20}$/', $prenom)) {
                echo "<script>alert('Nom complet invalide ! Le nom complet ne doit pas dépasser 20 caractères et ne peut contenir que des lettres, des espaces et le caractère \"_\".'); window.location.href = 'contacte.php';</script>";
                exit;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Adresse e-mail invalide ! Veuillez entrer une adresse e-mail valide.'); window.location.href = 'contacte.php';</script>";
                exit;
            }
            $requeteVerifEmail = $bdd->prepare("SELECT COUNT(*) FROM clients WHERE email = :email");
$requeteVerifEmail->bindParam(':email', $email);
$requeteVerifEmail->execute();
$emailExiste = $requeteVerifEmail->fetchColumn();



if (!$emailExiste) {
    echo "<script>alert('Cet email n\\'existe pas. Veuillez utiliser votre email valide');window.location.href = 'contacte.php';</script>";
    exit;
}

            // Vérifier si l'email existe déjà dans la base de données
            
                // Insérer les données dans la base de données
                $requete = $bdd->prepare("INSERT INTO message VALUES (DEFAULT,:id_client ,:prenom, :email, :sujet, :mssg)");
                $requete->bindParam(':id_client', $id_client);
                $requete->bindParam(':prenom', $prenom);
                $requete->bindParam(':email', $email);
                $requete->bindParam(':sujet', $sujet);
                $requete->bindParam(':mssg', $mssg);
                $requete->execute();

                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
                echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Message envoyé !",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    target: document.body // Spécifie l\'élément cible où afficher la SweetAlert
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "acceuil.php"; // Redirection vers acceuil.php après confirmation
                    }
                });
            });
        </script>' ;            
        } else {
            echo "<script>alert('Veuillez remplir tous les champs !'); window.location.href = 'contacte.php';</script>";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>