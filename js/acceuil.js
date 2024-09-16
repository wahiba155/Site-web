
var cart =[];

document.addEventListener('DOMContentLoaded', function () {
    cart = JSON.parse(localStorage.getItem('cart')) || [];
    displaycart();
  });

  function addtocart(a) {
    const existingProduct = cart.find((item) => item.id === product[a].id);
    if (existingProduct) {
      existingProduct.quantity++; // Augmenter la quantité du produit existant
    } else {
      cart.push({ ...product[a], quantity: 1 }); // Ajouter le produit avec une quantité de 1
    }
    updateCart();
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
 
  
  

function displaycart() {
    total = 0;
    document.getElementById('count').innerHTML = cart.length;
    if (cart.length == 0) {
      // Le panier est vide
      document.getElementById('cartItem').innerHTML = 'Votre carte est vide';
      document.getElementById('total').innerHTML =  0 + '.00 MAD';
    } else {
      document.getElementById('cartItem').innerHTML = cart
        .map((item, i) => {
          var { image, title, price, quantity } = item;
          total = total + price * quantity;
          document.getElementById('total').innerHTML =  total + '.00 MAD';
          return (
            `<div class='cart-item'>
               <div class='row-img'>
                 <img class='rowimg' src=${image}>
               </div>
               <div>
                 <p id="titre">${title}</p>
                 <h2> ${price}.00 MAD</h2>
               </div>
               <div class='quantity'>
                 <button class='increment' onclick='incrementQuantity(${i})'>+</button>
                 <span class='quantity-value'>${quantity}</span>
                 <button class='decrement' onclick='decrementQuantity(${i})'>-</button>
               </div>
               <i class='fa-solid fa-trash' id='delete' onclick='delElement(${i})'></i>
             </div>`
          );
        })
        .join('');
    }
  }