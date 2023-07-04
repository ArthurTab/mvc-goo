<?php

class clientControleur
{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oModele; //Propriété de type objet
    private $oVue; //Propriété de type objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        //Chargement / appel du controleur

        //Création d'un objet, instance de la classe ClientModele
        $this->oModele = new clientModele($this->parametre);
        // Pas besoin de ça on a l'autoloader : require_once 'mod_accueil/vue/accueilVue.php';
        $this->oVue = new clientVue($this->parametre);

    }

    public function lister()
    {

        $listeClients = $this->oModele->getListeClients();

        $this->oVue->genererAffichageListeClients($listeClients);

    }

    public function form_consulter()
    {
        $unClient = $this->oModele->getUnClient();
        $this->oVue->genererAffichageFiche($unClient);
    }

    public function form_ajouter()
    {
        $prepareClient = new clientTable();
        $this->oVue->genererAffichageFiche($prepareClient);

    }

    public function form_supprimer()
    {
        $unClient = $this->oModele->getUnClient();
        $this->oVue->genererAffichageFiche($unClient);
    }

    public function form_modifier()
    {
        $unClient = $this->oModele->getUnClient();
        $this->oVue->genererAffichageFiche($unClient);
    }

    public function ajouter()
    {
        $controleClient = new clientTable($this->parametre);

        if ($controleClient->getAutorisationBD() == false) {

            $this->oVue->genererAffichageFiche($controleClient);

        } else {

            $this->oModele->addClient($controleClient);

        }
    }

    public function supprimer()
    {
        $suppClient = new clientTable($this->parametre);
        if ($this->oModele->controlSupp($suppClient)==false){
            $this->oModele->delClient($suppClient);
            $this->lister();
        }else{
            $this->oVue->genererAffichageFiche($suppClient);
        }
    }

    public function modifier()
    {
        $modifClient = new clientTable($this->parametre);
        if ($modifClient->getAutorisationBD()==false){
            $this->oVue->genererAffichageFiche($modifClient);
        } else {
            $this->oModele->upClient($modifClient);
        }
    }
}
