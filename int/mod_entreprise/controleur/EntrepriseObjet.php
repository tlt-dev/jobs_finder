<?php

class EntrepriseObjet
{

    private $ent_id;
    private $ent_nom;

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
        if(strlen($ent_nom) > 10)
        {
            self::setMessageErreur("Titre trop long !");
            $this->setAutorisationBD(false);
        }else
        {
            self::setMessageSucces("Succès !");
            $this->setAutorisationBD(true);
        }
        $this->ent_nom = $ent_nom;
    }

}