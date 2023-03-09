<?php

class VisiteurControleur
{

    private $parametres = array();
    private $visiteurModele;
    private $visiteurVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->visiteurModele = new VisiteurModele($this->parametres);
        $this->visiteurVue = new VisiteurVue($this->parametres);

    }

    public function genererAccueil()
    {
        $listeOffre = $this->visiteurModele->getAllOffre();
        $listePoste = $this->visiteurModele->getAllPoste();

        $this->visiteurVue->afficherAccueil($listeOffre,$listePoste);

    }

    public function rechercheOffre(){
        print_r($this->parametres);
        $listeOffre = $this->visiteurModele->rechercheOffre($this->parametres["off_poste"]);

        echo json_encode($listeOffre);
    }
}