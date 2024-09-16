$(document).ready(function() {
    $('.delete').click(function() {
        var commandeId = $(this).data('commande-id');
        console.log(commandeId); // Vérifiez que vous obtenez le bon commandeId
        $('#confirmDelete').data('commande-id', commandeId);
    });

    $('#confirmDelete').click(function() {
        var commandeId = $(this).data('commande-id');
        console.log(commandeId); // Vérifiez que vous récupérez correctement le commandeId
        // Envoyez la requête AJAX pour supprimer la commande correspondante
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success === "true") {
                        location.reload(true);
                        alert("La commande a été supprimée avec succès");
                    } else {
                        alert("Erreur lors de la suppression de la commande");
                    }
                } else {
                    console.error('Erreur de requête: ' + xhr.status);
                }
            }
        };

        xhr.open('GET', 'delete_demande.php?commande_id=' + commandeId, true);
        xhr.send();
    });
});
