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
          <h2 class="ml-lg-2">Gestion des Clients</h2>
        </div>
        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
		  <i class="material-icons">&#xE147;</i> <span>Ajouter Client</span></a>
          
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
            <th>Nom</th>
            <th>Email</th>
            <th>Addresse</th>
            <th>Téléphone</th>
        </tr>
    </thead>
    <tbody>
<?php
include('etablissement.php');
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    // Construire la requête SQL en fonction de la recherche
    $sql = "SELECT * FROM clients WHERE nom_complet LIKE '%$search%' OR email LIKE '%$search%' OR Adresse LIKE '%$search%' OR Tele LIKE '%$search%'";

    $result = $conn->query($sql);

    // Vérification si des résultats sont retournés
    if ($result->num_rows > 0) {
        // Parcourir chaque ligne de résultat
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>
                <span class=\"custom-checkbox\">
                    <input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\">
                    <label for=\"checkbox1\"></label>
                </span>
            </td>";
            echo "<td>" . $row["nom_complet"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["Adresse"] . "</td>";
            echo "<td>" . $row["Tele"] . "</td>";
            echo '<td>
                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-client-id="' . $row["id_client"] . '">
                    <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i>
                </a>
            </td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Aucun client trouvé</td></tr>";
    }
} else {
    // Inclure le fichier de recherche des clients

    // Construire la requête SQL pour récupérer tous les clients
    $sql = "SELECT * FROM clients";
    $result = $conn->query($sql);

    // Vérification si des résultats sont retournés
    if ($result->num_rows > 0) {
        // Parcourir chaque ligne de résultat
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>
                <span class=\"custom-checkbox\">
                    <input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\">
                    <label for=\"checkbox1\"></label>
                </span>
            </td>";
            echo "<td>" . $row["nom_complet"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["Adresse"] . "</td>";
            echo "<td>" . $row["Tele"] . "</td>";
            echo '<td>
                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-client-id="' . $row["id_client"] . '">
                    <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i>
                </a>
            </td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Aucun client trouvé</td></tr>";
    }
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
      <form method="POST" action = "ajouter_client.php" id="myForm">
        <div class="modal-header">
          <h4 class="modal-title">Ajouter client</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nom complet</label>
            <input  class="form-control" name="nom_complet" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un nom d\'un client.')">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un email.')">
          </div>
          <div class="form-group">
            <label>Nom utilisateur</label>
            <input class="form-control" name="nom_user" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un nom d\'utilisateur.')">
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input  type="password" class="form-control" name="psswrd" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un mot de passe.')">
          </div>
          <div class="form-group">
            <label>Addresse</label>
            <textarea class="form-control" name="adresse" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un adresse.')"></textarea>
          </div>
          <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" name="telephone" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un numéro de Téléphone.')">
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

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Modifier client</h4>
          <button type="button" class="close" data-dismiss="modal" 
		  aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un nom d\'un client.')">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un email.')">
          </div>
          <div class="form-group">
            <label>Addresse</label>
            <textarea class="form-control" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un adresse.')"></textarea>
          </div>
          <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un numéro de Téléphone.')">
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
          <input type="submit" class="btn btn-info" value="Enregistrer">
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="delete_client.php" method="GET" id="deleteForm">
        <div class="modal-header">
          <h4 class="modal-title">Supprimer client</h4>
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
<script src="js/delete_client.js"></script>
</body>
</html>
<?php
// Fermeture de la connexion à la base de données
$conn->close();
?>