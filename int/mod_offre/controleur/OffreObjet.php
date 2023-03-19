<?php

class OffreObjet
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
    private $off_type_contrat;
    private $off_poste;

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

    public function getOff_id(){
        return $this->off_id;
    }

    public function setOff_id($off_id){
        $this->off_id = $off_id;
    }

    public function getOff_intitule(){
        return $this->off_intitule;
    }

    public function setOff_intitule($off_intitule){
        if (strlen($off_intitule) > 100){
            self::setMessageErreur("Intitulé trop long !");
            $this->setAutorisationBD(false);
        }else{
            $this->off_intitule = $off_intitule;
        }
    }

    public function getOff_ville(){
        return $this->off_ville;
    }

    public function setOff_ville($off_ville){
        $this->off_ville = $off_ville;
    }

    public function getOff_cp_ville(){
        return $this->off_cp_ville;
    }

    public function setOff_cp_ville($off_cp_ville){
        $this->off_cp_ville = $off_cp_ville;
    }

    public function getOff_date_prise_poste(){
        return $this->off_date_prise_poste;
    }

    public function setOff_date_prise_poste($off_date_prise_poste){
        $this->off_date_prise_poste = $off_date_prise_poste;
    }

    public function getOff_salaire(){
        return $this->off_salaire;
    }

    public function setOff_salaire($off_salaire){
        if ($off_salaire < 0){
            self::setMessageErreur("Salaire négatif !");
            $this->setAutorisationBD(false);
        }else{
            $this->off_salaire = $off_salaire;
        }
    }

    public function getOff_duree(){
        return $this->off_duree;
    }

    public function setOff_duree($off_duree){
        $this->off_duree = $off_duree;
    }

    public function getOff_secteur_activite(){
        return $this->off_secteur_activite;
    }

    public function setOff_secteur_activite($off_secteur_activite){
        $this->off_secteur_activite = $off_secteur_activite;
    }

    public function getOff_entreprise(){
        return $this->off_entreprise;
    }

    public function setOff_entreprise($off_entreprise){
        $this->off_entreprise = $off_entreprise;
    }

    public function getOff_descriptif(){
        return $this->off_descriptif;
    }

    public function setOff_descriptif($off_descriptif){
        if (strlen($off_descriptif) > 1000){
            self::setMessageErreur("Descriptif trop long !");
            $this->setAutorisationBD(false);
        }else{
            $this->off_descriptif = $off_descriptif;
        }
    }

    public function getOff_type_contrat(){
        return $this->off_type_contrat;
    }

    public function setOff_type_contrat($off_type_contrat){
        $this->off_type_contrat = $off_type_contrat;
    }

    public function getOff_poste(){
        return $this->off_poste;
    }

    public function setOff_poste($off_poste){
        $this->off_poste = $off_poste;
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