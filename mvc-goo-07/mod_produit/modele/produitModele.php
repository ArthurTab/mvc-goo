<?php

class produitModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

    }

    public function getListeProduits()
    {
        $sql = "SELECT reference, designation, prix_unitaire_HT, stock FROM produit";
        $idRequete = $this->executeRequete($sql); //Résultat de la requête ci dessus

        if ($idRequete->rowCount() > 0) { //SI on a + de 0 résultat, on extrait les données ligne par ligne

            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeProduits[] = new produitTable($row);
            }
            return $listeProduits;

        } else {
            return null;
        }
    }


    public function getUnProduit()
    {

        $sql = "SELECT reference, designation, quantite, descriptif, prix_unitaire_HT, stock, poids_piece FROM produit WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['reference']]);
        return new produitTable($idRequete->fetch(PDO::FETCH_ASSOC));

    }

    public function addProduit(produitTable $valeurs) //Instance de produit table
    {

        //Requête de type INSERT PREPAREE
        $sql = "INSERT INTO produit (designation, stock, descriptif, prix_unitaire_HT, poids_piece, quantite) VALUES (?, ?, ?, ?, ?, ?)";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getDesignation(),
            $valeurs->getStock(),
            $valeurs->getDescriptif(),
            $valeurs->getTarifHT(),
            $valeurs->getPoidsPiece(),
            $valeurs->getQuantite(),
        ]);
        if ($idRequete) {
            produitTable::setMessageSucces('Le produit a été ajouté avec succès.');
        }

    }

    public function delProduit(produitTable $valeurs)
    {

        $sql = "DELETE FROM produit WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [$valeurs->getReference()]);
        if ($idRequete) {
            produitTable::setMessageErreur('Le produit ' . $valeurs->getDesignation() . ' a été supprimé.');
        }

    }

    public function upProduit(produitTable $valeurs)
    {
        $sql = "UPDATE produit SET designation = ?, descriptif = ?, prix_unitaire_HT = ?, stock = ?, poids_piece = ? WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getDesignation(),
            $valeurs->getDescriptif(),
            $valeurs->getTarifHT(),
            $valeurs->getStock(),
            $valeurs->getPoidsPiece(),
            $valeurs->getReference(),
        ]);
        if ($idRequete) {
            produitTable::setMessageSucces('Le produit ' . $valeurs->getDesignation() . ' a été modifié.');
        }
    }
}
