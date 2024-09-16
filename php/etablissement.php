<?php
// Connexion à la base de données (exemple avec MySQL)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfe";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer les informations des employés
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

?>