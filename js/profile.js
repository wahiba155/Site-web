

function affichecom() {

  
    var commande = document.querySelector('.table-hover');
    var titre = document.querySelector('.title');
  
    if (commande.style.display === 'none') {
      commande.style.display = 'block';
      titre.style.display = 'block';

    } else {
      commande.style.display = 'none';
      titre.style.display = 'none';

    }
  }
  function affichepro() {

  
    var box = document.querySelector('.box');
  
    if (box.style.display === 'none') {
      box.style.display = 'block';

    } else {
      box.style.display = 'none';

    }
  }
  
  
  