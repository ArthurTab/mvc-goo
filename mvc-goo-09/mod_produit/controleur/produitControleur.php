<?php

class produitControleur
{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oModele; //Propriété de type objet
    private $oVue; //Propriété de type objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        //Chargement / appel du controleur

        //Création d'un objet, instance de la classe ClientModele
        $this->oModele = new produitModele($this->parametre);
        // Pas besoin de ça on a l'autoloader : require_once 'mod_accueil/vue/accueilVue.php';
        $this->oVue = new produitVue($this->parametre);

    }

    public function lister()
    {

        $listeProduits = $this->oModele->getListeProduits();

        $this->oVue->genererAffichageListeProduits($listeProduits);

    }

    public function form_consulter()
    {
        $unProduit = $this->oModele->getUnProduit();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function form_ajouter()
    {
        $prepareProduit = new produitTable();
        $this->oVue->genererAffichageFiche($prepareProduit);

    }

    public function form_supprimer()
    {
        $unProduit = $this->oModele->getUnProduit();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function form_modifier()
    {
        $unProduit = $this->oModele->getUnProduit();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function ajouter()
    {
        $controleProduit = new produitTable($this->parametre);
        if ($controleProduit->getAutorisationBD() == false) {

            $this->oVue->genererAffichageFiche($controleProduit);

        } else {

            $this->oModele->addProduit($controleProduit);

        }
    }

    public function supprimer()
    {
        $suppClient = new produitTable($this->parametre);

        $this->oModele->delProduit($suppClient);
    }

    public function modifier()
    {
        $modifProduit = new produitTable($this->parametre);

        $this->oModele->upProduit($modifProduit);
    }
}
