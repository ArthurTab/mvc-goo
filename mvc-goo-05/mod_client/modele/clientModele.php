<?php

class clientModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

    }

    public function getListeClients()
    {
        $sql = "SELECT * FROM client";
        $idRequete = $this->executeRequete($sql); //Résultat de la requête ci dessus

        if ($idRequete->rowCount() > 0) { //SI on a + de 0 résultat, on extrait les données ligne par ligne

            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeClients[] = new clientTable($row);
            }
            return $listeClients;

        } else {
            return null;
        }
    }


    public function getUnClient()
    {

        $sql = "SELECT * FROM client WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);
        return new clientTable($idRequete->fetch(PDO::FETCH_ASSOC));

    }

    public function addClient(clientTable $valeurs) //Instance de client table
    {

        //Requête de type INSERT PREPAREE
        $sql = "INSERT INTO client (nom, adresse, ville, cp, telephone) VALUES (?, ?, ?, ?, ?)";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getNom(),
            $valeurs->getAdresse(),
            $valeurs->getVille(),
            $valeurs->getCp(),
            $valeurs->getTelephone(),
        ]);
        if ($idRequete){
            clientTable::setMessageSucces('Le client a été ajouté avec succès.');
        }

    }
}
