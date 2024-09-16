<?php
    include('../admin/instance_admin.php');
?>
<?php
session_start();

if (!isset($_SESSION['nom']) || !isset($_SESSION['prenom'])) {
    header('Location: se_connecter.php');
    exit;
}

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>'; // Inclure SweetAlert2
echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            title: "Bienvenue cher admin ' . $nom . ' ' . $prenom . '",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
            target: document.body // Spécifie l\'élément cible où afficher la SweetAlert
        });
    });
</script>';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="../css/acceuil.css">
    <link rel="stylesheet" href="../css/page1.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/adminProfil.css">
    <link rel="stylesheet" href="../css/categorie.css">
    
    
    <script src="../js/direction.js"></script>
    <script src="../js/action.js"></script>
    
</head>
<body>
<header>
        <table class="max-width-table1" style="height: 50px">
            <tr>
                <td>
                    <img src="../site/PharmacyLogo2.png"  alt="Logo" class="logopara" >
                </td>
                    
                <td>
                    <form method="GET" action="../php/recherche.php">
                    <input type="search" name="s" size="30" placeholder="Recherche" autocomplete="off">
                    <button  style="height: 31px; right: -189.7%; bottom: 14px;" type="submit" name="chercher"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                      </svg></button>
                    </form>                   
                </td>
                <td>
                    <div class="user">
                    <a href="../php/se_connecter.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                          </svg>
                    </a>
                   </div>
                    
                </td>
               
                <td>
                        <div class="cart">
                            <svg  onclick="showSidebar()" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                            <p id="count">0</p>
                        </div>
                    
                </td>
                
               
                <td>
                    <div class="coeur">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1"/>
                          </svg>
                        <p id="count">0</p>
                    </div>
                
            </td>
            <td>
                    <div class="profile" title="profile">
                        <div class="imageProfile">
                            <img src="<?php echo $admin->getAvatar();?>" alt="">
                        </div>
                        <div class="nomAdmin">
                            Wahiba MOUSSAOUI
                        </div>
                    </div>
                    <div class="formulaireDeconnx">
                        <div class="iconX">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </div>
                        <div class="imageProfileDeconnx">
                            <img src="<?php echo $admin->getAvatar();?>" alt="" >
                        </div>
                        <div class="nomAdmin">
                            Wahiba MOUSSAOUI
                        </div>
                        <div class="GererProfile">
                        <a href="../admin/home.php">Gérer votre parapharmacie</a>
                        </div>
                        <div class="lienDeconnx">
                            <a href="acceuil.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="19" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
