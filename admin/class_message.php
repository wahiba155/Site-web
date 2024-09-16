<?php
class Message {
    private $id_message;
    private $email;
    private $id_client;
    private $nom_complet;
    private $sujet;
    private $message;

    public function __construct($id_message, $email, $id_client, $nom_complet, $sujet, $message) {
        $this->id_message = $id_message;
        $this->email = $email;
        $this->id_client = $id_client;
        $this->nom_complet = $nom_complet;
        $this->sujet = $sujet;
        $this->message = $message;
    }
    
    public function getIdMessage() {
        return $this->id_message;
    }
    
    public function setIdMessage($id_message) {
        $this->id_message = $id_message;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getIdClient() {
        return $this->id_client;
    }
    
    public function setIdClient($id_client) {
        $this->id_client = $id_client;
    }
    
    public function getNomComplet() {
        return $this->nom_complet;
    }
    
    public function setNomComplet($nom_complet) {
        $this->nom_complet = $nom_complet;
    }
    
    public function getSujet() {
        return $this->sujet;
    }
    
    public function setSujet($sujet) {
        $this->sujet = $sujet;
    }
    
    public function getMessage() {
        return $this->message;
    }
    
    public function setMessage($message) {
        $this->message = $message;
    }
}
?>