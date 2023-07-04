<?php

class profilControleur
{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oModele; //Propriété de type objet
    private $oVue; //Propriété de type objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
        //Chargement / appel du controleur

        //Création d'un objet, instance de la classe ClientModele
        $this->oModele = new profilModele($this->parametre);
        // Pas besoin de ça on a l'autoloader : require_once 'mod_accueil/vue/accueilVue.php';
        $this->oVue = new profilVue($this->parametre);

    }

    public function form_modifier()
    {
        $monProfil = $this->oModele->getProfilUser();
        $this->oVue->genererAffichageFicheUser($monProfil);
    }


    public function modifier()
    {
        $modifMonProfil = new profilTable($this->parametre);

        if ($modifMonProfil->getAutorisationBD() == false) {

            $this->oVue->genererAffichageFicheUser($modifMonProfil);

        } else {

                $this->oModele->upProfil($modifMonProfil);

            }


        }

}
