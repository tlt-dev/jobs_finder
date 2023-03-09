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


    public function genererDashboard()
    {
        $entreprise = $this->entrepriseModele->getEntreprise();

        $listeChercheurEmploi = $this->entrepriseModele->getListeChercheureEmploi();

        $listeCompetence = $this->entrepriseModele->getListeCompetence();

        $utilisateurModel = new UtilisateurModele($this->parametres);


        $this->entrepriseVue->afficherDashboard($entreprise, $listeChercheurEmploi, $listeCompetence);

    }

    public function consulterProfil()
    {
        $entreprise = $this->entrepriseModele->getEntreprise();

        $listeStatuts = $this->entrepriseModele->getListeStatuts();

        $listeVilles = $this->entrepriseModele->getListeVilles();

        $userName = $this->entrepriseModele->getUserMail($entreprise->getEnt_user());

        $listeSecteurAct = $this->entrepriseModele->getListeSecteurAct();

        $this->entrepriseVue->afficherProfil($entreprise, $listeStatuts, $listeVilles, $userName, $listeSecteurAct);


    }

    public function genererSuivi()  
    {
        $listeOffres = $this->entrepriseModele->getOffreByEntrepriseId();

        $this->entrepriseVue->afficherSuivi($listeOffres);

    }

    public function genererListe()
    {

        $listeEntreprises = $this->entrepriseModele->getListeEntreprises();

        $this->entrepriseVue->afficherListe($listeEntreprises);

    }


    public function rechercheChercheurEmploi()
    {

        $chercheurEmploiModel = new UtilisateurModele($this->parametres);

        $listeChercheurEmploiFilter = $chercheurEmploiModel->getChercheursEmploiByCompetences($this->parametres['competenceMultiSelect']);

        echo(json_encode(array(
            "listeChercheurEmploiFilter"=>$listeChercheurEmploiFilter)));

    }


    public function modifierEntreprise()
    {
        $entreprise = new EntrepriseObjet($this->parametres);

        if (!$entreprise->getAutorisationBD()) {
            echo 'MARCHE PO';
        } else {
            
            if($_FILES['source_logo']['size'] != 0)
            {
                $this->entrepriseModele->addDocument($entreprise->getEnt_id());
            }
                
            $this->entrepriseModele->editEntreprise($entreprise);
            EntrepriseObjet::setMessageSucces("Entreprise modifiée avec succès !");
            $this->genererDashboard();



        }

    }

    public function supprimerEntreprise()
    {

        $entreprise = new EntrepriseObjet($this->parametres);

        $this->entrepriseModele->deleteEntreprise($entreprise);

        EntrepriseObjet::setMessageSucces("Entreprise supprimée avec succès !");

        $this->genererListe();

    }

}