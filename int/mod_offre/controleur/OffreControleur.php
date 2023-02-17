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
        $listeVilles = $this->offreModele->getAllVille();
        $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();
        $listeSalaire = $this->offreModele->getAllSalaire();
        
        $this->offreVue->afficherFormulaireModificationOffre($offre,$listeVilles,$listeSecteurActivite,$listeSalaire);

    }

    public function genererListeOffre()
    {

        $listeOffres = $this->offreModele->getListeOffres();
        $listeVilles = $this->offreModele->getAllVille();
        $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();

        $this->offreVue->afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite);

    }

    public function modifierOffre(){

        $offre = new OffreObjet($this->parametres);

        if($offre->getAutorisationBD()){
            $this->offreModele->modifierOffre($offre);
            OffreObjet::setMessageSucces("Offre modifiée avec succès !");
            $this->genererListeOffre();
        }
    }

}