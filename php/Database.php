<?php

class Database
{
    private $servername;
    private $username;
    private $password;
    private $database;

    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect()
    {
        try {
            // Crée une nouvelle instance de la classe PDO pour la connexion à la base de données
            $bdd = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);

            // Configure le mode d'erreur pour lancer une exception en cas d'erreur
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $bdd; // Retourne l'objet PDO pour la connexion réussie
        } catch (PDOException $e) {
            // Capture et affiche les éventuelles erreurs de connexion
            echo "Erreur : " . $e->getMessage();
            return null; // Retourne null en cas d'échec de connexion
        }
    }
}
?>