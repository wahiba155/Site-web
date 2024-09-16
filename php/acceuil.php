<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>

    <link rel="stylesheet" href="../css/acceuil.css">
    <link rel="stylesheet" href="../css/page1.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/categorie.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="../js/action.js"></script>
    <script src="../js/direction.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
</head>
<body>

    <div class="containers">
        <div id="slide">
            <div class="item_slide" style="background-image: url(../site/beau-bebe.jpg);">
                <div class="contents">
                    <div class="names">Produit bébé</div>
                    <div class="des_slide">Découvrez une gamme complète de produits pour répondre à tous les besoins de votre bébé.</div>
                    <button onclick="redirectToPersonPage('produit_bebe.php')">Voir plus</button>
                </div>
            </div>
            <div class="item_slide" style="background-image: url(../site/bent_chinwiya.png);">
                <div class="contents">
                    <div class="names">Produit visage</div>
                    <div class="des_slide">Découvrez notre sélection exquise de produits pour le visage, spécialement conçus pour révéler la beauté naturelle de votre peau.</div>
                    <button onclick="redirectToPersonPage('produit_visage.php')">Voir plus</button>
                </div>
            </div>
            <div class="item_slide" style="background-image: url(../site/dors.jpg);">
                <div class="contents">
                    <div class="names">Produit bébé</div>
                    <div class="des_slide">Découvrez une gamme complète de produits pour répondre à tous les besoins de votre bébé.</div>
                    <button onclick="redirectToPersonPage('produit_bebe.php')">Voir plus</button>
                </div>
            </div>
            <div class="item_slide" style="background-image: url(../site/hands.jpg);">
                <div class="contents">
                    <div class="names" style="color: aliceblue;">Produit corps</div>
                    <div class="des_slide" style="color: aliceblue;">Cherchez-vous à nourrir et revitaliser votre peau pour une sensation de fraîcheur et de vitalité ?</div>
                    <button onclick="redirectToPersonPage('produit_corps.php')">Voir plus</button>
                </div>
            </div>
            <div class="item_slide" style="background-image: url(../site/higiene.jpg);">
                <div class="contents">
                    <div class="names">Produit bébé</div>
                    <div class="des_slide">Découvrez une gamme complète de produits pour répondre à tous les besoins de votre bébé.</div>
                    <button onclick="redirectToPersonPage('produit_bebe.php')">Voir plus</button>
                </div>
            </div>
            <div class="item_slide" style="background-image: url(../site/routine-protection-solaire.jpg);">
                <div class="contents">
                    <div class="names">Produit solaire</div>
                    <div class="des_slide">Plongez dans l'été en toute confiance avec nos crèmes solaires de qualité supérieure, conçues pour protéger votre peau des rayons UV</div>
                    <button onclick="redirectToPersonPage('produit_solaire.php')">Voir plus</button>
                </div>
            </div>
            <div class="item_slide" style="background-image: url(../site/skin.jpg);">
                <div class="contents">
                    <div class="names">Produit visage</div>
                    <div class="des_slide">Découvrez notre sélection exquise de produits pour le visage, spécialement conçus pour révéler la beauté naturelle de votre peau.</div>
                    <button onclick="redirectToPersonPage('produit_visage.php')">Voir plus</button>
                </div>
            </div>
            <div class="item_slide" style="background-image: url(../site/chev.jpg);">
                <div class="contents">
                    <div class="names">Produit cheveux</div>
                    <div class="des_slide">Des shampooings nourrissants aux masques réparateurs, en passant par les huiles revitalisantes et les sérums protecteurs.</div>
                    <button onclick="redirectToPersonPage('produit_cheveux.php')">Voir plus</button>
                </div>
            </div>
        </div>
        <div class="buttons_slide">
            <button id="prev_slide"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
              </svg></button>
            <button id="next_slide"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
              </svg></button>
        </div>
    </div>

    <script src="../js/test.js"></script>
             
    

    <h2 id="debut">Binevenue à <span class="wedy">WEDY para </span>en ligne!</h2>
            <div id="div">
                <div class="case">
                    <div class="title">PRODUIT NATURELS ET DE QUALITE</div>
                    <div class="text">
                        Explorez notre gamme de produits naturels, 
                        de compléments alimentaires et de cosmétiques qui favorisent votre santé et embellissent votre vie.
                    </div>
                </div>
                <div class="case">
                    <div class="title"> LIVRAISON RAPIDE ET SECURISEE</div>
                    <div class="text">
                        Commandez en toute tranquillité depuis chez vous. 
                        Nous assurons une livraison rapide et sécurisée pour que vous puissiez profiter de vos produits préférés sans attendre.  
                    </div>
                </div>
                <div class="case">
                    <div class="title"> CONSEILS PERSONNALISES</div>
                    <div class="text">
                        Notre équipe dévouée est là pour vous conseiller. 
                        Besoin d'informations sur un produit ou d'une recommandation personnalisée ? 
                        Nous sommes là pour vous aider. 
                    </div>
                </div>
            </div>
    
            <table>
                <caption><h3>Explorez les catégorie</h3></caption>
                <tr>
                    <td>
                    <div class="category" id="visage">
                        <a href="produit_visage.php" title="produits de visage">
                            <img src="../site/face.gif" alt="visage" class="img">
                        </a>
                    </div>
                    </td>
    
                    <td>
                    <div class="category" id="cheveux">
                        <a href="produit_cheveux.php" title="produits de cheveux">
                           <img src="../site/hair.gif" alt="cheveux" class="img">
                        </a>
                    </div>
                    </td>
                    <td>
                    <div class="category" id="corps">
                        <a href="produit_corps.php" title="produits de corps">
                           <img src="../site/body.gif" alt="corps" class="img">
                        </a>
                    </div>
                    </td>
                    <td>
                    <div class="category" id="solaire">
                        <a href="produit_solaire.php" title="produits solaire">
                           <img src="../site/sun.gif" alt="solaire" class="img">
                        </a>
                    </div>
                    </td>
                    <td>
                    <div class="category" id="bebe">
                        <a href="produit_bebe.php" title="produits bebe">
                           <img src="../site/baby.gif" alt="bebe" class="img">
                        </a>
                    </div>
                    </td>
                </tr>
            </table>
            <h3 class="h3">Tendance</h3>
            <p style="font-size: large;font-family: Arial, Helvetica, sans-serif;text-align: center;">
                Découvrez l'élégance et l'innovation avec notre collection de produits tendances qui redéfinissent le style et la fonctionnalité,
                nous avons soigneusement sélectionné des articles qui incarnent les dernières tendances du moment.
            </p>
            <?php include 'carte.php';?>
            <?php include 'coeur.php';?>
            
            <script src="../js/tendance.js"></script>
            <script src="../js/script.js"></script>
           
            <h3 class="h3">Nos marques précieuses</h3>
                <div class="gallery-wrap">
                    <img src="../site/previus.png" id="previus">
                    <div class="gallery2">
                        <div>
                            <span><img src="../site/Mbioderma.png"></span>
                            <span><img src="../site/Mcerave.jpeg"></span>
                            <span><img src="../site/Meucerin.png"></span>
                        </div>
                        <div>
                            <span><img src="../site/Mroch.png"></span>
                            <span><img src="../site/Muriage.png"></span>
                            <span><img src="../site/Mbalea.jpeg"></span>
                        </div>
                        <div>
                        <span><img src="../site/nivia.jpeg"></span>
                        <span><img src="../site/johnsons.jpeg"></span>
                        <span><img src="../site/acm.jpeg"></span>
                    </div>
                    </div>
                    <img src="../site/next.png" id="next">
                </div>
                <script src="../js/sliders.js"></script>
                <?php include 'footer.php';?>       
    </body>
    </html>