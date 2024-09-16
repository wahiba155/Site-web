<!--DOCTYPE html-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==Title============================-->
    <title>BIODERMA PIGMENTBIO DAILY CARE SPF 50 40ML</title>
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
                <img src="../site/visage/pg1.jpg" />
            </div>
            <!--**2******-->
            <div class="swiper-slide">
                <img src="../site/visage/pg2.jpg" />
            </div>
            <!--**3******-->
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
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <!--**Text************************-->
        <div class="product-text">
            <!--category-->
            <span class="product-category">Visage soin</span>
            <h3>Pigmentbio Daily Care</h3>
            <span class="product-price">130MAD</span>
            <p>Pigmentbio Daily care SPF 50+, est une crème de jour anti-tâches. 
                Elle atténue et évite l'apparition de taches brunes sur votre visage.
                Ce soin éclaircit et unifie le teint jour après jour. 
                Ses jolis pigments nacrés révèlent instantanément l'éclat de votre teint. La Vitamine B3 hydrate la peau intensément. 
                La Vitamine E puissant antioxydant, protège de la pollution et du stress oxydatif. 
                
            </p>
            <!--size-->
            <!--btn-->
            <div class="product-button">
              <script>
                const product = [


   
    
{
  id: 2,
  image: '../site/visage/4.jpg',
  title: 'zone-intime',
  price: 130,
  desc:'Bioderma Pigmentbio Zones Sensibles Teint Unifié Et Éclairci Même Pour Les Zones Les Plus Délicates -75ml',
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
 