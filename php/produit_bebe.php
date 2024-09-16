<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits bébé</title>
    <link href="../css/acceuil.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/page1.css">
    <link href="../css/bebe.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="../js/direction.js"></script>
</head>
<body>
    

    <div class="baby">
        <ul class="liste">
            <li><a href="produit_bebe.php">Hygiène</a></li>
            <li><a href="produit_bebe2.php">Crème Solaire</a></li>
            <li><a href="produit_bebe3.php">Hydratation</a></li>
        </ul>
    <h6>Produits BEBE</h6>
    <p style="font-size: large;font-family: Arial, Helvetica, sans-serif;text-align: center; font-weight: bold;">
        Découvrez une gamme complète de produits pour répondre à tous les besoins de votre bébé, 
        des couches et lingettes hypoallergéniques aux vêtements adorables en passant par les accessoires essentiels tels que les biberons, 
        les sucettes et les jouets de dentition. Nous avons soigneusement sélectionné chaque article pour garantir leur qualité et leur sécurité, 
        afin que vous puissiez vous concentrer sur ce qui compte le plus  le bien-être de votre bébé.
    </p>
</div>
<?php include 'carte.php';?>
<?php include 'coeur.php';?>
<script src="../js/bebe.js"></script>
<script src="../js/script.js"></script>

   
      <nav class="pagination pagination-container">
        <ul>
            <li><a href="produit_bebe.php" style="background-color: gray;">1</a></li>
            <li><a href="produit_bebe2.php">2</a></li>
            <li><a href="produit_bebe3.php">3</a></li>
            <li><a href="produit_bebe2.php" class="link-arrow" title="Voir plus">
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