<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Qui Sommes-Nous</title>
    <link rel="stylesheet" href="../css/acceuil.css">
    <link rel="stylesheet" href="../css/page1.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/nous.css">
    <script src="../js/direction.js"></script>
    
</head>
<body>
<div class="circle-container">
    <div class="person-container" onclick="redirectToPersonPage('oumaima.php')">
        <div class="person-circle">
            <img src="../site/photo.jpg" alt="Person 1">
        </div>
        <div class="person-label" onclick="redirectToPersonPage('oumaima.php')">AZZOUZI Oumaima</div>
    </div>

    <div class="person-container" onclick="redirectToPersonPage('wahiba.php')">
        <div class="person-circle">
            <img src="../site/photo2.jpeg" alt="Person 2">
        </div>
        <div class="person-label" onclick="redirectToPersonPage('wahiba.php')">MOUSSAOUI Wahiba</div>
    </div>
</div>
<?php include 'footer.php';?>
</body>
</html>
