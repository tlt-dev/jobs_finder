<?php

class OffreEmploiObjet
{
    private $off_id;
    private $off_intitule;
    private	$off_ville;
    private $off_cp_ville; 	
    private $off_date_prise_poste; 	
    private $off_salaire;
    private $off_duree; 	
    private $off_secteur_activite;
    private $off_entreprise;
    private $off_descriptif; 	

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

    public function get_Off_id(){
        return $this->off_id;
    }

    public function set_Off_id($off_id){
        $this->$off_id = $off_id;
    }

    public function get_Off_intitule(){
        return $this->off_intitule;
    }

    public function set_Off_intitule($off_intitule){
        if (strlen($off_intitule) > 100){
            self::setMessageErreur("Intitulé trop long !");
            $this->setAutorisationBD(false);
        }else{
            $this->$off_intitule = $off_intitule;
        }
    }

    public function get_Off_ville(){
        return $this->off_ville;
    }

    public function set_Off_ville($off_ville){
        $this->$off_ville = $off_ville;
    }

    public function get_Off_cp_ville(){
        return $this->off_cp_ville;
    }

    public function set_Off_cp_ville($off_cp_ville){
        $this->$off_cp_ville = $off_cp_ville;
    }

    public function get_Off_date_prise_poste(){
        return $this->off_date_prise_poste;
    }

    public function set_Off_date_prise_poste($off_date_prise_poste){
        $this->$off_date_prise_poste = $off_date_prise_poste;
    }

    public function get_Off_salaire(){
        return $this->off_salaire;
    }

    public function set_Off_salaire($off_salaire){
        if ($off_salaire < 0){
            self::setMessageErreur("Salaire négatif !");
            $this->setAutorisationBD(false);
        }else{
            $this->$off_salaire = $off_salaire;
        }
    }

    public function get_Off_duree(){
        return $this->off_duree;
    }

    public function set_Off_duree($off_duree){
        $this->$off_duree = $off_duree;
    }

    public function get_Off_secteur_activite(){
        return $this->off_secteur_activite;
    }

    public function set_Off_secteur_activite($off_secteur_activite){
        $this->$off_secteur_activite = $off_secteur_activite;
    }

    public function get_Off_entreprise(){
        return $this->off_entreprise;
    }

    public function set_Off_entreprise($off_entreprise){
        $this->$off_entreprise = $off_entreprise;
    }

    public function get_Off_descriptif(){
        return $this->off_descriptif;
    }

    public function set_Off_descriptif($off_descriptif){
        if (strlen($off_descriptif) > 1000){
            self::setMessageErreur("Descriptif trop long !");
            $this->setAutorisationBD(false);
        }else{
            $this->$off_descriptif = $off_descriptif;
        }
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