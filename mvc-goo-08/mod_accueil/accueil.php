<?php

/*
 * Routeur de la classe Accueil
 */

class Accueil
{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oControleur; //Propriété de type objet

    public function __construct($parametre)
    {
        $this->parametre = $parametre;

        $this->oControleur = new accueilControleur($this->parametre);
    }

    public function choixAction()
    {

        if (isset($this->parametre['action'])) {

            switch ($this->parametre['action']) {

                case 'generer_stats' :
                    $this->oControleur->charts();
                    break;
            }

        } else {

            $this->oControleur->lister(); //A faire dans accueilControleur

        }


    }

}
