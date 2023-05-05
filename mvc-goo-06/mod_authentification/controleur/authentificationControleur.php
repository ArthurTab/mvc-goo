<?php

class AuthentificationControleur{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $oModele; //Propriété de type objet
    private $oVue; //Propriété de type objet

    public function __construct($parametre){

        $this ->parametre = $parametre;
        //Chargement / appel du controleur

        $this->oModele = new AuthentificationModele($this ->parametre);

        $this->oVue = new AuthentificationVue($this ->parametre);

    }

    public function form_authentifier(){
        $prepareAuthentification = new AuthentificationTable($this->parametre);
        $this->oVue->genererAffichage($prepareAuthentification);
    }

    public function authentifier(){

        $controleAuthentification = new AuthentificationTable($this->parametre);
        if ($controleAuthentification->getAutorisationSession()==false || $this->oModele->rechercherVendeur($controleAuthentification) == false){

            $this->oVue->genererAffichage($controleAuthentification);

        }else{
            header('Location:index.php');
        }
    }

    public function deconnecter(){
        session_destroy();
        $_SESSION = [];
        header('Location:index.php');
    }
}
