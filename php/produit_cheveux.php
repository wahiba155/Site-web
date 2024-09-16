<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits cheveux</title>
    <link href="../css/acceuil.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/page1.css">

    <link href="../css/cheveux.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">


    
    
</head>
<body>
    
    <div class="baby" >
        <ul class="liste">
            <li><a href="produit_cheveux.php">Secs</a></li>
            <li><a href="produit_cheveux2.php">Gras</a></li>
            <li><a href="produit_cheveux.php">Normales</a></li>
            <li><a href="produit_cheveux2.php">Boucles</a></li>
        </ul>
        <h6>Produits CHEVEUX</h6>
    <p style="font-size: large;font-family: Arial, Helvetica, sans-serif;text-align: justify; font-weight: bold;">
        Des shampooings nourrissants aux masques réparateurs, en passant par les huiles revitalisantes et les sérums protecteurs, 
        chaque produit est formulé avec des ingrédients de qualité pour vous offrir des résultats visibles dès la première utilisation. 
        Dites adieu aux cheveux ternes et abîmés, et laissez notre expertise en soins capillaires vous guider vers des cheveux éclatants de santé et de vitalité.
    </p>
</div>
<?php include 'carte.php';?>
            <?php include 'coeur.php';?>

            <script src="../js/cheveux.js"></script>
            <script src="../js/script.js"></script>
        
      <nav class="pagination pagination-container">
        <ul>
            <li><a href="produit_cheveux.php" style="background-color: gray;">1</a></li>
            <li><a href="produit_cheveux2.php">2</a></li>
            <li><a href="produit_cheveux2.php" class="link-arrow" title="Voir plus">
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