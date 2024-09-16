<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/acceuil.css">
    <link rel="stylesheet" href="../css/page1.css">
    <link rel="stylesheet" href="../css/visage.css">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>produit_visage</title>
</head>
<body>   
    <div class="visage">
        <ul class="liste">
            <li><a href="produit_visage.php">Peau normale</a></li>
            <li><a href="produit_visage2.php">Peau sèche</a></li>
            <li><a href="produit_visage3.php">Peau grasse</a></li>
            <li><a href="produit_visage2.php">Peau mixte</a></li>
            <li><a href="produit_visage.php">Peau sensible</a></li>
            <li><a href="produit_visage3.php">Peau acnéique</a></li>
        
        </ul>
    <h6>Produits Visage</h6>
    <p style="font-size: large;font-family: Arial, Helvetica, sans-serif;text-align: center; font-weight: bold;">
        Découvrez une gamme complète de produits pour 
        répondre à tous les besoins de votre peau du visage.
         Des nettoyants doux pour éliminer les impuretés aux crèmes
          hydratantes nourrissantes, nous avons soigneusement sélectionné 
          chaque article pour garantir qualité et efficacité. Prenez soin 
          de votre visage avec nos produits hypoallergéniques et sûrs, afin
           de vous concentrer sur votre bien-être.
    </p>
</div>
   
    
<?php include 'carte.php';?>
            <?php include 'coeur.php';?>
         <script src="../js/visage.js"></script>
         <script src="../js/script.js"></script>
       
         <nav class="pagination pagination-container">
            <ul>
                <li><a href="produit_visage.php" style="background-color: gray;">1</a></li>
                <li><a href="produit_visage2.php">2</a></li>
                <li><a href="produit_visage3.php">3</a></li>
                <li><a href="produit_visage2.php" class="link-arrow" title="Voir plus">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                      </svg> <!-- Icône de flèche vers la droite -->
                    </a>
                </li>
                <!-- Ajoutez d'autres liens en fonction du nombre de pages -->
            </ul>
        </nav>
      
        <?php include 'footer.php';?>

           
    
</body>
</html>