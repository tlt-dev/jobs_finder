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

        $this->entrepriseVue->afficherDashboard($entreprise, $listeChercheurEmploi, $listeCompetence);

    }

    /*public function consulterProfil()
    {
        $entreprise = $this->entrepriseModele->getEntreprise();

        $listeStatuts = $this->entrepriseModele->getListeStatuts();

        $listeVilles = $this->entrepriseModele->getListeVilles();

        $userName = $this->entrepriseModele->getUserMail($entreprise->getEnt_user());

        $listeSecteurAct = $this->entrepriseModele->getListeSecteurAct();

        $user = $this->entrepriseModele->getUser();

        $this->entrepriseVue->afficherProfil($entreprise, $listeStatuts, $listeVilles, $userName, $listeSecteurAct);


    }*/

    public function consulterProfil()
    {
        $entreprise = $this->entrepriseModele->getEntreprise();

        $listeStatuts = $this->entrepriseModele->getListeStatuts();

        $listeVilles = $this->entrepriseModele->getListeVilles();

        $user = $this->entrepriseModele->getUser();

        $listeSecteurAct = $this->entrepriseModele->getListeSecteurAct();

        $this->entrepriseVue->afficherProfil($entreprise, $listeStatuts, $listeVilles, $listeSecteurAct, $user);


    }

    public function genererSuivi()  
    {
        $listeOffres = $this->entrepriseModele->getListeOffres();
        $entreprise = $this->entrepriseModele->getEntreprise();
        $this->entrepriseVue->afficherSuivi($listeOffres, $entreprise);

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
        $listeEntretien = $this->entrepriseModele->getListeEntretiens($this->parametres['offreMultiSelect']);
        $listeEntretienReponse = $this->entrepriseModele->getEntretienReponse($this->parametres['offreMultiSelect']);

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

    public function uploadLogo()
    {

        if($_FILES['source_logo']['size'] != 0)
        {
            $this->entrepriseModele->addDocument();
            EntrepriseObjet::setMessageSucces("Logo modifié avec succès !");
        }else{
            EntrepriseObjet::setMessageErreur("Aucun logo à ajouter !");
        }

        $this->consulterProfil();

    }

    public function modifierParametresIdentification()
    {

        $user = new UserObjet($this->parametres);

        if($user->getAutorisationBD())
        {

            if(!empty($user->getUsr_mot_de_passe()))
            {
                $this->entrepriseModele->updateMotDePasse($user);
            }

            $this->entrepriseModele->updateUserEmail($user);

            $_SESSION['login'] = $user->getUsr_email();

            UserObjet::setMessageSucces("Paramètres d'authentification modifiés avec succès !");

        }

        $this->consulterProfil();

    }

    public function modifierInformationsPersonnelles()
    {

        $entreprise = new EntrepriseObjet($this->parametres);

        if($entreprise->getAutorisationBD())
        {

            $this->entrepriseModele->updateInformationsPersonnelles($entreprise);

            EntrepriseObjet::setMessageSucces("Informations personnelles modifiées avec succès !");

        }

        $this->consulterProfil();

    }

    public function modifierInformationsContact()
    {

        $entreprise = new EntrepriseObjet($this->parametres);

        if($entreprise->getAutorisationBD())
        {

            $this->entrepriseModele->updateInformationsContact($entreprise);

            EntrepriseObjet::setMessageSucces("Informations de contact modifiées avec succès !");

        }

        $this->consulterProfil();

    }

    public function genererListeOffre(){
        $listeOffres = $this->offreModele->getListeOffres($_SESSION["login"]);
        $listeTypeContrat = $this->offreModele->getAllTypeContrat();
        $listeVilles = $this->offreModele->getAllVille();
        $listeSecteurActivite = $this->offreModele->getAllSecteurActivite();
        $entreprise = $this->entrepriseModele->getEntreprise();

        $this->entrepriseVue->afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite,$entreprise, $listeTypeContrat);
    }

    public function getEntretien()
    {

        $entretien = $this->entrepriseModele->getEntretien();

        echo(json_encode(array(
            "ent_id"=>$entretien['ent_id'],
            "che_nom"=>$entretien['che_nom'],
            "che_prenom"=>$entretien['che_prenom'],
            "che_mail"=>$entretien['che_mail'],
            "che_telephone"=>$entretien['che_telephone'],
            "commentaire"=>$entretien['ent_commentaire'],
            "date_entretien"=>$entretien['ent_date_entretien'],
            "modalites"=>$entretien['ent_modalites'],
            "token"=>$_SESSION['token']
        )));

    }

    public function editEntretien()
    {

        $this->entrepriseModele->editEntretien();

        $this->genererSuivi();

    }

    public function modifierReponseEntretien()
    {

        $this->entrepriseModele->editReponseEntretien();

        $this->genererSuivi();

    }

}