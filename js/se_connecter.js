const closeButton = document.getElementById("close2");

closeButton.addEventListener("click", () => {
    window.location.href = "acceuil.php";
});

document.getElementById("register").addEventListener("click", function() {
    
            window.location.href = "connexion2.php";
     
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