let scrollContainer = document.querySelector(".gallery2");
let previus = document.getElementById("previus");
let next = document.getElementById("next");

scrollContainer.addEventListener("wheel",(evt) => {
    evt.preventDefault();
    scrollContainer.scrollLeft += evt.deltaY;
    scrollContainer.style.scrollBehavior = "auto";
});

next.addEventListener("click", ()=>{
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft +=900;
});

previus.addEventListener("click", ()=>{
    scrollContainer.scrollLeft -=900;
});