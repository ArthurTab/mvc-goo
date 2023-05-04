<?php

class clientModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre){

        $this->parametre = $parametre;

    }

    public function getListeClients()
    {
        $sql = "SELECT * FROM client";
        $idRequete = $this->executeRequete($sql); //Résultat de la requête ci dessus

        if ($idRequete->rowCount()>0){ //SI on a + de 0 résultat, on extrait les données ligne par ligne

            while($row = $idRequete->fetch(PDO::FETCH_ASSOC)){
                $listeClients[] = new clientTable($row);
            }
            return $listeClients;

        }else{
            return null;
        }
    }


    public function getUnClient()
    {
        $sql = "SELECT * FROM client WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);
        return new clientTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }

}
