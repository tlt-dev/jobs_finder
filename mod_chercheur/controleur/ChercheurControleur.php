<?php

class ChercheurControleur
{

    private $parametres;
    private $chercheurModele;
    private $chercheurVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->chercheurModele = new ChercheurModele($this->parametres);
        $this->chercheurVue = new ChercheurVue($this->parametres);

    }

    public function genererProfil()
    {
        //Infos du profil
        $chercheur = $this->chercheurModele->getChercheur();

        $user = $this->chercheurModele->getUser();

        //Vue
        $this->chercheurVue->afficherProfil($chercheur, $user);

    }

    public function modifierProfil()
    {

        $controleChercheur = new ChercheurObjet($this->parametres);

        if($controleChercheur->getAutorisationBD())
        {

            $this->chercheurModele->editProfil($controleChercheur);
            ChercheurObjet::setMessageSucces("Infos personnelles modifiées avec succès !");


        }

        $user = $this->chercheurModele->getUser();

        $this->chercheurVue->afficherProfil($controleChercheur, $user);


    }

    public function uploadPhotoProfil()
    {

        $chercheur = $this->chercheurModele->getChercheur();
        $user = $this->chercheurModele->getUser();

        if($_FILES['source_photo_profil']['size'])
        {

            $path = "mod_chercheur/documents/" . $this->parametres['che_id'] . "/";

            if(!file_exists($path)) mkdir($path, 0777,true);

            $filename = $path . "logo.png";

            move_uploaded_file($_FILES['source_photo_profil']['tmp_name'], $filename);

            ChercheurObjet::setMessageSucces("Photo de profil modifiée avec succès !");
            $this->chercheurVue->afficherProfil($chercheur, $user);

        }else{

            ChercheurObjet::setMessageErreur("Aucun fichier à ajouter !");
            $this->chercheurVue->afficherProfil($chercheur, $user);

        }

    }

    public function updateParametresIdentification()
    {

        $chercheur = $this->chercheurModele->getChercheur();

        $controleUser = new UserObjet($this->parametres);

        if($controleUser->getAutorisationBD())
        {

            if(!empty($controleUser->getUsr_mot_de_passe()))
            {
                $this->chercheurModele->editUserMotDePasse($controleUser);
            }

            $this->chercheurModele->editUserEmail($controleUser);

            $_SESSION['login'] = $controleUser->getUsr_email();

            UserObjet::setMessageSucces("Paramètres d'authentification modifiés avec succès !");

        }

        $this->chercheurVue->afficherProfil($chercheur, $controleUser);

    }

    public function genererDashboard()
    {

        $offreControleur = new OffreControleur($this->parametres);
        $offreModele = new OffreModele($this->parametres);

        //Offres en favoris
        $offresFavories = $offreModele->getOffresFavoriesChercheur($this->parametres['che_id']);

        //Offres candidatées
        $listeCandidatures = $offreModele->getCandidaturesChercheur($this->parametres['che_id']);

        //Offres entretien
        $listeEntretiens = $offreModele->getEntretiensChercheur($this->parametres['che_id']);

        //Résultats d'entretiens
        $listeResultats = $offreModele->getResultatsEntretien($this->parametres['che_id']);

        $this->chercheurVue->afficherDashboard($offresFavories, $listeCandidatures, $listeEntretiens, $listeResultats);


    }

    public function getOffre()
    {

        $offreModele = new OffreModele($this->parametres);

        $offre = $offreModele->getOffreFromId($this->parametres['off_id']);
        $ville = $offreModele->getNomVille($offre->getOff_ville());
        $salaire = $offreModele->getSalaire($offre->getOff_salaire());
        $contrat = $offreModele->getContrat($offre->getOff_type_contrat());
        $secteur = $offreModele->getSecteurActivite($offre->getOff_secteur_activite());
        $entreprise = $offreModele->getNomEntreprise($offre->getOff_entreprise());

        echo(json_encode(array(
            "off_intitule"=>$offre->getOff_intitule(),
            "off_date_prise_poste"=>$offre->getOff_date_prise_poste(),
            "off_duree"=>$offre->getOff_duree(),
            "off_descriptif"=>$offre->getOff_descriptif(),
            "off_entreprise"=>$offre->getOff_entreprise(),
            "off_ville"=>$ville,
            "off_salaire"=>$salaire,
            "off_contrat"=>$contrat,
            "off_secteur"=>$secteur,
            "off_nom_entreprise"=>$entreprise,
            "token"=>$_SESSION['token']
        )));

    }

    public function candidaterOffre()
    {

        $this->chercheurModele->candidaterOffre();

        $this->genererDashboard();

    }

    public function retirerCandidatureOffre()
    {

        $this->chercheurModele->retirerCandidatureOffre();

        $this->genererDashboard();

    }

    public function getEntretien()
    {

        $offreModele = new OffreModele($this->parametres);

        $offre = $offreModele->getOffreFromId($this->parametres['off_id']);
        $ville = $offreModele->getNomVille($offre->getOff_ville());
        $salaire = $offreModele->getSalaire($offre->getOff_salaire());
        $contrat = $offreModele->getContrat($offre->getOff_type_contrat());
        $secteur = $offreModele->getSecteurActivite($offre->getOff_secteur_activite());
        $entreprise = $offreModele->getNomEntreprise($offre->getOff_entreprise());

        $entretien = $this->chercheurModele->getEntretien();

        echo(json_encode(array(
            "off_intitule"=>$offre->getOff_intitule(),
            "off_date_prise_poste"=>$offre->getOff_date_prise_poste(),
            "off_duree"=>$offre->getOff_duree(),
            "off_descriptif"=>$offre->getOff_descriptif(),
            "off_entreprise"=>$offre->getOff_entreprise(),
            "off_ville"=>$ville,
            "off_salaire"=>$salaire,
            "off_contrat"=>$contrat,
            "off_secteur"=>$secteur,
            "off_nom_entreprise"=>$entreprise,
            "ent_date_entretien"=>$entretien['ent_date_entretien'],
            "ent_modalites"=>$entretien['ent_modalites'],
            "token"=>$_SESSION['token']
        )));

    }

    public function repondreEntretien()
    {

        $this->chercheurModele->updateStatutEntretien();

        $this->genererDashboard();

    }

    public function getResultat()
    {

        $offreModele = new OffreModele($this->parametres);

        $offre = $offreModele->getOffreFromId($this->parametres['off_id']);
        $ville = $offreModele->getNomVille($offre->getOff_ville());
        $salaire = $offreModele->getSalaire($offre->getOff_salaire());
        $contrat = $offreModele->getContrat($offre->getOff_type_contrat());
        $secteur = $offreModele->getSecteurActivite($offre->getOff_secteur_activite());
        $entreprise = $offreModele->getNomEntreprise($offre->getOff_entreprise());

        $resultat = $this->chercheurModele->getResultat();

        echo(json_encode(array(
            "off_intitule"=>$offre->getOff_intitule(),
            "off_date_prise_poste"=>$offre->getOff_date_prise_poste(),
            "off_duree"=>$offre->getOff_duree(),
            "off_descriptif"=>$offre->getOff_descriptif(),
            "off_entreprise"=>$offre->getOff_entreprise(),
            "off_ville"=>$ville,
            "off_salaire"=>$salaire,
            "off_contrat"=>$contrat,
            "off_secteur"=>$secteur,
            "off_nom_entreprise"=>$entreprise,
            "ent_reponse"=>$resultat['ent_reponse'],
            "ent_commentaire"=>$resultat['ent_commentaire'],
            "token"=>$_SESSION['token']
        )));


    }

    public function genererFicheCv()
    {

        $chercheur = $this->chercheurModele->getChercheur();

        $description = NULL;

        if($cv = $this->chercheurModele->getCv()) $description = $cv['cv_description'];

        $formations = $this->chercheurModele->getFormations();
        $experiencesPro = $this->chercheurModele->getExperiencesPro();
        $competences = $this->chercheurModele->getCompetencesChercheur();
        $langues = $this->chercheurModele->getLanguesChercheur();
        $centresInteret = $this->chercheurModele->getCentresInteret();

        $listeVilles = $this->chercheurModele->getListeVilles();

        $ville = $this->chercheurModele->getVille($chercheur->getChe_ville());

        $this->chercheurVue->afficherFicheCV($chercheur, $description, $formations, $experiencesPro, $competences, $langues, $centresInteret, $ville, $listeVilles);

    }

    public function updateInfosPersonnelles()
    {

        $controleChercheur = new ChercheurObjet($this->parametres);

        $this->chercheurModele->updateInfosPersonnelles($controleChercheur);

        echo(json_encode(array(
            "messageSucces"=>"Modifié avec succès"
        )));

    }

    public function updateCvDescription()
    {

        $this->chercheurModele->updateCvDescription();

        echo(json_encode("ok"));

    }

    public function getListeVilles()
    {

        $listeVilles = $this->chercheurModele->getListeVilles();

        echo(json_encode(array(
            "listeVilles"=>$listeVilles
        )));

    }

    public function addFormation()
    {

        $this->chercheurModele->addFormation();

        $this->genererFicheCv();

    }

    public function deleteFormation()
    {

        $this->chercheurModele->deleteFormation();

        $this->genererFicheCv();

    }

    public function formEditFormation()
    {

        $formation = $this->chercheurModele->getFormation();
        $listeVilles = $this->chercheurModele->getListeVilles();

        echo(json_encode(array(
            "for_formation"=>$formation['for_formation'],
            "for_etablissement"=>$formation['for_etablissement'],
            "for_date_debut"=>$formation['for_date_debut'],
            "for_date_fin"=>$formation['for_date_fin'],
            "for_description"=>$formation['for_description'],
            "for_ville"=>$formation['for_ville'],
            "for_id"=>$formation['for_id'],
            "token"=>$_SESSION['token'],
            "action"=>"modifier_formation",
            "listeVilles"=>$listeVilles
        )));

    }

    public function editFormation()
    {

        $this->chercheurModele->editFormation();

        $this->genererFicheCv();

    }

    public function addExperiencePro()
    {

        $this->chercheurModele->addExperiencePro();

        $this->genererFicheCv();

    }

    public function deleteExperiencePro()
    {

        $this->chercheurModele->deleteExperiencePro();

        $this->genererFicheCv();

    }

    public function formEditExperiencePro()
    {

        $experiencePro = $this->chercheurModele->getExperiencePro();
        $listeVilles = $this->chercheurModele->getListeVilles();

        echo(json_encode(array(
            "exp_poste"=>$experiencePro['exp_poste'],
            "exp_employeur"=>$experiencePro['exp_employeur'],
            "exp_date_debut"=>$experiencePro['exp_date_debut'],
            "exp_date_fin"=>$experiencePro['exp_date_fin'],
            "exp_description"=>$experiencePro['exp_description'],
            "exp_ville"=>$experiencePro['exp_ville'],
            "exp_id"=>$experiencePro['exp_id'],
            "token"=>$_SESSION['token'],
            "action"=>"modifier_experiencePro",
            "listeVilles"=>$listeVilles
        )));

    }

    public function editExperiencePro()
    {

        $this->chercheurModele->editExperiencePro();

        $this->genererFicheCv();

    }

    public function formAddCompetence()
    {

        $listeCompetences = $this->chercheurModele->getListeCompetences();

        echo(json_encode(array(
            "listeCompetences"=>$listeCompetences
        )));

    }

    public function addCompetence()
    {

        $this->chercheurModele->addCompetence();

        $this->genererFicheCv();

    }

    public function deleteCompetence()
    {

        $this->chercheurModele->deleteCompetence();

        $this->genererFicheCv();

    }

    public function formEditCompetence()
    {

        $listeCompetences = $this->chercheurModele->getListeCompetences();

        $competence = $this->chercheurModele->getCompetence();

        echo(json_encode(array(
            "listeCompetences"=>$listeCompetences,
            "cce_niveau"=>$competence['cce_niveau'],
            "cce_id"=>$competence['cce_id'],
            "token"=>$_SESSION['token'],
            "action"=>"modifier_competence"
        )));

    }

    public function editCompetence()
    {

        $this->chercheurModele->editCompetence();

        $this->genererFicheCv();

    }

    public function getLibelleNiveau()
    {

        $libelleNiveau = $this->chercheurModele->getLibelleNiveau();

        echo(json_encode(array(
            "niv_libelle"=>$libelleNiveau
        )));

    }

    public function formAddLangue()
    {

        $listeLangues = $this->chercheurModele->getListeLangues();

        echo(json_encode(array(
            "listeLangues"=>$listeLangues
        )));

    }

    public function addLangue()
    {

        $this->chercheurModele->addLangue();

        $this->genererFicheCv();

    }

    public function deleteLangue()
    {

        $this->chercheurModele->deleteLangue();

        $this->genererFicheCv();

    }

    public function formEditLangue()
    {

        $listeLangues = $this->chercheurModele->getListeLangues();

        $langue = $this->chercheurModele->getLangue();

        echo(json_encode(array(
            "listeLangues"=>$listeLangues,
            "lce_niveau"=>$langue['lce_niveau'],
            "lce_id"=>$langue['lce_id'],
            "lce_langue"=>$langue['lce_langue'],
            "token"=>$_SESSION['token'],
            "action"=>"modifier_langue"
        )));

    }

    public function editLangue()
    {

        $this->chercheurModele->editLangue();

        $this->genererFicheCv();

    }

    public function addCentreInteret()
    {

        $this->chercheurModele->addCentreInteret();

        $this->genererFicheCv();

    }

    public function deleteCentreInteret()
    {

        $this->chercheurModele->deleteCentreInteret();

        $this->genererFicheCv();

    }

    public function formEditCentreInteret()
    {

        $langue = $this->chercheurModele->getCentreInteret();

        echo(json_encode(array(
            "cei_id"=>$langue['cei_id'],
            "cei_intitule"=>$langue['cei_intitule'],
            "token"=>$_SESSION['token'],
            "action"=>"modifier_centre_interet"
        )));

    }

    public function editCentreInteret()
    {

        $this->chercheurModele->editCentreInteret();

        $this->genererFicheCv();

    }

}