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

}
