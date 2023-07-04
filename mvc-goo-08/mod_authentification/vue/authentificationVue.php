<?php
class AuthentificationVue{

    private $parametre = [];
    private $tpl;

    public function __construct($parametre){
        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }
    public function genererAffichage($valeurs){

        $this->tpl->assign('titreVue', 'GOURMANDISE SARL');

        $this->tpl->assign('action', 'authentifier');

        $this->tpl->assign('unvendeur', $valeurs);

        $this->tpl->display('mod_authentification/vue/authentificationVue.tpl');
    }

}