<?php

/*
 * Modèle du module accueil
 */

class accueilModele extends Modele{

    private $parametre = array();

    function __construct($parametre){

        $this->parametre = $parametre;

    }

    public function caMois(){
        $sql = "SELECT DISTINCT MONTH(date_livraison) AS LaDate, SUM(total_ht) AS total_ht FROM commande WHERE codev = ? GROUP BY LaDate";
        $idRequete = $this->executeRequete($sql, [$_SESSION['codev']]);
        return $idRequete->fetchall(PDO::FETCH_ASSOC);
    }

}