</svg>
                                <span>Se déconnecter</span>
                            </a>
                        </div>
                    </div>
                    <script>
        const formulaireDeconexion = document.querySelector('.formulaireDeconnx');
        const iconX = document.querySelector('.iconX');
        const profile = document.querySelector('.profile');

        profile.onclick = () => 
        {
            formulaireDeconexion.style.display = 'block';
        }
        iconX.onclick = () => 
        {
            formulaireDeconexion.style.display = 'none';
        }
    </script>
                </td>
                
                
               
            </tr>
        </table>
        <div class="menu-bar" style="background-color:  rgba(255, 255, 255, 0.8); height: 0.5cm;">
            <ul>
              <li><a href="acceuil.php" style="color: rgb(69, 115, 156); font-weight: bold;">Acceuil</a></li>
              <li><a href="promotion.php" style="color: rgb(69, 115, 156); font-weight: bold;">Promotion</a></li>
              <li><a href="#" style="color: rgb(69, 115, 156); font-weight: bold;" >Categories <svg  style="    margin-top: -4px ;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
              </svg></a>
      
                  <div class="dropdown-menu" style="background-color:  white;">
                      <ul>
                          <li>
                              <a href="produit_bebe.php" style="color:  rgb(69, 115, 156);">Produits bebe <i class="fas fa-caret-right"></i></a>
                              
                              <div class="dropdown-menu-1" style="background-color:  white;">
                                <ul>
                                  <li><a href="produit_bebe.php" style="color:  rgb(69, 115, 156);">Hydratation</a></li>
                                  <li><a href="produit_bebe2.php" style="color:  rgb(69, 115, 156);">Creme solaire</a></li>
                                  <li><a href="produit_bebe3.php" style="color:  rgb(69, 115, 156);">Higiene</a></li>
                                </ul>
                              </div>
                            </li>
                        <li>
                          <a href="produit_solaire.php" style="color:  rgb(69, 115, 156);">Produits solaire <i class="fas fa-caret-right"></i></a>
                          
                          <div class="dropdown-menu-1" style="background-color:  white;">
                            <ul>
                              <li><a href="produit_solaire.php" style="color:  rgb(69, 115, 156);">Peau seche</a></li>
                              <li><a href="produit_solaire2.php" style="color:  rgb(69, 115, 156);">Peau grasse</a></li>
                              <li><a href="produit_solaire3.php" style="color:  rgb(69, 115, 156);">Peau mixte</a></li>
                              <li><a href="produit_solaire.php" style="color:  rgb(69, 115, 156);">Peau normale</a></li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <a href="produit_corps.php" style="color:  rgb(69, 115, 156);">Produit corps <i class="fas fa-caret-right"></i></a>
                          
                          <div class="dropdown-menu-1" style="background-color:  white;">
                            <ul>
                              <li><a href="produit_corps.php" style="color:  rgb(69, 115, 156);">Hydratation corporelle</a></li>
                              <li><a href="produit_corps.php" style="color:  rgb(69, 115, 156);">Higiène corporelle</a></li>
                              <li><a href="produit_corps.php" style="color:  rgb(69, 115, 156);">Main & ongles</a></li>
                            </ul>
                          </div>
                        </li>
                        <li>
                            <a href="produit_visage.php" style="color:  rgb(69, 115, 156);">Produit visage <i class="fas fa-caret-right"></i></a>
                            
                            <div class="dropdown-menu-1" style="background-color:  white;">
                              <ul>
                              <li><a href="#" style="color:  rgb(69, 115, 156);">Peau seche</a></li>
                              <li><a href="#" style="color:  rgb(69, 115, 156);">Peau grasse</a></li>
                              <li><a href="#" style="color:  rgb(69, 115, 156);">Peau mixte</a></li>
                              <li><a href="#" style="color:  rgb(69, 115, 156);">Peau normale</a></li>
                              <li><a href="#" style="color:  rgb(69, 115, 156);">Peau acnéique</a></li>
                              </ul>
                            </div>
                        </li>
                        <li>
                            <a href="produit_cheveux.php" style="color:  rgb(69, 115, 156);">Produit cheveux <i class="fas fa-caret-right"></i></a>
                            
                            <div class="dropdown-menu-1" style="background-color:  white;">
                              <ul>
                                <li><a href="produit_cheveux.php" style="color:  rgb(69, 115, 156);">Cheveux secs</a></li>
                                <li><a href="produit_cheveux2.php" style="color:  rgb(69, 115, 156);">Cheveux gras</a></li>
                                <li><a href="produit_cheveux.php" style="color:  rgb(69, 115, 156);">Cheveux normale</a></li>
                                <li><a href="produit_cheveux2.php" style="color:  rgb(69, 115, 156);">Cheveux bouclés</a></li>
                              </ul>
                            </div>
                          </li>
                      </ul>
                    </div>
              </li>
              <li><a href="livraison.php" style="color: rgb(69, 115, 156); font-weight: bold;">Livraison</a>
              </li>
              <li><a href="qui somme nous.php" style="color: rgb(69, 115, 156); font-weight: bold;">Qui Sommes-Nous</a></li>
              <li><a href="faq.php" style="color: rgb(69, 115, 156); font-weight: bold;">FAQ</a>
              </li>
            </ul>
          </div>
    </header>   
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