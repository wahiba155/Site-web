<?php 
include 'etablissement.php';  
 include ('../php/instance_client.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Messages clients</title>
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
          <h2 class="ml-lg-2">Gestion des Messages</h2>
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
          <th>Nom Client</th>
          <th>Email</th>
          <th>Sujet</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $sql = "SELECT * FROM message";
        $resultMess = $conn->query($sql);
        
        if ($resultMess->num_rows > 0) {
            while($rowmss = $resultMess->fetch_assoc()) {
                // Récupérer les données du message
                $idMessage = $rowmss['id_message'];
                $email = $rowmss['email'];
                $idClient = $rowmss['id_client'];
                $nomComplet = $rowmss['nom_complet'];
                $sujet = $rowmss['sujet'];
                $messageText = $rowmss['message'];
        
                // Créer une instance de la classe Message avec les données récupérées
                $message = new Message($idMessage, $email, $idClient, $nomComplet, $sujet, $messageText);
           // Afficher les données du message dans le tableau
           echo "<tr>";
           echo "<td>
               <span class=\"custom-checkbox\">
                   <input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\">
                   <label for=\"checkbox1\"></label>
               </span>
           </td>";
           echo "<td>" . $message->getNomComplet() . "</td>";
           echo "<td>" . $message->getEmail() . "</td>";
           echo "<td>" . $message->getSujet() . "</td>";
           echo "<td>" . $message->getMessage() . "</td>";
           echo '<td>
               <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-message-id="' . $rowmss['id_message'] . '">
                   <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i>
               </a>
           </td>';
           echo "</tr>";
        }
        } else {
        echo "<tr><td colspan='6'>Aucun message trouvé</td></tr>";
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
            <input  class="form-control" name="nom_complet" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label>Nom utilisateur</label>
            <input class="form-control" name="nom_user" required>
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input  type="password" class="form-control" name="psswrd" required>
          </div>
          <div class="form-group">
            <label>Addresse</label>
            <textarea class="form-control" name="adresse" required></textarea>
          </div>
          <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" name="telephone" required>
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
      <form action="delete_message.php" method="GET" id="deleteForm">
        <div class="modal-header">
          <h4 class="modal-title">Supprimer message</h4>
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
<script src="js/delete_message.js"></script>
</body>
</html>
<?php
// Fermeture de la connexion à la base de données
$conn->close();
?>