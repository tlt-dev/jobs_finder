<?php

class AuthentificationObjet
{

    private $usr_id;
    private $usr_email;
    private $usr_mot_de_passe;
    private $usr_est_chercheur_emploi;

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

    public function getUsr_id()
    {

        return $this->usr_id;

    }

    public function getUsr_email()
    {

        return $this->usr_email;

    }

    public function getUsr_mot_de_passe()
    {

        return $this->usr_mot_de_passe;

    }

    public function getUsr_est_chercheur_emploi()
    {

        return $this->usr_est_chercheur_emploi;

    }

    public function setUsr_id($usr_id)
    {

        $this->usr_id = $usr_id;

    }

    public function setUsr_email($usr_email)
    {

        $this->usr_email = $usr_email;

    }

    public function setUsr_mot_de_passe($usr_mot_de_passe)
    {

        $this->usr_mot_de_passe = $usr_mot_de_passe;

    }

    public function setUsr_est_chercheur_emploi($usr_est_chercheur_emploi)
    {

        $this->usr_est_chercheur_emploi = $usr_est_chercheur_emploi;

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