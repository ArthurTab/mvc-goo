<?php

/*
 * Role : routeur pour le client
 */

class client
{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oControleur; //Propriété de type objet

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        //Chargement / appel du controleur
        // Pas besoin de ça on a l'autoloader : require_once 'mod_accueil/controleur/accueilControleur.php';
        //Il faut bien renseigner TOUT ce chemin à chaque fois car faut pas oublier qu'on part d'index qui est maitre de tout
        $this->oControleur = new clientControleur($this->parametre);
    }

    public function choixAction()
    {

        //Ici a venir une structure alternative pour tester les différentes actions possibles (type switch)
        if (isset($this->parametre['action'])) {
            //Traitement des différentes actions
            switch ($this->parametre['action']) {

                case 'form_consulter' :
                    $this->oControleur->form_consulter();
                    break;

                default:
                    return "Impossible de passer ici. Erreur ! Contactez l'administrateur du système.";
            }
        } else {

            $this->oControleur->lister(); //A faire dans accueilControleur

        }
    }




}
