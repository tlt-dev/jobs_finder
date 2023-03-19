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

        $this->visiteurVue->afficherAccueil();

    }

}