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
		
		
		<!--google fonts -->
	
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	<!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

  </head>
  <body>
  

<div class="wrapper">


        <div class="body-overlay"></div>
		
		<!-------------------------sidebar------------>
		     <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../site/PharmacyLogo2.png" class="img-fluid"/><span>WEDYpara</span></h3>
            </div>
            <ul class="list-unstyled components">
			<li  class="active">
                    <a href="#" class="dashboard"><i class="material-icons">tableau de board</i>
					<span>Tableau de board</span></a>
                </li>

				 <li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" 
					class="dropdown-toggle">
					<i class="material-icons">equalizer</i>
				
					
					<span>Stock</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                        <li>
                            <a href="#">Ajouter au stock</a>
                        </li>
                        <li>
                            <a href="#">Consulter le stock</a>
                        </li>
                    </ul>
                </li>
				
				<li class="dropdown">
                    <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" 
					class="dropdown-toggle">
					<i class="material-icons">border_color</i><span>Traiter une demande</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                        <li>
                            <a href="#">Supprimer</a>
                        </li>
                        <li>
                            <a href="#">Ajouter</a>
                        </li>
                        <li>
                            <a href="#">Modifier</a>
                        </li>
                    </ul>
                </li>
               
			   
			     <li class="dropdown">
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" 
					class="dropdown-toggle">
					<i class="material-icons">content_copy</i><span>Liste des demandes</span></a>
                    
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
                            <form>
                                <div class="input-group">
                                  <input type="search" class="form-control" 
								  placeholder="Recherche">
                                  <div class="input-group-append">
                                    <button class="btn" type="submit" 
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
								   <span class="notification">4</span>
                               </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">You have 5 new messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Mike</a>
                                    </li>
                                    <li>
                                        <a href="#">Wish Mary on her birthday!</a>
                                    </li>
                                    <li>
                                        <a href="#">5 warnings in Server Console</a>
                                    </li>
                                  
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
								<span class="material-icons">question_answer</span>

								</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown">
								<img src="img/user.jpg" style="width:40px; border-radius:50%;"/>
								<span class="xp-user-live"></span>
								</a>
								<ul class="dropdown-menu small-menu">
                    <li>
                          <a href="#">
										        <span class="material-icons">
                               person_outline
                         <a href="php/acceuil1.php"><span class="material-icons">
                              logout</span>Logout</a>
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
          <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
		  <i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
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
          <th>Telephone</th>
        </tr>
      </thead>
      <tbody>
      <?php
// Vérification si des résultats sont retournés
if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
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
        echo "<td>
            <a href=\"#editEmployeeModal\" class=\"edit\" data-toggle=\"modal\">
                <i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i>
            </a>
            <a href=\"#deleteEmployeeModal\" class=\"delete\" data-toggle=\"modal\">
                <i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i>
            </a>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Aucun employé trouvé</td></tr>";
}
?>

        
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" 
								name="options[]" value="1">
								<label for="checkbox4"></label>
							</span>
          </td>
          <td>Fran Wilson</td>
          <td>franwilson@mail.com</td>
          <td>C/ Araquil, 67, Madrid, Spain</td>
          <td>(204) 619-5731</td>
          <td>
            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          </td>
        </tr>
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" 
								name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
          </td>
          <td>Martin Blank</td>
          <td>martinblank@mail.com</td>
          <td>Via Monte Bianco 34, Turin, Italy</td>
          <td>(480) 631-2097</td>
          <td>
            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="clearfix">
      <div class="hint-text">Voir <b>5</b> de <b>25</b> autres</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Precedent</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Suivant</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Ajouter client</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Addresse</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
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
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Addresse</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Telephone</label>
            <input type="text" class="form-control" required>
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
      <form>
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
          <input type="submit" class="btn btn-danger" value="Supprimer">
        </div>
      </form>
    </div>
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
  </body>
  </html>
  <?php
// Fermeture de la connexion à la base de données
$conn->close();
?>