<?php

class OffreControleur
{

    private $parametres = array();
    private $offreModele;
    private $offreVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->offreModele = new offreModele($this->parametres);
        $this->offreVue = new offreVue($this->parametres);

    }

    public function genererFormulaireoffre()
    {

        $this->offreVue->afficherFormulaireoffre();

    }

}