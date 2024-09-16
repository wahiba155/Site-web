<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="../css/connexion2.css">
    <link rel="stylesheet"  href="https:/unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <iframe src="acceuil.php"></iframe>
   
    <div class="container">
        
    <i class="fa-solid fa-xmark cl1" id="close" class="cl1" ></i>

        <header>Inscription</header>
        
        <form action="traitement.php" method="POST">
        
            <div class="form first">
                <div class="details personal">
                    
                        <span class="title">Informations personnelles</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Nom complet</label>
                            <input type="text" id="nom" name="nom" placeholder="Entrer votre nom" required
                                oninvalid="setCustomValidityMessage(this, 'Veuillez saisir votre nom.')">
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" id="email" name="email" placeholder="Entrer votre email" required
                                oninvalid="setCustomValidityMessage(this, 'Veuillez saisir votre email.')">
                        </div>
                        <div class="input-field">
                            <label>Mot de passe</label>
                            <input type="password" id="pass" name="pass" placeholder="Entrer un mot de passe" required
                                oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un mot de passe.')">
                        </div>
                        <div class="input-field">
                            <label>Nom d'utilisateur</label>
                            <input type="text" id="user" name="user" placeholder="Entrer un nom d'utilisateur" required
                                oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un nom d\'utilisateur.')">
                        </div>
                    </div>
                </div>
                <div class="details ID">
                    <div class="fields">
                        <div class="input-field">
                            <label>Numéro de téléphone</label>
                            <input type="number" id="tele" name="tele" placeholder="Entrer votre téléphone" required
                                oninvalid="setCustomValidityMessage(this, 'Veuillez saisir votre numéro de téléphone.')">
                        </div>
                        <div class="input-field">
                            <label>Date de naissance</label>
                            <input type="date" id="naissance" name="naissance" required
                                oninvalid="setCustomValidityMessage(this, 'Veuillez saisir votre date de naissance.')">
                        </div>
                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>
            <div class="form second">
                <div class="details address">
                    <span class="title">Information sur l'adresse</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Nom de rue</label>
                            <input type="text" id="nomrue" name="nomrue" placeholder="Entrer le nom de la rue" required
                                oninvalid="setCustomValidityMessage(this,'Veuillez saisir le nom de la rue.')">
                        </div>
                        <div class="input-field">
                            <label>Ville</label>
                            <input type="text" id="ville" name="ville" placeholder="Entrer la ville" required
                                oninvalid="setCustomValidityMessage(this,'Veuillez saisir le nom de la ville.')">
                        </div>
                        <div class="input-field">
                            <label>Bâtiment</label>
                            <input type="text" id="batiment" name="batiment" placeholder="Bâtiment, appartement, lot, etc. (Facultatif)">
                        </div>
                        <div class="input-field">
                            <label>Région</label>
                            <input type="text" id="region" name="region" placeholder="Entrer la région" required
                                oninvalid="setCustomValidityMessage(this,'Veuillez saisir la région.')">
                        </div>
                        <div class="input-field">
                            <label>Numéro de rue</label>
                            <input type="number" id="numrue" name="numrue" placeholder="Entrer le numéro de la rue" required
                                oninvalid="setCustomValidityMessage(this,'Veuillez saisir le numéro de rue')">
                        </div>
                        <div class="input-field">
                            <label>Code postal</label>
                            <input type="number" id="codepostale" name="codepostale" placeholder="Entrer le code postal" required
                                oninvalid="setCustomValidityMessage(this,'Veuillez saisir le code postal.')">
                        </div>
                        

                    </div>
                    <div class="buttons">
                        <button class="backBtn">
                      
                          <i class="uil uil-navigator"></i>
                          <span class="btnText">Back</span>
              
                        </button>
  
                        <button class="nextBtn" name="enregistrer">
                      
                          <span class="btnText">Enregistrer</span>
                          
                        </button>
                      </div>
                      <p>Vous avez un  compte? <a href="se_connecter.php" > Connectez-vous! </a></p>
                </div>

                
            
            </div>
        </form>
    </div>
    

    <script src="../js/connexion2.js"></script>

</body>
</html>