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

        $this->visiteurVue->afficherAccueil($listeOffre);

    }

}