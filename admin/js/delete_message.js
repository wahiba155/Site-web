$(document).ready(function() {
    $('.delete').click(function() {
        var messageId = $(this).data('message-id');
        console.log(messageId); // Vérifiez que vous obtenez le bon messageId
        $('#confirmDelete').data('message-id', messageId);
    });

    $('#confirmDelete').click(function() {
        var messageId = $(this).data('message-id');
        console.log(messageId); // Vérifiez que vous récupérez correctement le messageId
        // Envoyez la requête AJAX pour supprimer le message correspondant
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success === "true") {
                        location.reload(true);
                        alert("Le message a été supprimé avec succès");
                    } else {
                        alert("Erreur lors de la suppression du message");
                    }
                } else {
                    console.error('Erreur de requête: ' + xhr.status);
                }
            }
        };

        xhr.open('GET', 'delete_message.php?message_id=' + messageId, true);
        xhr.send();
    });
});
