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

$sql2 = "SELECT * FROM stock";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM commande";
$result3 = $conn->query($sql3);

$sql4 = "SELECT p.nom_produit, p.categorie, p.image, s.quantite_totale, p.Prix
FROM produit p
JOIN stock s ON s.nom_produit = p.Nom_produit";
$result4 = $conn->query($sql4);

$sql5 = "SELECT * FROM produit";
$result5 = $conn->query($sql5);
?>