<?php

class EntrepriseObjet
{

    private $ent_id;
    private $ent_nom;
    private $ent_adresse1;
    private $ent_adresse2;
    private $ent_adresse3;
    private $ent_adresse4;

    private $ent_chiffre_affaires;
    private $ent_date_creation;
    private $ent_descriptif;
    private $ent_secteur_activite;
    private $ent_siren;
    private $ent_siret;
    private $ent_statut;
    private $ent_ville;

    private $ent_user;

    private $autorisationBD = true;
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

    public function getEnt_id()
    {
        return $this->ent_id;
    }

    public function setEnt_id($ent_id)
    {
        $this->ent_id = $ent_id;
    }

    public function getEnt_user()
    {
        return $this->ent_user;
    }

    public function setEnt_user($ent_user)
    {
        $this->ent_user = $ent_user;
    }

    public function getEnt_adresse1()
    {
        return $this->ent_adresse1;
    }

    public function setEnt_adresse1($ent_adresse1)
    {
        $this->ent_adresse1 = $ent_adresse1;
    }

    public function getEnt_adresse4()
    {
        return $this->ent_adresse4;
    }

    public function setEnt_adresse4($ent_adresse4)
    {
        $this->ent_adresse4 = $ent_adresse4;
    }
    public function getEnt_adresse2()
    {
        return $this->ent_adresse2;
    }

    public function setEnt_adresse2($ent_adresse2)
    {
        $this->ent_adresse2 = $ent_adresse2;
    }
    public function getEnt_adresse3()
    {
        return $this->ent_adresse3;
    }

    public function setEnt_adresse3($ent_adresse3)
    {
        $this->ent_adresse3 = $ent_adresse3;
    }

    public function getEnt_chiffre_affaires()
    {
        return $this->ent_chiffre_affaires;
    }

    public function setEnt_chiffre_affaires($ent_chiffre_affaires)
    {
        $this->ent_chiffre_affaires = $ent_chiffre_affaires;
    }

    public function getEnt_date_creation()
    {
        return $this->ent_date_creation;
    }

    public function setEnt_date_creation($ent_date_creation)
    {
        $this->ent_date_creation = $ent_date_creation;
    }

    
    public function getEnt_descriptif()
    {
        return $this->ent_descriptif;
    }

    public function setEnt_descriptif($ent_descriptif)
    {
        $this->ent_descriptif = $ent_descriptif;
    }


    public function getEnt_secteur_activite()
    {
        return $this->ent_secteur_activite;
    }

    public function setEnt_secteur_activite($ent_secteur_activite)
    {
        $this->ent_secteur_activite = $ent_secteur_activite;
    }

    public function getEnt_siren()
    {
        return $this->ent_siren;
    }

    public function setEnt_siren($ent_siren)
    {
        $this->ent_siren = $ent_siren;
    }

    public function getEnt_siret()
    {
        return $this->ent_siret;
    }

    public function setEnt_siret($ent_siret)
    {
        $this->ent_siret = $ent_siret;
    }
    
    public function getEnt_statut()
    {
        return $this->ent_statut;
    }

    public function setEnt_statut($ent_statut)
    {
        $this->ent_statut = $ent_statut;
    }

    public function getEnt_ville()
    {
        return $this->ent_ville;
    }

    public function setEnt_ville($ent_ville)
    {
        $this->ent_ville = $ent_ville;
    }

    public function getEnt_nom()
    {
        return $this->ent_nom;
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

    public function setEnt_nom($ent_nom)
    {
        $this->ent_nom = $ent_nom;
    }

}