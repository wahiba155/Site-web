<?php 
include ('etablissement.php');
include ('../php/instance_commande.php');
include ('../php/instance_client.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Tableau de board</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../cssBoard/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="../cssBoard/custom.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
		<!--google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	<!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
      <script>
 function setCustomValidityMessage(input, message) {
            if (input.value !== '') {
                // If the field is not empty, clear the custom validity message
                input.setCustomValidity('');
            } else {
                // If the field is empty, set the custom validity message
                input.setCustomValidity(message);
            }
        }
</script>
  </head>
  <body>
  
  <?php include 'header_admin.php'; ?>
		   
		   <!--------main-content------------->
		   
		   <div class="main-content">
			  <div class="row">
			    
				<div class="col-md-12">
				<div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Gestion des Commandess</h2>
        </div>
        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
		  <i class="material-icons">&#xE147;</i> <span>Ajouter Commande</span></a>
          
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
            <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
          </th>
          <th>Image produit</th>
          <th>Nom produit</th>
          <th>Catégorie</th>
          <th>Quantité</th>
          <th>Prix</th>
          <th>Date commande</th>
          <th>Nom client</th>
        </tr>
      </thead>
      <tbody>
      <?php
$sqlCommandes = "SELECT * FROM commande";
$resultCommandes = $conn->query($sqlCommandes);

// Vérification des erreurs d'exécution de la requête
if (!$resultCommandes) {
    die('Erreur lors de l\'exécution de la requête : ' . $conn->error);
}

// Vérification si des résultats sont retournés
if ($resultCommandes->num_rows > 0) {
    while ($rowc = $resultCommandes->fetch_assoc()) {
        $id = $rowc['id_client'];
        $sqlClient = "SELECT * FROM clients WHERE id_client = $id";
        $resultClient = $conn->query($sqlClient);

        // Vérification des erreurs d'exécution de la requête
        if (!$resultClient) {
            die('Erreur lors de l\'exécution de la requête : ' . $conn->error);
        }

        // Vérification si des résultats sont retournés
        if ($resultClient->num_rows > 0) {
            $rowcl = $resultClient->fetch_assoc();
            $commande = new Commande($rowc['id_comande'], $rowc['image'], $rowc['titre'], $rowc['prix'], $rowc['quantite'], $rowc['date_commande'], $rowc['categorie'], $rowc['id_client']);
            echo '<tr>';
            echo "<td>
                    <span class=\"custom-checkbox\">
                        <input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\">
                        <label for=\"checkbox1\"></label>
                    </span>
                  </td>";
            echo "<td><img src='" . $rowc["image"] . "' style='height: 50px; width: 50px; border-radius: 50%;'></td>";
            echo "<td>" . $rowc["titre"] . "</td>";
            echo "<td>" . $rowc["categorie"] . "</td>";
            echo "<td>" . $rowc["quantite"] . "</td>";
            echo "<td>" . $rowc["prix"] . "</td>";
            echo "<td>" . $rowc["date_commande"] . "</td>";
            echo "<td>" . $rowcl["nom_complet"] . "</td>";
            echo '<td>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-commande-id="' . $rowc["id_comande"] . '">
                        <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i>
                    </a>
                  </td>';
            echo "</tr>";
        }
    }
} else {
    echo "<tr><td colspan='6'>Aucune commande  trouvée</td></tr>";
}
?>
      </tbody>
    </table>
    <!-- pagination -->
  </div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action = "ajouter_demande.php" id="myForm">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter Commande</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nom Client</label>
            <input type="text" class="form-control" name="nom_client" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir le nom d\'un client.')">
          </div>
          <div class="form-group">
            <label>Nom Produit</label>
            <input type="text" class="form-control" name="nom_produit" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir le nom de produit.')">
          </div>
          <div class="form-group">
            <label>Categorie</label>
            <input type="text" class="form-control" name="categorie" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir une catégorie.')">
          </div>
          <div class="form-group">
            <label>Quantite</label>
            <input type="number" class="form-control" name="quantite" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir une quantité.')">
          </div>
          <div class="form-group">
  <label>Date Commande</label>
  <input type="text" class="form-control" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
</div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
          <input type="submit" class="btn btn-success" value="Ajouter" name="ajouter" >
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="delete_demande.php" method="GET" id="deleteForm">
        <div class="modal-header">
          <h4 class="modal-title">Supprimer commande</h4>
          <button type="button" class="close" data-dismiss="modal" 
		  aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Vous êtes sûr que vous voulez supprimer cet enregistrement ?</p>
          <p class="text-warning"><small>Cette action ne peut jamais être annulée .</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
          <input type="submit" class="btn btn-danger" value="Supprimer" id="confirmDelete">
        </div>
      </form>
    </div>
	</div>	   
</div> 
			 <!---footer---->			 
		</div>		
		<footer class="footer">
			    <div class="container-fluid">
				  <div class="footer-in">
                    <p class="mb-0">&copy WEDY para 2024</p>
                </div>
				</div>
			 </footer>
</div>
</div>
<!----------html code compleate-----------> 
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../jsBoard/jquery-3.3.1.slim.min.js"></script>
   <script src="../jsBoard/popper.min.js"></script>
   <script src="../jsBoard/bootstrap.min.js"></script>
   <script src="../jsBoard/jquery-3.3.1.min.js"></script>
    
  <script type="text/javascript">
        
		$(document).ready(function(){
		  $(".xp-menubar").on('click',function(){
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".xp-menubar,.body-overlay").on('click',function(){
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});		
</script>
<script src="js/delete_demande.js"></script>
</body>
</html>
<?php
// Fermeture de la connexion à la base de données
$conn->close();
?>