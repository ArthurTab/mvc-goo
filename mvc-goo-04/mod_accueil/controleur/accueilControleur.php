<?php

/*
 * Controleur du module accueil
 */

class accueilControleur{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oVue; //Propriété de type objet

    public function __construct($parametre){

        $this ->parametre = $parametre;
        //Chargement / appel du controleur
        // Pas besoin de ça on a l'autoloader : require_once 'mod_accueil/vue/accueilVue.php';
        $this->oVue = new accueilVue($this ->parametre);

    }

    public function lister(){

        $this->oVue->genererAffichageListe(); //Dans accueilVue.php

    }

}