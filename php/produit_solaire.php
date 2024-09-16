<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/solaire.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/acceuil.css">
    <link rel="stylesheet" href="../css/page1.css">
    <link href="../css/solaire.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">


    

<title>produit_solaire</title>


</head>

    
    <div class="sun">
      <ul class="liste">
          <li><a href="produit_solaire.php">Hygiène</a></li>
          <li><a href="produit_solaire2.php">Crème Solaire</a></li>
          <li><a href="produit_solaire3.php">Hydratation</a></li>
      </ul>
  <h6>Produits solaires</h6>
  <p style="font-size: large;font-family: Arial, Helvetica, sans-serif;text-align: center; font-weight: bold;">
    Protéger votre peau contre les rayons du soleil est crucial pour maintenir votre santé et prévenir les dommages causés par le soleil. Notre gamme complète de produits solaires répond à tous vos besoins en matière de protection solaire. Que vous recherchiez un écran solaire quotidien pour une protection quotidienne ou des produits après-soleil rafraîchissants pour apaiser et hydrater votre peau après une exposition au soleil, nous avons tout ce qu'il vous faut.

    Nos produits solaires sont soigneusement formulés pour offrir une protection efficace contre les rayons UVA et UVB. Ils sont enrichis en ingrédients nourrissants et hydratants pour prendre soin de votre peau pendant et après l'exposition au soleil. Que vous ayez une peau sensible, grasse, sèche ou normale, vous trouverez des produits adaptés à votre type de peau et à vos préférences.
  </p>
</div>
   
    
<?php include 'carte.php';?>
            <?php include 'coeur.php';?>
         <script src="../js/solaire.js"></script>
         <script src="../js/script.js"></script>
       
         <nav class="pagination pagination-container">
            <ul>
                <li><a href="produit_solaire.php" style="background-color: gray;">1</a></li>
                <li><a href="produit_solaire2.php">2</a></li>
                <li><a href="produit_solaire3.php">3</a></li>
                <li><a href="produit_solaire2.php" class="link-arrow" title="Voir plus">
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