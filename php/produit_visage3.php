<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits Visage</title>
    <link href="../css/acceuil.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/page1.css">
    
    <link href="../css/visage.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">

    
    
    
</head>
<body>

<?php include 'carte.php';?>
            <?php include 'coeur.php';?>

             <script src="../js/visage3.js"></script>
             <script src="../js/script.js"></script>

             <nav class="pagination pagination-container">
                <ul>
                    <li>
                        <a href="produit_visage2.php" class="link-arrow" title="Voir précédent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                              </svg> <!-- Icône de flèche vers la gauche -->
                        </a>
                    </li>
                    <li><a href="produit_visage.php">1</a></li>
                    <li><a href="produit_visage2.php">2</a></li>
                    <li><a href="produit_visage3.php" style="background-color: gray;">3</a></li>
                </ul>
            </nav>
            <?php include 'footer.php';?>

    </body>
    </html>