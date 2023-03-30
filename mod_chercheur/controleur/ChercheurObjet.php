<?php

class ChercheurObjet
{

    private $che_id;
    private $che_nom;
    private $che_prenom;
    private $che_sexe;
    private $che_date_naissance;
    private $che_telephone;
    private $che_mail;
    private $che_adresse;
    private $che_ville;
    private $che_code_postal;
    private $che_photo;
    private $che_en_recherche;
    private $che_user;

    private $comboVilles;
    private $comboSexes;

    private $autorisationBD = true;
    private static $messageErreur = "";
    private static $messageSucces = "";

    public function __construct($data = NULL)
    {
        if($data!=NULL){
            $this->hydrater($data);
        }

        $this->setComboVilles();
        $this->setComboSexes();

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

    public function getChe_mail()
    {
        return $this->che_mail;
    }

    public function getChe_adresse()
    {
        return $this->che_adresse;
    }

    public function getChe_ville()
    {
        return $this->che_ville;
    }

    public function getChe_code_postal()
    {
        return $this->che_code_postal;
    }

    public function getChe_departement()
    {
        return $this->che_departement;
    }

    public function getChe_en_recherche()
    {
        return $this->che_en_recherche;
    }

    public function getChe_user()
    {
        return $this->che_user;
    }

    public function getComboVilles()
    {
        return $this->comboVilles;
    }

    public function getComboSexes()
    {
        return $this->comboSexes;
    }

    public function setChe_id($che_id)
    {
        $this->che_id = $che_id;
    }

    public function setChe_nom($che_nom)
    {
        $che_nom = $this->validation($che_nom);

        if(empty($che_nom)) {
            self::setMessageErreur("Le nom doit être rempli !");
            $this->setAutorisationBD(false);
        }else if(strlen($che_nom) > 36){
            self::setMessageErreur("Le nom ne doit pas dépasser 36 caractères !\n");
            $this->setAutorisationBD(false);
        }else if(!preg_match("/^[A-Za-z]+$/",$che_nom)){
            self::setMessageErreur("Le nom ne doit contenir que des caractères alphabétiques et -\n");
            $this->setAutorisationBD(false);
        }

        $this->che_nom = $che_nom;
    }

    public function setChe_prenom($che_prenom)
    {

        $che_prenom = $this->validation($che_prenom);

        if(empty($che_prenom)) {
            self::setMessageErreur("Le prénom doit être rempli !\n");
            $this->setAutorisationBD(false);
        }else if(strlen($che_prenom) > 32){
            self::setMessageErreur("Le prénom ne doit pas dépasser 32 caractères !\n");
            $this->setAutorisationBD(false);
        }else if(!preg_match("/^[A-Za-z]+$/",$che_prenom)){
            self::setMessageErreur("Le prénom ne doit contenir que des caractères alphabétiques et -\n");
            $this->setAutorisationBD(false);
        }

        $this->che_prenom = $che_prenom;
    }

    public function setChe_sexe($che_sexe)
    {
        $che_sexe = $this->validation($che_sexe);

        $this->che_sexe = $che_sexe;
    }

    public function setChe_date_naissance($che_date_naissance)
    {

        if(empty($che_date_naissance)){
            self::setMessageErreur("La date de naissance doit être complétée !\n");
            $this->setAutorisationBD(false);
        }

        $che_date_naissance = $this->validation($che_date_naissance);

        $this->che_date_naissance = $che_date_naissance;
    }

    public function setChe_telephone($che_telephone)
    {

        $che_telephone = $this->validation($che_telephone);

        if(empty($che_telephone)){
            self::setMessageErreur("Le numéro de téléphone doit être complété");
            $this->setAutorisationBD(false);
        }else if(strlen($che_telephone) != 10){
            self::setMessageErreur("Le numéro de téléphone doit faire 10 caractères\n");
            $this->setAutorisationBD(false);
        }else if(!ctype_digit($che_telephone)){
            self::setMessageErreur("Le numéro de téléphone ne doit être composé que de caractères numériques\n");
            $this->setAutorisationBD(false);
        }

        $this->che_telephone = $che_telephone;
    }

    public function setChe_mail($che_mail)
    {
        $che_mail = $this->validation($che_mail);
        $che_mail = filter_var($che_mail, FILTER_SANITIZE_EMAIL);

        if(empty($che_mail)){
            self::setMessageErreur("L'adresse mail doit être complétée !");
            $this->setAutorisationBD(false);
        }else if (!filter_var($che_mail, FILTER_VALIDATE_EMAIL)){
            self::setMessageErreur("Le format de l'adresse mail est invalide");
            $this->setAutorisationBD(false);
        }

        $this->che_mail = $che_mail;
    }

    public function setChe_adresse($che_adresse)
    {

        $che_adresse = $this->validation($che_adresse);

        if(empty($che_adresse)){
            self::setMessageErreur("L'adresse postale doit être complétée !");
            $this->setAutorisationBD(false);
        }else if(strlen($che_adresse > 38)){
            self::setMessageErreur("L'adresse postale ne doit pas dépasser 38 caractères");
            $this->setAutorisationBD(false);
        }

        $this->che_adresse = $che_adresse;
    }

    public function setChe_ville($che_ville)
    {
        $che_ville = $this->validation($che_ville);

        $this->che_ville = $che_ville;
    }

    public function setChe_code_postal($che_code_postal)
    {
        $che_code_postal = $this->validation($che_code_postal);

        $this->che_code_postal = $che_code_postal;
    }

    public function setChe_departement($che_departement)
    {
        $che_departement = $this->validation($che_departement);

        $this->che_departement = $che_departement;
    }

    public function setChe_en_recherche($che_en_recherche)
    {
        $che_en_recherche = $this->validation($che_en_recherche);

        $this->che_en_recherche = $che_en_recherche;
    }

    public function setChe_user($che_user)
    {
        $this->che_user = $che_user;
    }

    public function setComboSexes()
    {
        $modele = new ChercheurModele(NULL);
        $this->comboSexes = $modele->getListeSexes();
    }

    public function setComboVilles()
    {
        $modele = new ChercheurModele(NULL);
        $this->comboVilles = $modele->getListeVilles();
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