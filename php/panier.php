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

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    $message = 'Veuillez vous connecter pour valider la commande !';
    echo json_encode(['message' => $message]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$Montant = 0;
foreach ($data as $produit) {
    $idProduit = $produit['id'];
    $image = $produit['image'];
    $title = $produit['title'];
    $price = $produit['price'];
    $quantity = $produit['quantity'];
    $prix =  $quantity * $price ;
    $categorie;
    $idclient = $_SESSION['id_client'];

    switch (true) {
        case ($idProduit >= 0 && $idProduit < 36 || $idProduit >= 168 && $idProduit < 172):
            $categorie = "produit_visage";
            break;
        case ($idProduit >= 36 && $idProduit < 72):
            $categorie = "produit_bebe";
            break;
        case ($idProduit >= 72 && $idProduit < 108):
            $categorie = "produit_solaire";
            break;
        case ($idProduit >= 108 && $idProduit < 132 || $idProduit >= 172 && $idProduit < 174):
            $categorie = "produit_cheveux";
            break;
        case ($idProduit >= 132 && $idProduit < 168 || $idProduit >= 174 && $idProduit < 176):
            $categorie = "produit_corps";
            break;
        default:
            $categorie = "not_found";
            break;
    }
    
    // Exécuter la requête SQL pour insérer les données dans la table
    $sql = "INSERT INTO commande VALUES (DEFAULT, '$image', '$title', $prix, $quantity, NOW(), '$categorie',$idclient)";
    if (!$bdd->query($sql)) {
        $errorInfo = $bdd->errorInfo();
        $response['error'] = 'Erreur lors de l\'enregistrement du produit : ' . $errorInfo[2];
        echo json_encode($response);
        exit;
    }
    // Mise à jour de la quantité disponible dans la table des produits
$sql_update = "UPDATE stock SET quantite_totale = quantite_totale - :quantity WHERE nom_produit = :title";
$stmt_update = $bdd->prepare($sql_update);
$stmt_update->bindParam(':quantity', $quantity, PDO::PARAM_INT);
$stmt_update->bindParam(':title', $title, PDO::PARAM_STR);

if (!$stmt_update->execute()) {
    $errorInfo = $stmt_update->errorInfo();
    $response['error'] = 'Erreur lors de la mise à jour de la quantité disponible : ' . $errorInfo[2];
    echo json_encode($response);
    exit;
}
    
}

    // Calcul du montant total
    $date_aujourdhui = date("Y-m-d");

    $stmt = $bdd->prepare("SELECT SUM(prix) AS total FROM commande WHERE id_client = :idclient AND DATE(date_commande) = :date_aujourdhui");
    $stmt->bindParam(':idclient', $idclient, PDO::PARAM_INT);
    $stmt->bindParam(':date_aujourdhui', $date_aujourdhui, PDO::PARAM_STR);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $Montant = $row['total'];
  
  // Insérer le montant total dans la table facture
  $stmt = $bdd->prepare("INSERT INTO facture VALUES (DEFAULT, ?, ?)");
  if (!$stmt->execute([$idclient, $Montant])) {
      $errorInfo = $stmt->errorInfo();
      $response['error'] = 'Erreur lors de l\'enregistrement de la facture : ' . $errorInfo[2];
      echo json_encode($response);
      exit;
  }

$message = 'Votre commande a été effectuée avec succès !';
echo json_encode(['message' => $message]);
exit;
?>