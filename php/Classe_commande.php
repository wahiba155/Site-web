<?php
class Commande {
    private $id_commande;
    private $image;
    private $titre;
    private $prix;
    private $quantite;
    private $date_commande;
    private $categorie;
    private $id_client;

    public function __construct($id_commande, $image, $titre, $prix, $quantite, $date_commande, $categorie, $id_client) {
        $this->id_commande = $id_commande;
        $this->image = $image;
        $this->titre = $titre;
        $this->prix = $prix;
        $this->quantite = $quantite;
        $this->date_commande = $date_commande;
        $this->categorie = $categorie;
        $this->id_client = $id_client;
    }
   

    public function getIdCommande() {
        return $this->id_commande;
    }

    public function getImage() {
        return $this->image;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getDateCommande() {
        return $this->date_commande;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getIdClient() {
        return $this->id_client;
    }
}
?>