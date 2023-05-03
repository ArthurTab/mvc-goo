<?php

/*
 * Vu du module accueil
 */

class accueilVue{

    private $parametre = []; //Tableau qui est égal à $_REQUEST

    public function __construct($parametre){

        $this ->parametre = $parametre;
        //Chargement / appel du controleur
        $titrePrincipal = "GOURMANDISE SARL";
        require_once 'mod_accueil/vue/vue.php'; //Ca ouvre vue.php qui est tout notre html, en lui passant titrePrincipal dcp

    }

}