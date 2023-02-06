<?php

class EntrepriseControleur
{

    private $parametres = array();
    private $entrepriseModele;
    private $entrepriseVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->entrepriseModele = new EntrepriseModele($this->parametres);
        $this->entrepriseVue = new EntrepriseVue($this->parametres);

    }

    public function genererAccueil()
    {

        $this->entrepriseVue->afficherAccueil();

    }

}