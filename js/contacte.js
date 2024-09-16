const closeButton = document.getElementById("close");

closeButton.addEventListener("click", () => {
  window.location.href = "acceuil.php";
});

document.addEventListener('DOMContentLoaded', function () {
  checkUserConnection().then(function (isLoggedIn) {
      if (!isLoggedIn) {
          alert('Veuillez vous connecter pour envoyer un message !');
          window.location.href = 'se_connecter.php';
      }
  }).catch(function (error) {
      console.error(error);
  });
});
function checkUserConnection(){
  
    return new Promise(function(resolve, reject) {
        // Effectuer une requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../php/connection.php?t=' + Date.now(), true);
        xhr.setRequestHeader('Content-Type', 'application/json');
  
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log(response); // Afficher la réponse dans la console
                    resolve(response.is_logged_in === true);
                } catch (error) {
                    reject(Error('Erreur de parsing JSON'));
                }
            } else {
                reject(Error(xhr.statusText));
            }
        };
  
        xhr.onerror = function() {
            reject(Error('Erreur réseau'));
        };
  
        xhr.send();
    });
  }
        function setCustomValidityMessage(input, message) {
            if (input.value !== '') {
                // If the field is not empty, clear the custom validity message
                input.setCustomValidity('');
            } else {
                // If the field is empty, set the custom validity message
                input.setCustomValidity(message);
            }
        }


