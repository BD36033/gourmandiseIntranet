<?php
Class ProduitTable{

    private $reference=""; //getReference
    private $designation=""; // getPrix_unitaire_HT
    private $quantite="";
    private $descriptif="";
    private $prixUHT="";
    private $stock="";
    private $poidsP="";
    private $PrixKilo="";

    private $autorisationBD = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    public function __construct($data = null){
//$data est UN TABLEAU
        if($data !=null) {
            $this->hydrater($data);
        }
    }

    public function hydrater(array $row){
//$row est un TABLEAU
        foreach ($row as $k => $v){
            //concaténation du préfixe set et du nom de la propriété avec
            // La première lettre en majuscule
            $setter = 'set'.ucfirst($k);
            if(method_exists($this,$setter)){
                $this->$setter($v);
            }
        }
    }
 // Getters
    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @return mixed
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @return mixed
     */
    public function getPrixUHT()
    {
        return $this->prixUHT;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @return mixed
     */
    public function getPoidsP()
    {
        return $this->poidsP;
    }

    /**
     * @return string
     */
    public function getPrixKilo()
    {
        return $this->PrixKilo;
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

 // Setters
    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation)
    {
        if(empty($designation) || ctype_space(strval($designation))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("La designation est obligatoire. <br>");
        }
        $this->designation = $designation;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        if(empty($quantite) || ctype_space(strval($quantite))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("La quantite est obligatoire. <br>");
        }
        $this->quantite = $quantite;
    }

    /**
     * @param mixed $descriptif
     */
    public function setDescriptif($descriptif)
    {
        if(empty($descriptif) || ctype_space(strval($descriptif))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("Le code postal est obligatoire. <br>");
        }
        $this->descriptif = $descriptif;
    }

    /**
     * @param mixed $prixUHT
     */
    public function setPrixUHT($prixUHT)
    {
        $this->prixUHT = $prixUHT;
        if(empty($prixUHT) || ctype_space(strval($prixUHT))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("Le prixUHT est obligatoire. <br>");
        }
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        if(empty($stock) || ctype_space(strval($stock))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("Le téléphone est obligatoire. <br>");
        }
        $this->stock = $stock;
    }

    /**
     * @param mixed $poidsP
     */
    public function setPoidsP($poidsP)
    {
        $this->poidsP = $poidsP;
    }

    /**
     * @param string $PrixKilo
     */
    public function setPrixKilo($PrixKilo)
    {
        $this->PrixKilo = $PrixKilo;
    }

    /**
     * @param bool $autorisationBD
     */
    public function setAutorisationBD(bool $autorisationBD)
    {
        $this->autorisationBD = $autorisationBD;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur(string $messageErreur)
    {
        self::$messageErreur = self::$messageErreur . $messageErreur;
    }

    /**
     * @param string $messageSucces
     */
    public static function setMessageSucces(string $messageSucces)
    {
        self::$messageSucces = self::$messageSucces . $messageSucces;
    }

}