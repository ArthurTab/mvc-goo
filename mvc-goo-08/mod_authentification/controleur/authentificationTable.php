<?php

class AuthentificationTable
{

// 1ere partie de la classe : définir les propriétés :
    // Par convention les propriétés sont définies comme : privées (private)
    private $login = "";
    private $motdepasse = "";
    private $autorisationSession = true;
    private static $messageErreur = "";

    public function __construct($data = null)
    {
        //Data est mon tableau de base de donneés. On l'initialise a Null au cas ou on est dans un formulaire d'ajout et donc on récup pas de données
        if ($data != null) {

            $this->hydrater($data);

        }

    }

    public function hydrater(array $row)
    {
        foreach ($row as $key => $valeur) {
            //Pour chaque élément du tableau, je prend sa clé k ainsi que sa valeur
            $setter = 'set' . ucfirst($key); //Les clés seront de la forme : première lettre majuscule.
            if (method_exists($this, $setter)) {
                //On appelle la méthode
                $this->$setter($valeur); // = $this->setNom($nom)
            }
        }
    }

    /*****************************************************************/
    /*                         GETTERS                               */
    /*****************************************************************/

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @return bool
     */
    public function getAutorisationSession()
    {
        return $this->autorisationSession;
    }

    /**
     * @return string
     */
    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }


    /*****************************************************************/
    /*                         SETTERS                               */
    /*****************************************************************/

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        if (ctype_space(strval($login)) || empty($login)) {
            self::setMessageErreur('Le login est incorrect.<br>');
            $this->setAutorisationSession(false);
        }
        $this->login = $login;
    }

    /**
     * @param string $motdepasse
     */
    public function setMotdepasse($motdepasse)
    {
        if (!ctype_space(strval($motdepasse)) && !empty($motdepasse)) {

        //Salage
            $gauche = "ar30&y%";
            $droite = "tk!@";
            $this->motdepasse = hash('ripemd128', "$gauche$motdepasse$droite");

        } else {

            self::setMessageErreur('Le mot de passe est incorrect <br>');
            $this->setAutorisationSession(false);
            $this->motdepasse = "";

        }
    }

    /**
     * @param bool $autorisationSession
     */
    public function setAutorisationSession(bool $autorisationSession)
    {
        $this->autorisationSession = $autorisationSession;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur(string $messageErreur)
    {
        self::$messageErreur = self::$messageErreur . $messageErreur;
    }


}