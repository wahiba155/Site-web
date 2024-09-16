<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits Corps</title>
    <link rel="stylesheet" href="../css/page1.css">
    <link href="../css/acceuil.css" rel="stylesheet">
    <link href="../css/corps.css" rel="stylesheet">
    
    <link href="../bebe/css/spray.css"> 
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">


</head>
<body>
   
    <div class="baby" >
        <ul class="liste">
            <li><a href="#">Hygiène corporelle</a></li>
            <li><a href="#">Main & ongles</a></li>
            <li><a href="#">Hydratation corporelle</a></li>
        </ul>
        <h6>Produits CORPS</h6>
    <p style="font-size: large;font-family: Arial, Helvetica, sans-serif;text-align: justify; font-weight: bold;">
        Cherchez-vous à nourrir et revitaliser votre peau pour une sensation de fraîcheur et de vitalité ? 
        Ne cherchez pas plus loin ! Notre gamme complète de produits de soin pour le corps est spécialement conçue pour vous offrir 
        une expérience de bien-être ultime, de la tête aux pieds.
    </p>
</div>

<?php include 'carte.php';?>
            <?php include 'coeur.php';?>
            <script src="../js/corps.js"></script>
            <script src="../js/script.js"></script>
        
      <nav class="pagination pagination-container">
        <ul>
            <li><a href="produit_corps.php" style="background-color: gray;">1</a></li>
            <li><a href="produit_corps2.php">2</a></li>
            <li><a href="produit_corps3.php">3</a></li>
            <li><a href="produit_corps2.php" class="link-arrow" title="Voir plus">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                  </svg> <!-- Icône de flèche vers la droite -->
                </a>
            </li>
            <!-- Ajoutez d'autres liens en fonction du nombre de pages -->
        </ul>
    </nav>
    </div>
    <?php include 'footer.php';?>

    </body>
    </html>