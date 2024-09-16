<?php
// Vérifier si le cookie de comptage des visiteurs existe déjà
if (!isset($_COOKIE['visitor_count'])) {
    // Si le cookie n'existe pas, initialiser le compteur à 0
    $visitor_count = 0;
} else {
    // Si le cookie existe, récupérer le compteur à partir du cookie
    $visitor_count = $_COOKIE['visitor_count'];
}

// Augmenter le compteur de visiteurs à chaque visite
$visitor_count++;

// Enregistrer le nouveau compteur dans un cookie avec une expiration d'une journée (86400 secondes)
// Enregistrer le nouveau compteur dans un cookie avec une expiration d'une journée (86400 secondes)
setcookie('visitor_count', $visitor_count, time() + 86400, '/');
?>
<div class="wrapper">
        <div class="body-overlay"></div>		
		<!-------------------------sidebar------------>
		     <!-- Sidebar  -->
             <script src="js/direction.js"></script>
            <?php
                include('instance_admin.php');
                include('instance_message.php');
            ?>

        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../site/PharmacyLogo2.png" class="img-fluid" style="width: 100%"/></h3>
            </div>
            <ul class="list-unstyled components">
			<li  class="active">
                    <a href="#" class="dashboard"><i class="material-icons">tableau de board</i>
					<span>Tableau de board</span></a>
                </li>

				 <li class="dropdown" onclick="redirectToPersonPage('stock.php')">
                    <a href="stock.php" data-toggle="collapse" aria-expanded="false" 
					class="dropdown-toggle">
					<i class="material-icons">equalizer</i>					
					<span >Stock</span></a>
                </li>
				<li class="dropdown" onclick="redirectToPersonPage('demande.php')">
                    <a href="demande.php" data-toggle="collapse" aria-expanded="false" 
					class="dropdown-toggle">
					<i class="material-icons">border_color</i><span >Traiter une demande</span></a>
                    
                </li>
                <li class="dropdown" onclick="redirectToPersonPage('home.php')">
                    <a href="home.php" data-toggle="collapse" aria-expanded="false" 
					class="dropdown-toggle">
					<i class="material-icons">people</i><span>Gestion des clients</span></a>
                </li>
			   
			     <li class="dropdown" onclick="redirectToPersonPage('message.php')">
                    <a href="demande.php" data-toggle="collapse" aria-expanded="false" 
					class="dropdown-toggle">
					<i class="material-icons">content_copy</i><span>Liste des messages</span></a>
                    
                </li>              
            </ul>         
        </nav>
				
		<!--------page-content---------------->		
		<div id="content">
		   
		   <!--top--navbar----design--------->	   
		   <div class="top-navbar">
		      <div class="xp-topbar">

                <!-- Start XP Row -->
                <div class="row"> 
                    <!-- Start XP Col -->
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="xp-menubar">
                               <span class="material-icons text-white">signal_cellular_alt
							   </span>
                         </div>
                    </div> 
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-md-5 col-lg-3 order-3 order-md-2">
                        <div class="xp-searchbar">
                            <form  method="GET">
                                <div class="input-group">
                                  <input type="search" class="form-control" 
								  placeholder="Recherche" name="search">
                                  <div class="input-group-append">
                                    <button class="btn" type="submit" name="confirm"
									id="button-addon2">VOIR</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                        <div class="xp-profilebar text-right">
							 <nav class="navbar p-0">
              <ul class="nav navbar-nav flex-row ml-auto">   
                            <li class="dropdown nav-item active">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                   <span class="material-icons">notifications</span>
								   <span class="notification">
                                   <?php
                                    // Se connecter à la base de données
                                    include('etablissement.php');

                                    // Effectuer la requête pour compter le nombre de messages
                                    $sqlMessage = "SELECT COUNT(*) AS total_messages FROM message";
                                    $resultMessage = $conn->query($sqlMessage);

                                    if ($resultMessage->num_rows > 0) {
                                        // Récupérer le résultat de la requête
                                        $rowm = $resultMessage->fetch_assoc();
                                        $totalMessages = $rowm['total_messages'];

                                        echo $totalMessages;
                                    } else {
                                        echo "Aucun message trouvé dans la table.";
                                    }
                                    ?>
                                   </span>
                               </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                        <?php
                                            // Se connecter à la base de données
                                            include('etablissement.php');

                                            // Effectuer la requête pour récupérer les noms des clients
                                            $sqlNomClient = "SELECT DISTINCT nom_complet, email FROM message";
                                            $resultNomClient = $conn->query($sqlNomClient);

                                            if ($resultNomClient->num_rows > 0) {
                                                while ($rowmc = $resultNomClient->fetch_assoc()) {
                                                    $nomClientComplet = $rowmc['nom_complet'];
                                                    $email = $rowmc['email'];
                                            
                                                    echo "<li><a href=\"mailto:$email\">$nomClientComplet</a></li>";
                                                }"</a></li>";
                                            } else {
                                                echo "<li>Aucun client trouvé.</li>";
                                            }
                                        ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
    <a class="nav-link" href="#" data-toggle="dropdown">
        <span class="material-icons">remove_red_eye</span>
        <span class="xp-user-live"></span>
    </a>
    <ul class="dropdown-menu small-menu">
        <li>
            <?php
            if (isset($_COOKIE['visitor_count'])) {
                echo $_COOKIE['visitor_count'];
            } else {
                echo '0'; // Afficher 0 si le cookie n'existe pas
            }
            ?>
        </li>
    </ul>
</li>
<li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown">
							<img src="<?php echo $admin->getAvatar();?>" style="width:40px; border-radius:50%;"/>
							<span class="xp-user-live"></span>
							</a>
							<ul class="dropdown-menu small-menu">
                                <li>
                                    <a href="profil_photo.php">
                                        <span class="material-icons">
                                        person_outline
                                        </span>Modier profil</a>
                                    <a href="../php/acceuil1.php"><span class="material-icons">
                                        logout</span>Se deconnecter</a>
                                </li>
                            </ul>
                        </li>
                        </ul>              
          </nav>							
          </div>
          </div>
                    <!-- End XP Col -->

                </div> 
                <!-- End XP Row -->

            </div>
		     <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Tableau de board</h4>  
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Gestion</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visulisation</li>
                  </ol>                
            </div>			
		   </div>