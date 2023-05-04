<?php

class clientVue
{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $tpl; //Propriété de type objet Smarty (=template)

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    public function chargementValeurs()
    {

        $this->tpl->assign('deconnexion', 'Déconnexion');

        $this->tpl->assign('login', 'Ici le nom de l\'utilisateur connecté');

        $this->tpl->assign('titreVue', 'Gourmandise SARL');

    }

    public function genererAffichageListeClients($valeurs)
    {

        $this->chargementValeurs();

        $this->tpl->assign('titreTable', 'Liste des clients');

        $this->tpl->assign('listeClients', $valeurs);

        $this->tpl->display('mod_client/vue/clientListeVue.tpl');

    }

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();
        switch ($this->parametre['action']) {
            case 'form_consulter':
                $this->tpl->assign('titrePage', 'Fiche Client : Consultation');

                $this->tpl->assign('readonly', 'disabled');

                $this->tpl->assign('action', 'consulter');

                $this->tpl->assign('unClient', $valeurs);

                break;
            case 'form_ajouter':
            case 'ajouter':
                $this->tpl->assign('titrePage', 'Fiche Client : Ajout');

                $this->tpl->assign('readonly', '');

                $this->tpl->assign('action', 'ajouter');

                $this->tpl->assign('unClient', $valeurs);
                break;
        }
        $this->tpl->display('mod_client/vue/clientFicheVue.tpl');


    }


}
