 <?php

class Client {
    
    private $nomComplet;
    private $telephone;
    private $adresse;
    private $user;
    private $mot_passe;
    private $Date_naissance;
    private $email;
    private $image;
    
    // Constructeur
    public function __construct($nomComplet, $telephone, $adresse, $user, $mot_passe, $Date_naissance, $email, $image) {
        $this->nomComplet = $nomComplet;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->user = $user;
        $this->mot_passe = $mot_passe;
        $this->Date_naissance = $Date_naissance;
        $this->email = $email;
        $this->image = $image;
    }
    
    // Méthodes pour accéder aux attributs (getters)
    public function getNomComplet() {
        return $this->nomComplet;
    }
    
    public function getTelephone() {
        return $this->telephone;
    }
    
    public function getAdresse() {
        return $this->adresse;
    }
    
    public function getUser() {
        return $this->user;
    }
    
    public function getMotPasse() {
        return $this->mot_passe;
    }
    
    public function getDateNaissance() {
        return $this->Date_naissance;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    // Méthodes pour définir les attributs (setters)
    public function setNomComplet($nomComplet) {
        $this->nomComplet = $nomComplet;
    }
    
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
    
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
    
    public function setUser($user) {
        $this->user = $user;
    }
    
    public function setMotPasse($mot_passe) {
        $this->mot_passe = $mot_passe;
    }
    
    public function setDateNaissance($Date_naissance) {
        $this->Date_naissance = $Date_naissance;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
}
?>
