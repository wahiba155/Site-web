<!--DOCTYPE html-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==Title============================-->
    <title>Uriage Crème Gommante Corps 200ml</title>
    <link href="../css/acceuil.css" rel="stylesheet">
<link href="../css/spray.css" rel="stylesheet">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="../css/categorie.css">
<link rel="stylesheet" href="../css/page1.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<script src="../js/direction.js"></script>
</head>
<body>
    <?php
      include('header.php');
       include 'carte.php';
       include 'coeur.php';
    ?>
    <!--==Product-Page=================================-->
    <section id="product-page">
    <div class="product-details">
        <!--**Img*************************-->
        <div class="product-img">

        <!-- Swiper Slider -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            
            <!--**1******-->
            <div class="swiper-slide">
                <img src="../site/body/ur.jpeg" />
            </div>
            <!--**2******-->
            <div class="swiper-slide">
                <img src="../site/body/ur.jpeg" />
            </div>
            <!--**3******-->
            
            <!--**4******-->
            

            </div>

            <!--btns-->
            <div class="slider-btns">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>


            <!--social-->
            <div class="img-social-bar">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/wedy_para?igsh=MTRpeXgxNXY2N3Fuaw=="><i class="fa-brands fa-instagram"></i></a>
                <a href="https://wa.me/212600990996"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <!--**Text************************-->
        <div class="product-text">
            <!--category-->
            <span class="product-category">Corps soin</span>
            <h3>CREME GOMMANTE</h3>
            <span class="product-price">100MAD</span>
            <p>CREME GOMMANTE DOUCE

                Ce soin ultra-doux, 2 en 1, gomme et nettoie délicatement la peau sans l'agresser et permet de retrouver une peau nette, éclatante et d'une douceur extrême.
            </br>
                Exfolie en douceur
                
                Composition
                Principes actifs</br>
                
                Eau Thermale d'Uriage</br>
                Base lavante douce sans savon</br>
                
                
              
                
                
            </p>
            <!--size-->
            <!--btn-->
            <div class="product-button">
              <script>
                const product = [

{
  id: 135,
  image: '../site/body/gommage.jpg',
  title: 'gommage',
  price: 188,
  desc:'Glycolic Gommage Extreme Renewal Masque facial pour peau radieuse - Acide glycolique',
  quantity: 0,

}


    
];
              </script>
            <script src="../js/desc.js"></script>

            </div>
            <!--help-btn-->
            <a href="#" class="help-btn">Besoin d'aide?</a>
        </div>
    </div>
    </section>

    <!--==Jquery===========================-->
    <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      450: {
        slidesPerView: 2,
        spaceBetween: 0,
      },
      820: {
        slidesPerView: 1,
        spaceBetween: 0,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween:0,
      },
    },
  });


  $('.s-checkbox').on('change', function() {
        $('.s-checkbox').not(this).prop('checked', false);  
    });
    </script>

    <?php
      include('footer.php');
    ?>   
</body>
</html>