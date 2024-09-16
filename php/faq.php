<?php include 'header.php';?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FAQs Section</title>
        <link rel="stylesheet" href="../css/faq.css">
        <link rel="stylesheet" href="../css/acceuil.css">
        <link rel="stylesheet" href="../css/page1.css">
        <link rel="stylesheet" href="../css/categorie.css">
        <link rel="stylesheet" href="../css/menu.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
       
        <section id="faq">
            <div class="faq-heading">
                <h3>FAQs</h3>
                <p>Améliorer notre conversation </p>
                - Peut de choses que nos clients aiment !
            </div>

            <div class="faq-content">
                <div class="faq-box-container">

                    <div class="faq-box">
                        <div class="faq-box-question">
                            <h4>POURQUOI COMMANDER SES PRODUITS DE PARAPHARMACIE EN LIGNE ?</h4>
                            <span class="faq-box-icon"></span>
                        </div>
                        <div class="faq-box-answer">
                            <p>Une large gamme de produits disponibles : Sur WEDY para, vous avez accès à une grande variété de produits de parapharmacie. 
                                Nous proposons des articles de soins de la peau, de soins capillaires, de soins bébé, d'hygiène et de bien-être, 
                                et bien plus encore. 
                                Tous nos produits sont à portée de clic et livrés partout au Maroc.</p>
                        </div>
                    </div>

                </div>

                <div class="faq-box-container">

                    <div class="faq-box">
                        <div class="faq-box-question">
                            <h4>LES PRODUITS VENDUT SONT-ILS CERTIFIÉS ?</h4>
                            <span class="faq-box-icon"></span>
                        </div>
                        <div class="faq-box-answer">
                            <p>WEDY para offre les mêmes produits que ceux disponibles dans les parapharmacies physiques au Maroc, 
                               tous issus strictement des réseaux de distribution officiels.
                               Nous garantissons l'absence totale de contrefaçons ou d'importations illégales !</p>
                        </div>
                    </div>

                </div>

                <div class="faq-box-container">

                    <div class="faq-box">
                        <div class="faq-box-question">
                            <h4>QUELS SONT LES FRAIS DE PAIYEMENT DE LIVRAISON AU MAROC ?</h4>
                            <span class="faq-box-icon"></span>
                        </div>
                        <div class="faq-box-answer">
                            <p>Pour Oujda, nous livrons généralement en 24/48 heures, 
                                et pour les autres villes, cela prend entre 48/72 heures ouvrables après la confirmation de la commande.
                                 De plus, nous offrons la livraison gratuite à partir de 200dh pour Oujda et 700dh pour les autres villes du Maroc. 
                                 Vous recevrez un email avec les détails de la livraison une fois que votre commande aura été expédiée.</p>
                        </div>
                    </div>

                </div>

                <div class="faq-box-container">

                    <div class="faq-box">
                        <div class="faq-box-question">
                            <h4>COMMENT PUIS-JE VOUS CONTACTER ?</h4>
                            <span class="faq-box-icon"></span>
                        </div>
                        <div class="faq-box-answer">
                            <p>Envoyez-nous un e-mail à wedy@gmail.com.
                                <br/>Comme vous pouvez appeler notre service  clientèle au +212 600990996
                                <br/>Suivez-nous sur INSTAGRAM, et FACEBOOK et envoyez-nous un message direct. <br/>
                                Nous sommes également là pour vous aider et partager des informations utiles.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script>
            var faq = document.getElementsByClassName("faq-box-question");
            var i;
            for(i = 0; i < faq.length; i++) {
                faq[i].addEventListener("click", function() {
                    this.classList.toggle("active");

                    var body = this.nextElementSibling;
                    if (body.style.maxHeight === "100px") {
                        body.style.maxHeight = "0";
                    } else {
                        body.style.maxHeight = "100px";
                    }
                });
            }
        </script>
           <?php include 'footer.php';?>


    </body>
</html>
