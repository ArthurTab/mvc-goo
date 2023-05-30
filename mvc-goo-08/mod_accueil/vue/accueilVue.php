<?php

/*
 * Vu du module accueil
 */

class accueilVue{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $tpl; //Propriété de type objet Smarty (=template)

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    public function genererAffichageListe(){

        $this->tpl->assign('deconnexion', 'Déconnexion');

        $this->tpl->assign('login', $_SESSION['PrenomNom']);

        $this->tpl->assign('tabBord', 'Ici le tableau de bord');


        //$titrePrincipal = "GOURMANDISE SARL";
        //require_once 'mod_accueil/vue/vue.php';
        //
        // On n'utilise pas ceci, on va utiliser smarty :

        $this->tpl->display('mod_accueil/vue/accueilVue.tpl');

    }

    public function genererCaMois($parametre)
    {
        echo json_encode($parametre);
        exit();
    }

}