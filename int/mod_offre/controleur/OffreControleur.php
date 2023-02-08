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

        $offre = $this->offreModele->getOffreFromId($_POST['id']);
        
        $this->offreVue->afficherFormulaireModificationOffre($offre);

    }

    public function genererListeOffre()
    {

        $listeOffres = $this->offreModele->getListeOffres();
        $listeVilles = $this->offreModele->getAllVille();
        $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();

        $this->offreVue->afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite);

    }

}