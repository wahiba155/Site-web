<?php

include('class_message.php');
include('etablissement.php');

$sql = "SELECT id_message, email, id_client, nom_complet, sujet, message FROM message";
$resultMess = $conn->query($sql);

if ($resultMess->num_rows > 0) {
    while($rowmss = $resultMess->fetch_assoc()) {
        $idMessage = $rowmss['id_message'];
        $email = $rowmss['email'];
        $idClient = $rowmss['id_client'];
        $nomComplet = $rowmss['nom_complet'];
        $sujet = $rowmss['sujet'];
        $messageText = $rowmss['message'];

        // Créer une instance de la classe Message avec les données récupérées
        $message = new Message($idMessage, $email, $idClient, $nomComplet, $sujet, $messageText);
    }

} else {
    echo "erreur de recuperation de la table message";
}
?>