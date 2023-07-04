<?php


class profilVue
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

        $this->tpl->assign('login', $_SESSION['PrenomNom']);

        $this->tpl->assign('titreVue', 'Gourmandise SARL');

    }


    public function genererAffichageFicheUser($valeurs)
    {
        $this->chargementValeurs();
        switch ($this->parametre['action']) {
            case 'form_modifier':
            case 'modifier':
                $this->tpl->assign('titrePage', 'Modification du profil');

                $this->tpl->assign('action', 'modifier');

                $this->tpl->assign('unProfil', $valeurs);

//                $this->tpl->assign('CAGlobal', $valeurs);
                break;

            case 'modifMDP':
                $this->tpl->assign('titrePage', 'Modification du mot de passe');

                $this->tpl->assign('unProfil', $valeurs);

                $this->tpl->assign('action', 'modifier');

                break;

        }
        $this->tpl->display('mod_profil/vue/profilFicheVue.tpl');


    }


}
