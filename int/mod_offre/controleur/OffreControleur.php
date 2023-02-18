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
        if(!isset($_POST['id']) || empty($_POST['id'])){
            $listeVilles = $this->offreModele->getAllVille();
            $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();
            $listeSalaire = $this->offreModele->getAllSalaire();
            
            $this->offreVue->afficherFormulaireCreationOffre($listeVilles,$listeSecteurActivite,$listeSalaire);
        }else{
            $offre = $this->offreModele->getOffreFromId($_POST['id']);
            $listeVilles = $this->offreModele->getAllVille();
            $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();
            $listeSalaire = $this->offreModele->getAllSalaire();
            
            $this->offreVue->afficherFormulaireModificationOffre($offre,$listeVilles,$listeSecteurActivite,$listeSalaire);
        }
        

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

    public function creerOffre(){

        $offre = new OffreObjet($this->parametres);

        if($offre->getAutorisationBD()){
            $this->offreModele->creerOffre($offre);
            OffreObjet::setMessageSucces("Offre créée avec succès !");
            $this->genererListeOffre();
        }
    }

    public function supprimerOffre(){

        $this->offreModele->supprimerOffre($_POST['id']);
        OffreObjet::setMessageSucces("Offre supprimée avec succès !");
        $this->genererListeOffre();
    }
}