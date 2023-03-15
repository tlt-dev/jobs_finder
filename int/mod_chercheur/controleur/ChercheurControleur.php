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

            if(!file_exists($path)) mkdir($path, true);

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
            "off_nom_entreprise"=>$entreprise
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
            "ent_modalites"=>$entretien['ent_modalites']
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
            "ent_commentaire"=>$resultat['ent_commentaire']
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

}