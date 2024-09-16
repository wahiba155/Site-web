var cart =[];



document.addEventListener('DOMContentLoaded', function () {
    cart = JSON.parse(localStorage.getItem('cart')) || [];
        displaycart();
});



function addtocart(a) {
  isLoggedOut()
    .then(function (loggedOut) {
      if (loggedOut) {
        alert("Vous devez vous connecter pour ajouter des articles au panier.");
        window.location.href = 'se_connecter.php';
      } else {
        if (Number.isInteger(a) && a >= 0 && a < product.length) {
          const existingProduct = cart.find((item) => item.id === product[a].id);

          if (existingProduct) {
            existingProduct.quantity++; // Augmenter la quantité du produit existant
          } else {
            cart.push({ ...product[a], quantity: 1 }); // Ajouter le produit avec une quantité de 1
          }
          updateCart();
        } else {
          console.log("L'indice du produit est invalide");
          console.log(a);

        }
      }
    })
    .catch(function (error) {
      console.error(error);
    });
}


function isLoggedOut() {
  return new Promise(function(resolve, reject) {
      // Effectuer une requête AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '../php/connection.php', true);
      xhr.setRequestHeader('Content-Type', 'application/json');

      xhr.onload = function() {
          if (xhr.status === 200) {
              try {
                  var response = JSON.parse(xhr.responseText);
                  console.log(response); // Afficher la réponse dans la console
                  resolve(response.is_logged_in === false);
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
  

function incrementQuantity(a) {
  cart[a].quantity++; // Augmenter la quantité du produit
  updateCart();
}

 


  
  function decrementQuantity(a) {
    if (cart[a].quantity > 0) {
      cart[a].quantity--; // Diminuer la quantité du produit (si elle est supérieure à 1)
      updateCart();
    }
    if(cart[a].quantity==0)
    {
        delElement(a); 
        
    }
  }

function delElement(a){
  cart.splice(a, 1);
  updateCart();
}
function updateCart() {
    localStorage.setItem('cart',JSON.stringify(cart));
    displaycart();

}

function showSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.style.display = 'block';
    displaycart(); // Appeler la fonction displaycart() pour afficher la carte
  }
  const closeButton = document.getElementById('close');

  closeButton.addEventListener('click', () => {
    const sidebar = document.getElementById('sidebar');
    sidebar.style.display = 'none';
    
});


  
  // Ajoutez cette fonction pour gérer la validation de la carte


function displaycart() {
    total = 0;
    document.getElementById('count').innerHTML = cart.length;
    if (cart.length == 0) {
    
      document.getElementById('cartItem').innerHTML = 'Votre carte est vide';
      document.getElementById('total').innerHTML =  0 + '.00 MAD';
    } else {
      document.getElementById('cartItem').innerHTML = cart
        .map((item,i) => {
          var { image, title, price, quantity } = item;
          total = total + price * quantity;
          document.getElementById('total').innerHTML =  total + '.00 MAD';
          return (
            `<div class='cart-item' id='cart-tem-${i}'>
               <div class='row-img'>
                 <img class='rowimg' src=${image}>
               </div>
               <div id="title1">
                 <p id="titree">${title}</p>
                 <h2> ${price}.00 MAD</h2>
               </div>
               <div class='quantity'>
                 <button class='increment' onclick='incrementQuantity(${i})'>+</button>
                 <span class='quantity-value'>${quantity}</span>
                 <button class='decrement' onclick='decrementQuantity(${i})'>-</button>
               </div>
               <svg xmlns="http://www.w3.org/2000/svg"  id='delete' onclick='delElement(${i})'width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
               </svg>

              
             </div>`
          );
        })
        .join('');
    }

  }
  
  
  function enregistrerProduits() {
    const produitsSelectionnes = cart.filter(item => item.quantity > 0); // Filtrer les produits ayant une quantité supérieure à zéro
    const produitsData = produitsSelectionnes.map(item => {
      return {
        id : item.id,
        image: item.image,
        title: item.title,
        price: item.price,
        quantity: item.quantity
      };
    });
  
    // Envoi des données au serveur via une requête AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/panier.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    const response = JSON.parse(xhr.responseText);
    if (response.message=='Veuillez vous connecter pour valider la commande !') {
    alert(response.message);
    window.location.href = 'se_connecter.php';
    }
    else{    alert(response.message);
      window.location.href = '../php/facture.php';
      cart = [];
      // Mettre à jour l'affichage du panier
      displaycart();
      updateCart();

      // Mettre à jour l'affichage de la liste des favoris
      displaycoeur();
      updatecoeur();
    }
    } else {
    console.log('Erreur lors de la requête AJAX : ' + xhr.status);
    }
    }
    };
    
    xhr.send(JSON.stringify(produitsData));
    } 

    var coeur =[];



document.addEventListener('DOMContentLoaded', function () {
    coeur = JSON.parse(localStorage.getItem('coeur')) || [];
        displaycoeur();
});




function addtocoeur(a) {
  const productToAdd = product[a];
  var heartIcon = document.getElementById(`heartIcon${a}`);
  heartIcon.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
    </svg>
  `;
  
  // Vérifier si le produit existe déjà dans les favoris
  const isProductExists = coeur.some((item) => item.id === productToAdd.id);
  if (isProductExists) {
    return; // Arrêter la fonction si le produit existe déjà dans les favoris
  }
  
  coeur.push(productToAdd);
  updatecoeur();
}



function delElementc(a) {
  const index = a; // Utiliser directement la valeur de 'a' comme index
  if (index >= 0 && index < coeur.length) {
    coeur.splice(index, 1);
    updatecoeur();
  }
}
function updatecoeur() {
    localStorage.setItem('coeur',JSON.stringify(coeur));
    displaycoeur();

}

function showSidebarc() {
    const sidebarc = document.getElementById('sidebarc');
    sidebarc.style.display = 'block';
    displaycoeur(); // Appeler la fonction displaycart() pour afficher la carte
  }
  const closeButtonc = document.getElementById('close2');

  closeButtonc.addEventListener('click', () => {
    const sidebarc = document.getElementById('sidebarc');
    sidebarc.style.display = 'none';
    
});


  
  // Ajoutez cette fonction pour gérer la validation de la carte


  function displaycoeur() {
    document.getElementById('countc').innerHTML = coeur.length;
  
    if (coeur.length === 0) {
      document.getElementById('cartItemc').innerHTML = 'Aucun produit ajouté à la liste de souhaits';
    } else {
      document.getElementById('cartItemc').innerHTML = coeur
        .map((item, i) => {
          const { id, image, title } = item || {}; // Vérifier si item est défini ou utilise un objet vide par défaut
  
          return (
            `<div class='cart-itemc' id='cart-tem-${i}'>
               <div class='row-imgc'>
                 <img class='rowimgc' src=${image || ''}> <!-- Utiliser une chaîne vide si image est nulle ou indéfinie -->
               </div>
               <div id="title">
                 <p id="titree">${title}</p>
               </div>
               <svg xmlns="http://www.w3.org/2000/svg" id='add' onclick='addProductToCart(${id})' width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
               <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
               <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
               </svg>/<svg xmlns="http://www.w3.org/2000/svg" id='delete' onclick='delElementc(${i})' width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
               <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
               <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                </svg>
               
               
            </div>`
          );
        })
        .join('');
    }
  }
  function addProductToCart(productId) {
    isLoggedOut()
      .then(function (loggedOut) {
        if (loggedOut) {
          alert("Vous devez vous connecter pour ajouter des articles au panier.");
          window.location.href = 'se_connecter.php';
        } else {
          const product = coeur.find((item) => item.id === productId);
  
          if (product) {
            const { id, title, price, image } = product;
            const existingProduct = cart.find((item) => item.id === id);
  
            if (existingProduct) {
              existingProduct.quantity += 1;
            } else {
              cart.push({
                id,
                title,
                price,
                image,
                quantity: 1
              });
            }
  
            // Supprimer le produit de la liste des favoris
            removeFromFavorites(productId);
  
            // Décrémenter l'élément countc
            document.getElementById('countc').innerHTML--;
  
            // Mettre à jour l'affichage du panier
            displaycart();
  
            // Mettre à jour l'affichage de la liste des favoris
            displaycoeur();
  
            // Mettre à jour le stockage local pour le panier et les favoris
            updateCart();
            updatecoeur();
          }
        }
      });
  }
  function removeFromFavorites(productId) {
    coeur = coeur.filter((item) => item.id !== productId);
  
    // Mettre à jour l'affichage de la liste des favoris
    displaycoeur();
  
    // Mettre à jour le stockage local pour le panier et les favoris
    updatecoeur();
}