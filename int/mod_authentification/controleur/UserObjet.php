<?php

class UserObjet
{

    private $usr_id;
    private $usr_email;
    private $usr_mot_de_passe;
    private $usr_est_chercheur_emploi;

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

    public function validation($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
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

        $usr_email = $this->validation($usr_email);
        $usr_email = filter_var($usr_email, FILTER_SANITIZE_EMAIL);

        if(empty($usr_email)){
            self::setMessageErreur("L'adresse mail ne peut pas être vide");
            $this->setAutorisationBD(false);
        } else if(!filter_var($usr_email, FILTER_VALIDATE_EMAIL)) {
            self::setMessageErreur("Le format de l'adresse mail est invalide");
            $this->setAutorisationBD(false);
        }

        $this->usr_email = $usr_email;

    }

    public function setUsr_mot_de_passe($usr_mot_de_passe)
    {

        $usr_mot_de_passe = $this->validation($usr_mot_de_passe);

        if(!empty($usr_mot_de_passe))
        {
            if(strlen($usr_mot_de_passe) < 8)
            {
                self::setMessageErreur("Le mot de passe doit faire au moins 8 caractères");
                $this->setAutorisationBD(false);
            }
        }

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