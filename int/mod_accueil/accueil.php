<?php
/**
 * Class accueil
 * Routeur de la classe Accueil
 * @author tlaurent
 */

class Accueil
{

    private $parametres = array();
    private $oControleur;

    public function __construct($parametres){

        //require_once('mod_accueil/controleur/accueilControleur.php');
        $this->parametres = $parametres;
        $this->oControleur = new AccueilControleur();
    }

    public function choixAction(){

        $this->oControleur->liste();
    }
}