<?php

class loginControleur{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oModele; //Propriété de type objet
    private $oVue; //Propriété de type objet

    public function __construct($parametre){

        $this ->parametre = $parametre;
        //Chargement / appel du controleur

        $this->oModele = new loginModele();

        $this->oVue = new loginVue($this ->parametre);



    }
}
