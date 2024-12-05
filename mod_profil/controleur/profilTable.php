<?php
Class ProfilTable{

    private $codev="";
    private $login="";
    private $motdepasse="";
    private $nom="";
    private $prenom="";
    private $adresse="";
    private $cp="";
    private $ville="";
    private $telephone="";

    private $CA="";
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
                // On appelle la méthode
                $this->$setter($v);
            }
        }
    }
 // Getters
    /**
     * @return mixed
     */
    public function getCodev()
    {
        return $this->codev;
    }   /**
     * @return mixed
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
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function getCA()
    {
        return $this->CA;
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
     * @param mixed $codev
     */
    public function setCodev($codev)
    {
        $this->codev = $codev;
    }
    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->codev = $login;
    }
    /**
     * @param mixed $motdepasse
     */
    public function setMotdepasse(string $motdepasse): void
    {
        if(!ctype_space(strval($motdepasse)) && !empty($motdepasse)){
//salage
            $gauche = "ar30&y%";
            $droite = "tk!@";
            $this->motdepasse = hash('ripemd128',"$gauche$motdepasse$droite");
        }else{
            self::setMessageErreur("Vous devez saisir un mot de passe");
            $this->setAutorisationSession(false);
            $this->motdepasse="";
        }
    }
    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        if(empty($nom) || ctype_space(strval($nom))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("Le nom est obligatoire. <br>");
        }
        $this->nom = $nom;
    }
    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        if(empty($prenom) || ctype_space(strval($prenom))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("Le prénom est obligatoire. <br>");
        }
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        if(empty($adresse) || ctype_space(strval($adresse))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("L'adresse est obligatoire. <br>");
        }
        $this->adresse = $adresse;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        if(empty($cp) || ctype_space(strval($cp))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("Le code postal est obligatoire. <br>");
        }
        $this->cp = $cp;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        if(empty($ville) || ctype_space(strval($ville))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("La ville est obligatoire. <br>");
        }
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        if(empty($telephone) || ctype_space(strval($telephone))) {
            $this->setAutorisationBD(false);
            self :: setMessageErreur("Le téléphone est obligatoire. <br>");
        }
        $this->telephone = $telephone;
    }

    /**
     * @param string $CA
     */
    public function setCA($CA)
    {
        $this->CA = $CA;
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