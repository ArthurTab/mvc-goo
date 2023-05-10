<?php
//ALT + INSER POUR GENERER LES SETTERS ET LES GETTERS TOUT SEUL

class produitTable
{
    // 1ere partie de la classe : définir les propriétés :
    // Par convention les propriétés sont définies comme : privées (private)
    private $reference = "";
    private $designation = "";
    private $prix_unitaire_HT = "";
    private $stock = "";
    private $quantite = "";
    private $descriptif = "";
    private $poids_piece = "";
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
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @return string
     */
    public function getPrix_unitaire_HT()
    {
        return $this->prix_unitaire_HT;
    }

    /**
     * @return string
     */
    public function getStock()
    {
        return $this->stock;
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

    /**
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @return string
     */
    public function getPoids_piece()
    {
        return $this->poids_piece;
    }





    /*****************************************************************/
    /*                         SETTERS                               */
    /*****************************************************************/

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @param string $designation
     */
    public function setDesignation($designation)
    {
        if (empty($designation) || ctype_space(strval($designation)) || (strlen($designation) < 4) || (strlen($designation) > 30)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("La désignation produit est obligatoire.<br>");
        }
        $this->designation = $designation;
    }

    /**
     * @param string $tarifHT
     */
    public function setPrix_unitaire_HT($prix_unitaire_HT)
    {
        if (empty($tarifHT) || ctype_space(strval($tarifHT)) || !is_numeric($tarifHT)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Il est obligatoire de renseigner le tarif hors taxes.<br>");
        }
        $this->tarifHT = $prix_unitaire_HT;
    }

    /**
     * @param string $stock
     */
    public function setStock(int $stock)
    {
        if (empty($stock) || ctype_space(strval($stock)) || $stock == 0 || !is_numeric($stock)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Il est obligatoire de renseigner le stock avec une valeur supérieure à 0.<br>");
        }
        $this->stock = $stock;
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

    /**
     * @param string $quantite
     */
    public function setQuantite($quantite)
    {
        if (empty($quantite) || ctype_space(strval($quantite)) || $quantite == 0 || !is_numeric($quantite)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("La quantité est obligatoire et doit être supérieure à 0.<br>");
        }
        $this->quantite = $quantite;
    }

    /**
     * @param string $descriptif
     */
    public function setDescriptif($descriptif)
    {
        if (empty($descriptif) || ctype_space(strval($descriptif)) || ($descriptif != 'G' && $descriptif != 'P')) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Le descriptif produit est obligatoire. Il doit être égal à G ou à P.<br>");
        }
        $this->descriptif = $descriptif;
    }

    /**
     * @param string $poidsPiece
     */
    public function setPoids_piece($poids_piece)
    {
        $desc = $this->getDescriptif();
        if ($desc == 'G') {
            if (empty($poidsPiece) || ctype_space(strval($poidsPiece)) || $poidsPiece != 0) {
                $this->setAutorisationBD(false);
                self::setMessageErreur("Le poids par piece est obligatoire. Le descriptif étant égal à G, vous devez donc renseigner un poids par piece égal à 0.<br>");
            } else {
                $this->poidsPiece = $poids_piece;
            }
        } elseif ($desc == 'P') {
            if (empty($poidsPiece) || ctype_space(strval($poidsPiece)) || $poidsPiece == 0) {
                $this->setAutorisationBD(false);
                self::setMessageErreur("Le poids par piece est obligatoire. Le descriptif étant sur P, le poids par piece doit être supérieur à 0.<br>");
            } else {
                $this->poidsPiece = $poids_piece;
            }
        } else {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Veuillez renseigner un poids par piece correct.");
        }

    }


}

