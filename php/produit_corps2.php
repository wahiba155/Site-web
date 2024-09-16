<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits Corps</title>
    <link href="../css/acceuil.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/page1.css">
    
    <link href="../css/corps.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">


    
    
</head>
<body>
                            
    
<?php include 'carte.php';?>
            <?php include 'coeur.php';?>
             <script src="../js/corps2.js"></script>
             <script src="../js/script.js"></script>

             <nav class="pagination pagination-container">
                <ul>
                    <li>
                        <a href="produit_corps.php" class="link-arrow" title="Voir précédent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                              </svg> <!-- Icône de flèche vers la gauche -->
                        </a>
                    </li>
                    <li><a href="produit_corps.php">1</a></li>
                    <li><a href="produit_corps2.php" style="background-color: gray;">2</a></li>
                    <li><a href="produit_corps3.php">3</a></li>
                    <li><a href="produit_corps3.php" class="link-arrow" title="Voir plus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                          </svg></i> <!-- Icône de flèche vers la droite -->
                        </a>
                    </li>
                    <!-- Ajoutez d'autres liens en fonction du nombre de pages -->
                </ul>
            </nav>

            <?php include 'footer.php';?>

    </body>
    </html>