<?php
  include 'instance_client.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
   
    <link rel="stylesheet" href="../css/contacte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
   
</head>
<body>
  <iframe src="acceuil.php"></iframe>
     <main>
       
     <form action="traitement3.php" class="form_container" method="POST">
      
             <h1>Contactez-nous</h1>
             
              <div class="separation"></div>
              <i class="fa-solid fa-xmark" id="close"></i>
              <div class="corps-formulaire">
                  <div class="gauche">

                      <div class="boite">
                         <label for="">Votre nom complet</label>
                         <input type="text" name="prenom" value="<?php echo $client->getNomComplet(); ?>" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir votre nom.')">
                         <i class="bx bxs-user" id="p" ></i>
                       </div>

                        <div class="boite">
                         <label for="">Votre adresse e-mail</label>
                         <input type="text" name="email" value="<?php echo $client->getEmail(); ?>" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir votre email.')" >
                         <i class="bx bxs-envelope" id="p" ></i>
                        </div>

                        <div class="boite">
                          <label for="">Sujet</label>
                          <select name="subject" id="">
                          <option value="1">Demande d'information</option>
                          <option value="2">Support technique</option>
                          <option value="3">Retours ou suggestions</option>
                          <option value="4">Problème de facturation</option>
                          </select>
                          
                        </div>
                  </div>

                  <div class="droite">
                     <div class="boite">
                        <label>Message</label>
                        <textarea name="text" required oninvalid="setCustomValidity('Veuillez saisir un message.')">Saisissez ici...</textarea>                     </div>

                  </div>
              </div>
              <div class="pied-formulaire" align="center">

                

                <button type="submit" name="ok">Envoyer le message</button>

              </div>

     </form>
    </main>
    <script src="../js/contacte.js"></script>
    
</body>
</html>