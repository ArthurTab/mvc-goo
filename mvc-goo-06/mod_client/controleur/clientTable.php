<?php
//ALT + INSER POUR GENERER LES SETTERS ET LES GETTERS TOUT SEUL

class clientTable
{
    // 1ere partie de la classe : définir les propriétés :
    // Par convention les propriétés sont définies comme : privées (private)
    private $codec = "";
    private $nom = "";
    private $adresse= "";
    private $cp = "";
    private $ville = "";
    private $telephone = "";
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


    public function getCodec()
    {
        return $this->codec;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }


    public function getAutorisationBD()
    {
        return $this->autorisationBD;
    }

    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }

    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }



    /*****************************************************************/
    /*                         SETTERS                               */
    /*****************************************************************/


    public function setCodec($codec)
    {
        $this->codec = $codec;
    }


    public function setNom($nom)
    {
        if(empty($nom) || ctype_space(strval($nom)) || (strlen($nom) < 5) || (strlen($nom) > 30)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("Le nom est obligatoire.");
        }
        $this->nom = $nom;
    }


    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }


    public function setCp($cp)
    {
        if(empty($cp) || ctype_space(strval($cp)) || (strlen($cp) < 1) || (strlen($cp) > 6)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("Le code postal est obligatoire.");
        }
        $this->cp = $cp;
    }


    public function setVille($ville)
    {
        if(empty($ville) || ctype_space(strval($ville)) || (strlen($ville) < 2) || (strlen($ville) > 30)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("La saisie de la ville est obligatoire.");
        }
        $this->ville = $ville;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setAutorisationBD(bool $autorisationBD)
    {
        $this->autorisationBD = $autorisationBD;
    }

    public static function setMessageErreur(string $messageErreur)
    {
        self::$messageErreur = self::$messageErreur . $messageErreur;
    }

    public static function setMessageSucces(string $messageSucces)
    {
        self::$messageSucces = self::$messageSucces . $messageSucces;
    }


}

