<?php
  include 'instance_admin.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">
  <title>Editer profil</title>
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
<svg id="close" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
</svg>
  <main>
    <h1>Editer profil</h1>
    <form method="POST" action="modify_profil.php" enctype="multipart/form-data">
      <div>
        <img src="<?php echo $admin->getAvatar();?>" alt="avatar" id="img" />
        <input type="file" name="foto" id="foto" accept="image/*" />
        <label for="foto">Choisir votre photo</label>
      </div>
      <div>
        <label for="nom">Nom administrateur</label>
        <input type="text" name="nom" autocomplete="off" value="<?php echo $admin->getUserName();?>" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un nom.')"/>
      </div>
      <div>
        <label for="email">Email</label>
        <input type="text" name="email" autocomplete="off"value="<?php echo $admin->getEmail();?>" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un email.')"/>
      </div>
      <div>
        <label for="psswd">Mot de passe</label>
        <input type="password" name="psswd" autocomplete="off" value="<?php echo $admin->getPassword();?>" required oninvalid="setCustomValidityMessage(this, 'Veuillez saisir un mot de passe.')" />
      </div>
      <div>
        <button type="submit">Confirmer</button>
      </div>
    </form>
  </main>
  <script src="script.js"></script>
</body>
</html>