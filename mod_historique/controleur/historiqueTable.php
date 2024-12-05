<?php
Class HistoriqueTable{

    private $numero=""; //getCodec | setCodec
    private $codev=""; // getPrix_unitaire_HT
    private $codec="";
    private $nomClient="";
    private $nomVendeur="";
    private $etat="";


    private $numerodeligne ="";
    private $reference="";
    private $designation;
    private $quantite="";
    private float $totalHT=0;
    private float $prixdevente=0;
    private float $prixtotal=0;


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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getCodev()
    {
        return $this->codev;
    }

    /**
     * @return mixed
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @return mixed
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * @return string
     */
    public function getNomVendeur()
    {
        return $this->nomVendeur;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return float
     */
    public function getTotalHT()
    {
        return $this->totalHT;
    }

    /**
     * @return string
     */
    public function getNumerodeligne()
    {
        return $this->numerodeligne;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @return float
     */
    public function getPrixdevente(): float
    {
        return $this->prixdevente;
    }

    /**
     * @return float
     */
    public function getPrixTotal(): float
    {
        return $this->prixtotal;
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
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    /**
     * @param mixed $codev
     */
    public function setCodev($codev)
    {
        $this->codev = $codev;
    }
    /**
     * @param mixed $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @param string $nomClient
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;
    }

    /**
     * @param string $nomVendeur
     */
    public function setNomVendeur(string $nomVendeur)
    {
        $this->nomVendeur = $nomVendeur;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @param float $totalHT
     */
    public function setTotalHT($totalHT)
    {
        $this->totalHT = $totalHT;
    }

    /**
     * @param string $numerodeligne
     */
    public function setNumerodeligne(string $numerodeligne): void
    {
        $this->numerodeligne = $numerodeligne;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @param string $quantite
     */
    public function setQuantite(string $quantite): void
    {
        $this->quantite = $quantite;
    }

    /**
     * @param float $prixdevente
     */
    public function setPrixdevente(float $prixdevente)
    {
        $this->prixdevente = $prixdevente;
    }

    /**
     * @param float $prixtotal
     */
    public function setPrixtotal(float $prixtotal)
    {
        $this->prixtotal = $prixtotal;
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