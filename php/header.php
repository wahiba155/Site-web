
<header>
        <table class="max-width-table1" style="height: 50px">
            <tr>
                <td>
                    <img src="../site/PharmacyLogo2.png"  alt="Logo" class="logopara" >
                </td>
                    
                <td>
                    <form method="GET" action="recherche.php">
                    <input type="search" name="s" size="70" placeholder="Recherche" autocomplete="off">
                    <button type="submit" name="chercher"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                      </svg></button>
                    </form>                   
                </td>
                <td>
    <div class="user">
    <?php
   session_start();
     ?>
    <?php
    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
        // Utilisateur connecté
        echo '<a href="Profileclient.php">';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">';
        echo '<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>';
        echo '<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>';
        echo '</svg>';
        echo '</a>';
        echo '<ul id="user-menu" style="height: 60%;      position: absolute;    bottom: -23px;">';
        echo '<li><a href="deconnexion.php"><svg style=" margin-right=10px; margin-top=10px" xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
      </svg>  Déconnecter</a></li>';
        echo '<li><a href="changer_profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
      </svg>  Changer de profil</a></li>';
       
        echo '</ul>';
    } else {
        // Utilisateur non connecté
        //echo '<a href="se_connecter.php">';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">';
        echo '<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>';
        echo '<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>';
        echo '</svg>';
        echo '</a>';
        echo  '<ul id="user-menu" style="height: 60%;      position: absolute;    bottom: -23px;">';
        echo '<li><a href="se_connecter.php">se connecter</a></li>';
        echo '<li><a href="connexion2.php">s\'inscrir</a></li>';
        echo '</ul>';
    }
    ?>
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
                        <svg onclick="showSidebarc()" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1"/>
                          </svg>
                        <p id="countc">0</p>
                    </div>
                
            </td>
                
                
               
            </tr>
        </table>
        <div class="menu-bar" style="background-color:  rgba(255, 255, 255, 0.8); height: 1cm;">
            <ul>
              <li><a href="acceuil.php" style="color: rgb(69, 115, 156); font-weight: bold;">Acceuil</a></li>
              <li><a href="promotion.php" style="color: rgb(69, 115, 156); font-weight: bold;">Promotion</a></li>
              <li><a href="#" style="color: rgb(69, 115, 156); font-weight: bold;" >Categories <svg  style="    margin-top: -4px ;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
              </svg></a>
      
                  <div class="dropdown-menu" style="background-color:  white;">
                      <ul>
                          <li>
                          <a href="produit_bebe.php" style="color:  rgb(69, 115, 156);">Produits bebe <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16" style="float:right;">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg></a>
                              
                              <div class="dropdown-menu-1" style="background-color:  white;">
                                <ul>
                                  <li><a href="produit_bebe.php" style="color:  rgb(69, 115, 156);">Hydratation</a></li>
                                  <li><a href="produit_bebe2.php" style="color:  rgb(69, 115, 156);">Creme solaire</a></li>
                                  <li><a href="produit_bebe3.php" style="color:  rgb(69, 115, 156);">Higiene</a></li>
                                </ul>
                              </div>
                            </li>
                        <li>
                          <a href="produit_solaire.php" style="color:  rgb(69, 115, 156);">Produits solaire <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16" style="float:right;">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg></a>
                          
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
                          <a href="produit_corps.php" style="color:  rgb(69, 115, 156);">Produit corps <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16" style="float:right;">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg></a>
                          
                          <div class="dropdown-menu-1" style="background-color:  white;">
                            <ul>
                              <li><a href="produit_corps2.php" style="color:  rgb(69, 115, 156);">Hydratation corporelle</a></li>
                              <li><a href="produit_corps.php" style="color:  rgb(69, 115, 156);">Higiène corporelle</a></li>
                              <li><a href="produit_corps2.php" style="color:  rgb(69, 115, 156);">Main & ongles</a></li>
                            </ul>
                          </div>
                        </li>
                        <li>
                            <a href="produit_visage.php" style="color:  rgb(69, 115, 156);">Produit visage <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16" style="float:right;">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg></a>
                            
                            <div class="dropdown-menu-1" style="background-color:  white;">
                              <ul>
                              <li><a href="produit_visage2.php" style="color:  rgb(69, 115, 156);">Peau seche</a></li>
                              <li><a href="produit_visage.php" style="color:  rgb(69, 115, 156);">Peau grasse</a></li>
                              <li><a href="produit_visage2.php" style="color:  rgb(69, 115, 156);">Peau mixte</a></li>
                              <li><a href="produit_visage.php" style="color:  rgb(69, 115, 156);">Peau normale</a></li>
                              <li><a href="produit_visage2.php" style="color:  rgb(69, 115, 156);">Peau acnéique</a></li>
                              </ul>
                            </div>
                        </li>
                        <li>
                            <a href="produit_cheveux.php" style="color:  rgb(69, 115, 156);">Produit cheveux <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16" style="float:right;">
  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
</svg></i></a>
                            
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
