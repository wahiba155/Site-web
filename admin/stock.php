<?php include 'etablissement.php'; ?>
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
        <script src="../js/delete.js" ></script> 
		<!--google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
      
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
          <h2 class="ml-lg-2">Gestion de Stock</h2>
        </div>
      <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
		    <i class="material-icons">&#xE147;</i> <span>Ajouter Produit</span></a>
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
          <th>Image</th>
          <th>Nom produit</th>
          <th>Categorie</th>
          <th>Quantite</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>
      <?php
          // Vérification si des résultats sont retournés
          if ($result4->num_rows > 0) {
              // Parcourir chaque ligne de résultat
              while( ($row = $result4->fetch_assoc())) {
                  echo "<tr>";
                  echo "<td>
                      <span class=\"custom-checkbox\">
                          <input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\">
                          <label for=\"checkbox1\"></label>
                      </span>
                  </td>";
                  echo "<td><img src='" . $row["image"] . "' style='height: 50px; width: 50px; border-radius: 50%;'></td>";
                  echo "<td>" . $row["nom_produit"] . "</td>";
                  echo "<td>" . $row["categorie"] . "</td>";
                  echo "<td>" . $row["quantite_totale"] . "</td>";
                  echo "<td>" . $row["Prix"] . "</td>";
                  echo '<td>
                  <a href="#editEmployeeModal" class="edit" data-toggle="modal"  data-nom-produit="' . $row["nom_produit"] . '">
                  <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                      <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-nom-produit="' . $row["nom_produit"] . '">
                          <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i>
                      </a>
                  </td>';                
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='6'>Aucun produit trouvé</td></tr>";
          }
        ?>
      </tbody>
    </table>
    <!-- pagination -->
  </div>
</div>
<!-- Ajouter stock -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action = "ajouter_stock.php" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter produit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nom produit</label>
            <input type="text" class="form-control" name="nom_produit" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir le nom de produit.'">
          </div>
          <div class="form-group">
            <label>Image produit</label>
            <input type="file" class="form-control" name="image_produit" required oninvalid="setCustomValidityMessage(this, 'Veuillez télécharger une image.'">
          </div>
          <div class="form-group">
            <label>Categorie</label>
            <input type="text" class="form-control" name="categorie" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir une catégorie.'">
          </div>
          <div class="form-group">
            <label>Quantite_totale</label>
            <input type="number" class="form-control" name="quantite" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir la quantité totale.'">
          </div>
          <div class="form-group">
            <label>Prix</label>
            <input type="number" class="form-control" name="Prix" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir le prix.'">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="Description" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir la description.'">
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
<!-- Modifier produit -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action ="modify_product.php" method="POST">
        <div class="modal-header">
          <h4 class="modal-title">Modifier produit</h4>
          <button type="button" class="close" data-dismiss="modal" 
		  aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label>Nom produit</label>
            <input type="text" class="form-control" name="nom_produit" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir le nom de produit.'">
          </div>
          <div class="form-group">
            <label>Categorie</label>
            <input type="text" class="form-control" name="categorie" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir une catégorie.'" >
          </div>
          <div class="form-group">
            <label>Quantite_totale</label>
            <input type="number" class="form-control" name="quantite" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir la quantité totale.'">
          </div>
          <div class="form-group">
            <label>Prix</label>
            <input type="number" class="form-control" name="Prix" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir le prix.'">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="Description" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir la description.'">
          </div>
          
        </div>
        <div class="modal-footer">
        <input type="hidden" name="nom_produit" value="">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
          <input type="submit" class="btn btn-success" value="Modifier" name="modifier" >
        </div>
      </form>
    </div>
  </div>
</div>

<script src = "js/modify_product.js"></script>

<!-- supprimer produit -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="delete_produit.php" method="POST" id="deleteForm">
        <div class="modal-header">
          <h4 class="modal-title" >Supprimer produit</h4>
          <button type="button" class="close" data-dismiss="modal" 
		  aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Vous êtes sûr que vous voulez supprimer cet enregistrement ?</p>
          <p class="text-warning"><small>Cette action ne peut jamais être annulée .</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
          <input type="submit" class="btn btn-danger" value="Supprimer" id="confirmDeleteButton">
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
<script>
$(document).ready(function() {
    $('.delete').click(function() {
        // Récupérer le nom du produit à partir de l'attribut de données personnalisé
        var nomProduit = $(this).data('nom-produit');
        
        // Effectuer une action de suppression avec AJAX
        $.ajax({
            url: 'delete_produit.php',
            type: 'POST',
            data: { nom_produit: nomProduit },
            success: function(response) {
                // Traitement de la réponse du serveur
                console.log(response);
                // Mettez à jour votre interface utilisateur ou effectuez d'autres actions nécessaires
            },
            error: function(xhr, status, error) {
                // Gestion des erreurs
                console.log(xhr.responseText);
            }
        });
        
        // Fermer la fenêtre modale de suppression
        $('#deleteEmployeeModal').modal('hide');
    });
});

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

</body>
</html>
<?php
// Fermeture de la connexion à la base de données
$conn->close();
?>