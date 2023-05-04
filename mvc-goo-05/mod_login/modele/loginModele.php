<?php

class LoginModele extends Modele
{
    private $parametre = array(); // Tableau ($_REQUEST)

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function verifieIdentifiants()
    {
        $sql = 'SELECT * FROM c';
}
}
