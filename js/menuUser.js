var userMenu = document.getElementById('user-menu');
var userLink = document.getElementById('user-link');

userMenu.addEventListener('mouseenter', function() {
  userMenu.style.display = 'block';
});

userMenu.addEventListener('mouseleave', function() {
  userMenu.style.display = 'none';
});

userLink.addEventListener('click', function(event) {
  event.preventDefault();
  userMenu.style.display = 'block';
});