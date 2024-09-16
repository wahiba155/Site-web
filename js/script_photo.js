const defaultFile = 'https://stonegatesl.com/wp-content/uploads/2021/01/avatar-300x300.jpg';

const file = document.getElementById( 'foto' );
const img = document.getElementById( 'img' );
file.addEventListener( 'change', e => {
  if( e.target.files[0] ){
    const reader = new FileReader( );
    reader.onload = function( e ){
      img.src = e.target.result;
    }
    reader.readAsDataURL(e.target.files[0])
  }else{
    img.src = defaultFile;
  }
} );
const closeButton = document.getElementById("close");

closeButton.addEventListener("click", () => {
  window.location.href = "../php/Profileclient.php";
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

