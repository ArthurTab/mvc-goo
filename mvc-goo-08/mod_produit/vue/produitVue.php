<?php


class produitVue
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

    public function genererAffichageListeProduits($valeurs)
    {

        $this->chargementValeurs();

        $this->tpl->assign('titreTable', 'Liste des produits');

        $this->tpl->assign('listeProduits', $valeurs);

        $this->tpl->display('mod_produit/vue/produitListeVue.tpl');

    }

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();
        switch ($this->parametre['action']) {
            case 'form_consulter':
                $this->tpl->assign('titrePage', 'Fiche Produit : Consultation');

                $this->tpl->assign('readonly', 'disabled');

                $this->tpl->assign('action', 'consulter');

                $this->tpl->assign('unProduit', $valeurs);

                break;
            case 'form_ajouter':
            case 'ajouter':
                $this->tpl->assign('titrePage', 'Fiche Produit : Ajout');

                $this->tpl->assign('readonly', '');

                $this->tpl->assign('action', 'ajouter');

                $this->tpl->assign('unProduit', $valeurs);
                break;

            case 'form_supprimer':
            case 'supprimer':
                $this->tpl->assign('titrePage', 'Fiche Produit : Suppression');

                $this->tpl->assign('readonly', '');

                $this->tpl->assign('action', 'supprimer');

                $this->tpl->assign('unProduit', $valeurs);
                break;

            case 'form_modifier':
            case 'modifier':
                $this->tpl->assign('titrePage', 'Fiche Produit : Modification');

                $this->tpl->assign('readonly', '');

                $this->tpl->assign('action', 'modifier');

                $this->tpl->assign('unProduit', $valeurs);
                break;

        }
        $this->tpl->display('mod_produit/vue/produitFicheVue.tpl');


    }


}
