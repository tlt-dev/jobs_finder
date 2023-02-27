<?php

class ChercheurObjet
{

    private $che_id;
    private $che_nom;
    private $che_prenom;
    private $che_sexe;
    private $che_date_naissance;
    private $che_telephone;
    private $che_adresse1;
    private $che_adresse2;
    private $che_adresse3;
    private $che_adresse4;
    private $che_ville;
    private $che_photo;
    private $che_en_recherche;
    private $che_user;

    private $autorisationSession = true;
    private static $messageErreur = "";
    private static $messageSucces = "";

    public function __construct($data = NULL)
    {
        if($data!=NULL){
            $this->hydrater($data);
        }

    }

    public function hydrater($row){
        foreach($row as $k => $v){
            //concaténation de la méthode setter à appeler
            $setter = 'set'.ucfirst($k);
            //method_exists( attend 2 paramètres : l'objet en cours et la méthode (cf. php.net)
            if(method_exists($this, $setter)){
                $this->$setter($v);
            }
        }
    }

    public function getChe_id()
    {
        return $this->che_id;
    }

    public function getChe_nom()
    {
        return $this->che_nom;
    }

    public function getChe_prenom()
    {
        return $this->che_prenom;
    }

    public function getChe_sexe()
    {
        return $this->che_sexe;
    }

    public function getChe_date_naissance()
    {
        return $this->che_date_naissance;
    }

    public function getChe_telephone()
    {
        return $this->che_telephone;
    }

    public function getChe_adresse1()
    {
        return $this->che_adresse1;
    }

    public function getChe_adresse2()
    {
        return $this->che_adresse2;
    }

    public function getChe_adresse3()
    {
        return $this->che_adresse3;
    }

    public function getChe_adresse4()
    {
        return $this->che_adresse4;
    }

    public function getChe_ville()
    {
        return $this->che_ville;
    }

    public function getChe_photo()
    {
        return $this->che_photo;
    }

    public function getChe_en_recherche()
    {
        return $this->che_en_recherche;
    }

    public function getChe_user()
    {
        return $this->che_user;
    }

    public function setChe_id($che_id)
    {
        $this->che_id = $che_id;
    }

    public function setChe_nom($che_nom)
    {
        $this->che_nom = $che_nom;
    }

    public function setChe_prenom($che_prenom)
    {
        $this->che_prenom = $che_prenom;
    }

    public function setChe_sexe($che_sexe)
    {
        $this->che_sexe = $che_sexe;
    }

    public function setChe_date_naissance($che_date_naissance)
    {
        $this->che_date_naissance = $che_date_naissance;
    }

    public function setChe_telephone($che_telephone)
    {
        $this->che_telephone = $che_telephone;
    }

    public function setChe_adresse1($che_adresse1)
    {
        $this->che_adresse1 = $che_adresse1;
    }

    public function setChe_adresse2($che_adresse2)
    {
        $this->che_adresse2 = $che_adresse2;
    }

    public function setChe_adresse3($che_adresse3)
    {
        $this->che_adresse3 = $che_adresse3;
    }

    public function setChe_adresse4($che_adresse4)
    {
        $this->che_adresse4 = $che_adresse4;
    }

    public function setChe_ville($che_ville)
    {
        $this->che_ville = $che_ville;
    }

    public function setChe_photo($che_photo)
    {
        $this->che_photo = $che_photo;
    }

    public function setChe_en_recherche($che_en_recherche)
    {
        $this->che_en_recherche = $che_en_recherche;
    }

    public function setChe_user($che_user)
    {
        $this->che_user = $che_user;
    }

    public function getAutorisationBD()
    {
        return $this->autorisationBD;
    }

    public function setAutorisationBD($bool)
    {
        $this->autorisationBD = $bool;
    }

    public static function getMessageErreur(){
        return self::$messageErreur;
    }

    public static function setMessageErreur($msg){
        self::$messageErreur=$msg = self::$messageErreur . $msg;
    }

    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }

    public static function setMessageSucces($msg)
    {
        self::$messageSucces=$msg = self::$messageSucces . $msg;
    }

}