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
        $listeVilles = $this->offreModele->getAllVille();
        $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();
        $listeSalaire = $this->offreModele->getAllSalaire();
        $listeTypeContrat = $this->offreModele->getAllTypeContrat();
        $listePoste = $this->offreModele->getAllPoste();

        if (!isset($_POST['id']) || empty($_POST['id'])) {
            $this->offreVue->afficherFormulaireCreationOffre($listeVilles, $listeSecteurActivite, $listeSalaire, $listeTypeContrat, $listePoste);
        } else {
            $offre = $this->offreModele->getOffreFromId($_POST['id']);
            $this->offreVue->afficherFormulaireModificationOffre($offre, $listeVilles, $listeSecteurActivite, $listeSalaire, $listeTypeContrat, $listePoste);
        }


    }

    public function genererListeOffre()
    {

        $listeOffres = $this->offreModele->getListeOffres($_SESSION['login']);
        $listeVilles = $this->offreModele->getAllVille();
        $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();
        $entreprise = $this->offreModele->getEntreprise($this->offreModele->getEntrepriseId($_SESSION["login"]));

        $this->offreVue->afficherListeOffres($listeOffres, $listeVilles, $listeSecteurActivite,$entreprise);

    }

    public function modifierOffre()
    {

        $offre = new OffreObjet($this->parametres);

        $this->offreModele->modifierOffre($offre);
        OffreObjet::setMessageSucces("Offre modifiée avec succès !");
        $this->genererListeOffre();
    }

    public function creerOffre()
    {

        $offre = new OffreObjet($this->parametres);
        $offre->setOff_entreprise($this->offreModele->getEntrepriseId($_SESSION["login"]));

        if ($offre->getAutorisationBD()) {
            $this->offreModele->creerOffre($offre);
            OffreObjet::setMessageSucces("Offre créée avec succès !");
            $this->genererListeOffre();
        }
    }

    public function supprimerOffre()
    {

        $this->offreModele->supprimerOffre($_POST['id']);
        OffreObjet::setMessageSucces("Offre supprimée avec succès !");
        $this->genererListeOffre();
    }

}