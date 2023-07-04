<?php
//ALT + INSER POUR GENERER LES SETTERS ET LES GETTERS TOUT SEUL

class profilTable
{
    // 1ere partie de la classe : définir les propriétés :
    // Par convention les propriétés sont définies comme : privées (private)
    private $codev = "";
    private $nom = "";
    private $prenom = "";
    private $adresse = "";
    private $cp = "";
    private $ville = "";
    private $telephone = "";
    private $login = "";
    private $motdepasse = "";
    private $confirmMotDePasse = "";
    private $total_ht = "";


    private $autorisationBD = true;
    private static $messageErreur = "";
    private static $messageSucces = "";


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
    public function getCodev()
    {
        return $this->codev;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

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
    public function getAutorisationBD()
    {
        return $this->autorisationBD;
    }

    /**
     * @return string
     */
    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }

    /**
     * @return string
     */
    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }


    /**
     * @return string
     */
    public function getConfirmMotDePasse()
    {
        return $this->confirmMotDePasse;
    }

    /**
     * @return string
     */
    public function getTotal_Ht()
    {
        return $this->total_ht;
    }

    /*****************************************************************/
    /*                         GETTERS                               */
    /*****************************************************************/

    /**
     * @param string $codev
     */
    public function setCodev($codev)
    {
        $this->codev = $codev;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        if (empty($adresse) || ctype_space(strval($adresse))) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir une adresse.<br>");
        }
        $this->adresse = $adresse;
    }

    /**
     * @param string $cp
     */
    public function setCp($cp)
    {
        if (empty($cp) || ctype_space(strval($cp))) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un code postal.<br>");
        }
        $this->cp = $cp;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        if (empty($ville) || ctype_space(strval($ville))) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir une ville.<br>");
        }
        $this->ville = $ville;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        if (empty($telephone) || ctype_space(strval($telephone))) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un numéro de téléphone.<br>");
        }
        $this->telephone = $telephone;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param string $motdepasse
     */
    public function setMotdepasse($motdepasse)
    {
        if (empty($motdepasse) || ctype_space(strval($motdepasse))) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un mot de passe.<br>");
        }
//        if ($motdepasse == $this->getConfirmMotdepasse()){
//            $this->motdepasse = $motdepasse;
//        }
        else {
            $gauche = "ar30&y%";
            $droite = "tk!@";
            $this->motdepasse = hash('ripemd128', "$gauche$motdepasse$droite");
        }
    }

    /**
     * @param bool $autorisationBD
     */
    public function setAutorisationBD($autorisationBD)
    {
        $this->autorisationBD = $autorisationBD;
    }

    public static function setMessageErreur($messageErreur)
    {
        self::$messageErreur = self::$messageErreur . $messageErreur;
    }

    public static function setMessageSucces($messageSucces)
    {
        self::$messageSucces = self::$messageSucces . $messageSucces;
    }

    /**
     * @param string $ConfirmMotdepasse
     */
    public function setConfirmMotDePasse($ConfirmMotDePasse)
    {
        if (empty($ConfirmMotDePasse) || ctype_space(strval($ConfirmMotDePasse))) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir la confirmation du mot de passe.<br>");
        }
//        if ($motdepasse == $this->getConfirmMotdepasse()){
//            $this->motdepasse = $motdepasse;
//        }
        else {
            $gauche = "ar30&y%";
            $droite = "tk!@";
            $this->confirmMotDePasse = hash('ripemd128', "$gauche$ConfirmMotDePasse$droite");
        }
    }


    /**
     * @param string $total_ht
     */
    public function setTotal_Ht($total_ht)
    {
        $this->total_ht = $total_ht;
    }


    public function controlModifMDP()
    {
        if ($this->getMotdepasse() != $this->getConfirmMotDePasse())
        {
            $this->autorisationBD = false;
            self::setMessageErreur("Les mots de passe ne sont pas identiques.");
        }

    }
}


