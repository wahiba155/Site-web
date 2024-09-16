<?php
session_start();
include 'Database.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "pfe";
        // TRAITEMENT
$databaseObj = new Database($servername, $username, $password, $database);
$bdd = $databaseObj->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    

    if ($user != "" && $pass != "") {
        if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $user)) {
            echo "<script>alert('Nom d\'utilisateur invalide ! Le nom d\'utilisateur doit contenir entre 4 et 20 caractères alphanumériques.'); window.location.href = 'se_connecter.php';</script>";
            exit;
        }
        if (!preg_match('/(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{5,}/', $pass)) {
            echo "<script>alert('Mot de passe invalide ! Le mot de passe doit contenir au moins 5 caractères avec au moins un chiffre, une lettre et un caractère spécial.'); window.location.href = 'se_connecter.php';</script>";
            exit;
        }
        
        $_SESSION['is_logged_in'] = false;

        $query1 = "SELECT c.nom_complet,c.id_client,c.user_name,c.Tele,c.Date_naissance,c.Adresse,c.email FROM compte co INNER JOIN clients c ON c.id_client = co.id_client WHERE co.user_name = '$user' AND co.password = '$pass'";
        $result1 = $bdd->query($query1);
        $row1 = $result1->fetch();

        $query2 = "SELECT nom, prenom FROM Administrateur WHERE user_name = '$user' AND password = '$pass'";
        $result2 = $bdd->query($query2);
        $row2 = $result2->fetch();
        if ($row1) {
            $nomComplet = $row1['nom_complet'];
            $id_client = $row1['id_client'];
            $user_name = $row1['user_name'];
            $Tele = $row1['Tele'];
            $Date_naissance = $row1['Date_naissance'];
            $Adresse = $row1['Adresse'];
            $email = $row1['email'];
            $_SESSION['id_client'] = $id_client;
            $_SESSION['nom_complet'] = $nomComplet;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['Tele'] = $Tele;
            $_SESSION['Date_naissance'] = $Date_naissance;
            $_SESSION['Adresse'] = $Adresse;
            $_SESSION['email'] = $email;
            $_SESSION['is_logged_in'] = true;

            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
            echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Bienvenue ' . $nomComplet . ' ! Vous pouvez maintenant passer vos commandes et envoyer des messages",
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
       exit;
        } elseif ($row2) {
            $nom = $row2['nom'];
            $prenom = $row2['prenom'];
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            header('Location:acceuil1.php');
            exit;
        } else {
            $_SESSION['is_logged_in'] = false;

            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
            echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Nom d\'utilisateur ou mot de passe incorrect",
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
    </script>' ;          }
    }
}
?>
