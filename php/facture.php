
<?php
  
  include('instance_commande.php');
  include('instance_client.php');
  include('etablissement.php');
  include('class_facture.php');
  if (isset($_SESSION['id_client'])) {
    $idclient = $_SESSION['id_client'];
    include('etablissement.php');
  }

  $sqlMontant = "SELECT num_facture, id_client, Montant_total FROM facture WHERE id_client = ? ORDER BY num_facture DESC LIMIT 1";
  $stmtMontant = $conn->prepare($sqlMontant);
  $stmtMontant->bind_param('i', $idclient);
  $stmtMontant->execute();
  $resultMontant = $stmtMontant->get_result();
  
  if ($resultMontant->num_rows > 0) {
      // Récupérer les données 
      $rowf = $resultMontant->fetch_assoc();
      $numFacture = $rowf['num_facture'];
      $idClient = $rowf['id_client'];
      $montant = $rowf['Montant_total'];
  
      // Créer une instance de la classe Facture avec les données récupérées
      $facture = new Facture($numFacture, $idClient, $montant);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facture</title>
  <link rel="stylesheet" href="../css/facture.css" type="text/css" media="all" />
  <script src="../js/download_facture.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <style>
    .btn-download-pdf {
      display: inline-block;
      padding: 10px 20px;
      font-size: 12px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
  
    .btn-download-pdf:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div id="print-area" style="margin-top: 3cm;">
    <div class="py-4">
      <div class="px-14 py-6">
        <table class="w-full border-collapse border-spacing-0">
          <tbody>
            <tr>
              <td class="w-full align-top">
                <div>
                  <img src="../site/PharmacyLogo2.png" class="h-12" style="height: 2.5cm; width: 6cm " />
                </div>
              </td>

              <td class="align-top">
                <div class="text-sm">
                  <table class="border-collapse border-spacing-0">
                    <tbody>
                      <tr>
                        <td class="border-r pr-4">
                          <div>
                            <p class="whitespace-nowrap text-slate-400 text-right">Date</p>
                            <p class="whitespace-nowrap font-bold text-main text-right">
                            <?php
                              $date_actuelle = date("Y-m-d");
                              echo $date_actuelle;
                            ?>

                            </p>
                          </div>
                        </td>
                        <td class="pl-4">
                          <div>
                            <p class="whitespace-nowrap text-slate-400 text-right">Numéro facture</p>
                            <p class="whitespace-nowrap font-bold text-main text-right"><?php echo $facture->getNumFacture();?></p>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="bg-slate-100 px-14 py-6 text-sm" >
        <table class="w-full border-collapse border-spacing-0">
          <tbody>
            <tr>
              <td class="w-1/2 align-top">
                <div class="text-sm text-neutral-600">
                  <p class="font-bold">WEDYpara</p>
                  <p>Téléphone: +212 600990996</p>
                  <p>Email: wedypara@gmail.com</p>
                </div>
              </td>
              <td class="w-1/2 align-top text-right">
                <div class="text-sm text-neutral-600">
                  <?php
                    echo '<p class="font-bold">Client informations</p>';
                    echo '<p>Nom complet :  ' . $client->getNomComplet() . '</p>';
                    echo '<p>Adresse :  ' . $client->getAdresse() . '</p>';
                    echo '<p>Téléphone :  ' . $client->getTelephone() . '</p>';
                  ?>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="px-14 py-10 text-sm text-neutral-700">
      <?php
echo '
<table class="w-full border-collapse border-spacing-0">
  <thead>
    <tr>
      <td class="border-b-2 border-main pb-3 pl-3 font-bold text-main">#</td>
      <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Nom du produit</td>
      <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Catégorie</td>
      <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Quantité</td>
      
      <td class="border-b-2 border-main pb-3 pl-2  font-bold text-main">Prix</td>
    </tr>
  </thead>
  <tbody>
';
// Récupérer la date d'aujourd'hui
$date_aujourdhui = date("Y-m-d");

// Effectuer la requête pour récupérer les données de commande pour la date d'aujourd'hui
$sqlc = "SELECT id_comande, image, titre, prix, quantite, date_commande, categorie, id_client FROM commande WHERE id_client = ? AND DATE(date_commande) = ?";
$stmt = $conn->prepare($sqlc);
$stmt->bind_param('is', $idclient, $date_aujourdhui);
$stmt->execute();
$resultc = $stmt->get_result();

if ($resultc->num_rows > 0) {
    while ($rowc = $resultc->fetch_assoc()) {
      $idCommande = $rowc['id_comande'];
      $image = $rowc['image'];
      $titre = $rowc['titre'];
      $prix = $rowc['prix'];
      $quantite = $rowc['quantite'];
      $dateCommande = $rowc['date_commande'];
      $categorie = $rowc['categorie'];
      $idClient = $rowc['id_client'];

      // Créer une instance de la classe Commande avec les données récupérées
      $commande = new Commande($idCommande, $image, $titre, $prix, $quantite, $dateCommande, $categorie, $idClient);

      // Afficher les détails de la commande
      echo '<tr>
              <td class="border-b py-3 pl-3">' . $commande->getIdCommande() . '</td>
              <td class="border-b py-3 pl-2">' . $commande->getTitre() . '</td>
              <td class="border-b py-3 pl-2">' . $commande->getCategorie() . '</td>
              <td class="border-b py-3 pl-2">' . $commande->getQuantite() . '</td>
              <td class="border-b py-3 pl-2">' . $commande->getPrix() . '</td>
            </tr>';
  }
}

// Fermer la connexion à la base de données
$conn->close();
?>
            <tr>
              <td colspan="7">
                <table class="w-full border-collapse border-spacing-0">
                  <tbody>
                    <tr>
                      <td class="w-full"></td>
                      <td>
                        <table class="w-full border-collapse border-spacing-0">
                          <tbody>
                            <tr>
                              <td class="border-b p-3">
                                <div class="whitespace-nowrap text-slate-400">Total des produits:</div>
                              </td>
                              <td class="border-b p-3 text-right">
                                <div class="whitespace-nowrap font-bold text-main">
                                <?php
                                  echo $facture->getMontantTotal() . 'MAD';
                                  ?>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="p-3">
                                <div class="whitespace-nowrap text-slate-400">Prix livraison:</div>
                              </td>
                              <td class="p-3 text-right">
                                <div class="whitespace-nowrap font-bold text-main">
                                <?php
      $totalProduits = $facture->getMontantTotal();
      if ($totalProduits > 500) {
        echo '0 MAD';
      } else {
        echo '50 MAD';
      }
      ?>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="bg-main p-3">
                                <div class="whitespace-nowrap font-bold text-white">Total:</div>
                              </td>
                              <td class="bg-main p-3 text-right">
                                <div class="whitespace-nowrap font-bold text-white">
                                <?php
    $totalProduits = $facture->getMontantTotal();
    $prixLivraison = ($totalProduits > 500) ? 0 : 50;
    $totalAvecLivraison = $totalProduits + $prixLivraison;
    echo $totalAvecLivraison . ' MAD';
    ?>
                                </div>
                              </td>                             
                            </tr>
                            <tr><td colspan="2">
                              <button type="submit" class="btn-download-pdf" id="download">Télécharger la facture (PDF)</button>
                            </td></tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
        <footer class="fixed bottom-0 left-0 bg-slate-100 w-full text-neutral-600 text-center text-xs py-3">
          WEDYpara
          <span class="text-slate-300 px-2">|</span>
          wedypara@gmail.com
          <span class="text-slate-300 px-2">|</span>
          +212 600990996
        </footer>
      </div>
    </div>
</body>
</html>