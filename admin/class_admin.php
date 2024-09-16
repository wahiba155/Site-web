<?php
class Admin {
    private $idAdmin;
    private $avatar;
    private $nom;
    private $prenom;
    private $email;
    private $userName;
    private $password;

    // Constructeur
    public function __construct($idAdmin, $avatar, $nom, $prenom, $email, $userName, $password) {
        $this->idAdmin = $idAdmin;
        $this->avatar = $avatar;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->userName = $userName;
        $this->password = $password;
    }

    // Getter et Setter pour chaque champ

    public function getIdAdmin() {
        return $this->idAdmin;
    }

    public function setIdAdmin($idAdmin) {
        $this->idAdmin = $idAdmin;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}
?>