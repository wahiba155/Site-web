$(document).ready(function() {
    // Lorsque l'icône d'édition est cliquée
    $('.edit').click(function() {
        // Récupérer le nom du produit à partir de l'attribut "data-nom-produit"
        var nomProduit = $(this).data('nom-produit');
        // Mettre à jour la valeur de l'input "nom_produit" dans le formulaire
        $('input[name="nom_produit"]').val(nomProduit);
        // Mettre à jour l'attribut "action" du formulaire avec le nom du produit
        $('form').attr('action', 'modify_product.php');
    });
});