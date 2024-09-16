const  form = document.querySelector("form"),
      nextBtn = form.querySelector(".nextBtn"),
      backBtn = form.querySelector(".backBtn"),
      allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click" , ()=> {

    allInput.forEach(input => {
if(input.value != ""){

    form.classList.add('secActive');
}else{
    form.classList.remove('secActive');
}


    })
})

backBtn.addEventListener("click" , () => form.classList.remove('secActive'));

const closeButton = document.getElementById("close");

closeButton.addEventListener("click", () => {
    window.location.href = "../php/acceuil.php";
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
