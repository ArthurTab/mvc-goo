<?php

/*
 * Routeur de la classe Accueil
 */

class accueil{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oControleur; //Propriété de type objet

    public function __construct($parametre){
        $this ->parametre = $parametre;
        //Chargement / appel du controleur
        require_once 'mod_accueil/controleur/accueilControleur.php';
        //Il faut bien renseigner TOUT ce chemin à chaque fois car faut pas oublier qu'on part d'index qui est maitre de tout
        $this->oControleur = new accueilControleur($this ->parametre);
    }

}
