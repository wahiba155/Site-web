<?php
class Facture {
    private $num_facture;
    private $id_client;
    private $montant_total;

    public function __construct($num_facture, $id_client, $montant_total) {
        $this->num_facture = $num_facture;
        $this->id_client = $id_client;
        $this->montant_total = $montant_total;
    }

    public function getNumFacture() {
        return $this->num_facture;
    }

    public function getIdClient() {
        return $this->id_client;
    }

    public function getMontantTotal() {
        return $this->montant_total;
    }

    public function setNumFacture($num_facture) {
        $this->num_facture = $num_facture;
    }

    public function setIdClient($id_client) {
        $this->id_client = $id_client;
    }

    public function setMontantTotal($montant_total) {
        $this->montant_total = $montant_total;
    }
}
?>