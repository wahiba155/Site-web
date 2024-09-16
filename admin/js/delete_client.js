
  $(document).ready(function() {
    $('.delete').click(function() {
        var clientId = $(this).data('client-id');
        console.log(clientId); // Vérifiez que vous obtenez le bon clientId
        $('#confirmDelete').data('client-id', clientId);
    });

    $('#confirmDelete').click(function() {
        var clientId = $(this).data('client-id');
        console.log(clientId); // Vérifiez que vous récupérez correctement le clientId
        // Envoyez la requête AJAX pour supprimer le client correspondant
        const xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4) {
                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        if (response.reponse === "true") {
                                            location.reload(true);
                                            alert("L'offre a été supprimé avec succès");
                                        }
                                    } else {
                                        console.error('Erreur de requête: ' + xhr.status);
                                    }
                                }
                            };

                            xhr.open('GET', 'delete_client.php?client_id=' + clientId, true);
                            xhr.send();
                    });
                });