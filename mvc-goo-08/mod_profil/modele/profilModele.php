<?php

class profilModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

    }


    public function getProfilUser()
    {

        $sql = "SELECT SUM(total_ht) AS total_ht, vendeur.codev, vendeur.nom, vendeur.prenom, vendeur.adresse, vendeur.cp, vendeur.ville, vendeur.telephone, vendeur.login, vendeur.motdepasse FROM vendeur, commande WHERE commande.codev = vendeur.codev AND vendeur.codev = ?";
        $idRequete = $this->executeRequete($sql, [$_SESSION['codev']]);
        return new profilTable($idRequete->fetch(PDO::FETCH_ASSOC));

    }


    public function upProfil(profilTable $valeurs)
    {
        $sql = "UPDATE vendeur SET nom = ?, prenom = ?, adresse = ?, cp = ?, ville = ?, telephone = ?, motdepasse = ? WHERE codev = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getNom(),
            $valeurs->getPrenom(),
            $valeurs->getAdresse(),
            $valeurs->getCp(),
            $valeurs->getVille(),
            $valeurs->getTelephone(),
            $valeurs->getMotdepasse(),
            $valeurs->getCodev(),
        ]);
        if ($idRequete) {
            profilTable::setMessageSucces('Mr/Mme. ' . $valeurs->getPrenom() . ' ' . $valeurs->getNom() . ', votre profil a bien été modifié.');
        }
    }

    public function CAGlobal(){
        $sql = "SELECT SUM(total_ht) AS total_ht FROM commande WHERE codev = ?";
        $idRequete = $this->executeRequete($sql, [$_SESSION['codev']]);
        return new profilTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }
}
