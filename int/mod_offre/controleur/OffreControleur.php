<?php

class OffreControleur
{

    private $parametres = array();
    private $offreModele;
    private $offreVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->offreModele = new OffreModele($this->parametres);
        $this->offreVue = new OffreVue($this->parametres);

    }

    public function genererFormulaireoffre()
    {

        $this->offreVue->afficherFormulaireoffre();

    }

}