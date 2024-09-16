<?php
$bdd = new PDO('mysql:host=localhost;dbname=pfe;', 'root', '');
$produits = $bdd->query('SELECT * FROM produit ORDER BY id_produit');

if(isset($_GET['s']) && !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    
    // Recherche par nom de produit
    $produitsNom = $bdd->query('SELECT Nom_produit, Categorie FROM produit WHERE Nom_produit LIKE "%'.$recherche.'%" ORDER BY id_produit DESC ');
    
    // Recherche par nom de catégorie
    $produitsCategorie = $bdd->query('SELECT Nom_produit, Categorie FROM produit WHERE Categorie LIKE "%'.$recherche.'%" ORDER BY id_produit DESC ');

    if($produitsNom->rowCount() > 0 || $produitsCategorie->rowCount() > 0){
        echo '<h2>Résultats de la recherche :</h2>';
        
        // Afficher les résultats de la recherche par nom de produit
        if($produitsNom->rowCount() > 0){
            echo '<h3>Résultats par nom de produit :</h3>';
            while($nomp = $produitsNom->fetch()){
                afficherProduit($nomp['Nom_produit'], $nomp['Categorie']);
            }
        }

        // Afficher les résultats de la recherche par nom de catégorie
        if($produitsCategorie->rowCount() > 0){
            echo '<h3>Résultats par catégorie :</h3>';
            while($cat = $produitsCategorie->fetch()){
                afficherProduit($cat['Nom_produit'], $cat['Categorie']);
            }
        }
    }
    else{
        echo '<script>alert("Aucun produit trouvé");</script>';
        echo '<script>setTimeout(function() { window.location.href = "acceuil.php"; }, 0);</script>';
    }
}

function afficherProduit($nomProduit, $categorie) {
    // Créer le nom de la page HTML du produit avec la catégorie
    $nomFichierProduit =$categorie . '.php';

    // Créer le lien vers la page de description du produit
    $lienDescriptionProduit = '../php/' . $nomProduit . '.php';

    // Si la recherche a été effectuée par nom de catégorie, rediriger vers la page correspondante
    if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] === $categorie) {
        header("Location: $nomFichierProduit");
        exit();
    }

    // Si la recherche a été effectuée par nom de produit, rediriger vers la page de description du produit
    if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] === $nomProduit) {
        header("Location: $lienDescriptionProduit ");
        exit();
    }

    // Sinon, afficher le lien vers la page du produit
    echo "<script>alert('Aucun produit trouvé');</script>";
    header("Location: acceuil.php");
}
?>
