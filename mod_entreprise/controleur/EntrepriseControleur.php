<?php

class EntrepriseControleur
{

    private $parametres = array();
    private $entrepriseModele;
    private $entrepriseVue;
    private $offreControleur;
    private $offreModele;

    public function __construct($parametres)
    {
        $this->parametres = $parametres;
        $this->entrepriseModele = new EntrepriseModele($this->parametres);
        $this->entrepriseVue = new EntrepriseVue($this->parametres);
        $this->offreControleur = new OffreControleur($this->parametres);
        $this->offreModele = new OffreModele($this->parametres);
    }


    public function genererDashboard()
    {
        $entreprise = $this->entrepriseModele->getEntreprise();

        $listeChercheurEmploi = $this->entrepriseModele->getListeChercheureEmploi();

        $listeCompetence = $this->entrepriseModele->getListeCompetence();

        $chercheurModele = new ChercheurModele($this->parametres);


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
        $listeOffres = $this->entrepriseModele->getListeOffres();
        $this->entrepriseVue->afficherSuivi($listeOffres);

    }

    public function addEntretien()
    {

        $this->entrepriseModele->addEntretien();
        

        echo(json_encode(array(
            "ent_date_entretien"=>$this->parametres['ent_date_entretien']
        )));


    }

    

    public function getListeOffres()
    {

        $listeOffres = $this->entrepriseModele->getListeOffres();

        echo(json_encode(array(
            "listeOffres"=>$listeOffres
        )));

    }

    public function getListeChercheur()
    {

        $listeChercheur = $this->entrepriseModele->getListeChercheureEmploi();

        echo(json_encode(array(
            "listeChercheur"=>$listeChercheur
        )));

    }

    /*public function genererListe()
    {

        $listeEntreprises = $this->entrepriseModele->getListeEntreprises();

        $this->entrepriseVue->afficherListe($listeEntreprises);

    }*/


    public function rechercheChercheurEmploi()
    {

        $chercheurEmploiModel = new ChercheurModele($this->parametres);

        $listeChercheurEmploiFilter = $chercheurEmploiModel->getChercheursEmploiByCompetences($this->parametres['competenceMultiSelect']);

        echo(json_encode(array(
            "listeChercheurEmploiFilter"=>$listeChercheurEmploiFilter)));

    }

    public function recherche_Candidat()
    {
        $listeCandidatFilter = $this->entrepriseModele->getListeCandidatureByOffreId($this->parametres['offreMultiSelect']);
        $listeEntretien = $this->entrepriseModele->getEntretien($this->parametres['offreMultiSelect']);
        $listeEntretienReponse = $this->entrepriseModele->getEntretienReponse($this->parametres['offreMultiSelect']);


        /*foreach ($listeCandidatFilter as $candidat){
            $data[] = array(
                "che_id" => $candidat["che_id"],
                "che_nom" => $candidat["che_nom"],
                "che_prenom" => $candidat["che_prenom"],
                "che_telephone" => $candidat["che_telephone"],
                "che_mail" => $candidat["che_mail"],
                "token"=>$_SESSION['token']
                
            );
        }*/
        echo (json_encode(array(
            "listeCandidats"=>$listeCandidatFilter,
            "listeEntretien"=>$listeEntretien,
            "listeEntretienReponse"=>$listeEntretienReponse,
            "token"=>$_SESSION['token']
        )));
        

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

    /*public function supprimerEntreprise()
    {

        $entreprise = new EntrepriseObjet($this->parametres);

        $this->entrepriseModele->deleteEntreprise($entreprise);

        EntrepriseObjet::setMessageSucces("Entreprise supprimée avec succès !");

        $this->genererListe();

    }*/

    public function genererListeOffre(){
        $listeOffres = $this->offreModele->getListeOffres($_SESSION["login"]);
        $listeVilles = $this->offreModele->getAllVille();
        $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();
        $entreprise = $this->entrepriseModele->getEntreprise();

        $this->entrepriseVue->afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite,$entreprise);
    }

}