<?php

class clientVue{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $tpl; //Propriété de type objet Smarty (=template)

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    public function chargementValeurs(){

        $this->tpl->assign('deconnexion', 'Déconnexion');

        $this->tpl->assign('login', 'Ici le nom de l\'utilisateur connecté');

        $this->tpl->assign('titreVue', 'Gourmandise SARL');

    }

    public function genererAffichageListeClients($valeurs){

        $this->chargementValeurs();

        $this->tpl->assign('titreTable', 'Liste des clients');

        $this->tpl->assign('listeClients', $valeurs);

        $this->tpl->display('mod_client/vue/clientListeVue.tpl');

    }

    public function genererAffichageFiche($valeurs){
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Fiche Client : Consultation');
        $this->tpl->assign('unClient', $valeurs);
        $this->tpl->display('mod_client/vue/clientFicheVue.tpl');
    }




}
