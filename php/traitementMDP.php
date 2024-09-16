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

if (isset($_POST["valideruser"])) {
    $user = $_POST['user'];

    if ($user != "") {

        if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $user)) {
            echo "<script>alert('Nom d\'utilisateur invalide ! Le nom d\'utilisateur doit contenir entre 4 et 8 caractères alphanumériques avec au moins une lettre.'); window.location.href = '../se_connecter.php';</script>";
            exit;
        }

        $query1 = "SELECT c.user_name FROM compte co INNER JOIN clients c ON c.id_client = co.id_client WHERE co.user_name = '$user'"; 
        $result1 = $bdd->query($query1);
        $row1 = $result1->fetch();

        $query2 = "SELECT user_name FROM administrateur WHERE user_name = '$user'"; 
        $result2 = $bdd->query($query2);
        $row2 = $result2->fetch();

        if ($row1) {
            $user_name = $row1['user_name'];
            $_SESSION['user_name'] = $user_name;
            header('Location: ../changerMDP.html');
            exit;
            }
        elseif($row2) {
            $user_name1 = $row2['user_name'];
            header('Location: ../changerMDP.html');
            exit;
            }

    
        else{
            echo "<script>alert('identifiant non valide !'); window.location.href = 'se_connecter.php';</script>";

            }
        }
        else {
            echo "<script>alert('Veuillez saisir un nom d\'utilisateur !'); window.location.href = 'se_connecter.php';</script>";
            exit;
        }
    
    }
?>