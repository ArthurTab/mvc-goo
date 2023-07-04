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

        $sql = "SELECT client.codec, client.nom, client.adresse, client.cp, client.ville, client.telephone, GROUP_CONCAT(mode_livraison.designation) AS designations FROM client JOIN client_mode ON client.codec = client_mode.codec JOIN mode_livraison ON mode_livraison.IDMode_livraison = client_mode.IDMode_livraison WHERE client.codec = ? GROUP BY client.codec, client.nom, client.adresse, client.cp, client.ville, client.telephone";
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
        if ($idRequete) {
            clientTable::setMessageSucces('Le client a été ajouté avec succès.');
        }

    }

    public function delClient(clientTable $valeurs)
    {

        $sql = "DELETE FROM client WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$valeurs->getCodec()]);
        if ($idRequete) {
            clientTable::setMessageErreur('Le client ' . $valeurs->getNom() . ' a été supprimé.');
        }

    }

    public function upClient(clientTable $valeurs)
    {
        $sql = "UPDATE client SET nom = ?, adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getNom(),
            $valeurs->getAdresse(),
            $valeurs->getCp(),
            $valeurs->getVille(),
            $valeurs->getTelephone(),
            $valeurs->getCodec(),
        ]);
        if ($idRequete) {
            clientTable::setMessageSucces('Le client ' . $valeurs->getNom() . ' a été modifié.');
        }
    }
}
