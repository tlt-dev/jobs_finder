<?php

class Chercheur
{

    private $parametres = array();
    private $chercheurControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

        if((!isset($this->parametres['token'])) || ($_SESSION['token']  != $this->parametres['token']))
        {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        }else{
            if(!isset($this->parametres['che_id'])) {
                $chercheurModele = new ChercheurModele(NULL);
                $che_id = $chercheurModele->getCheId($_SESSION["login"]);

                $this->parametres["che_id"] = $che_id;
            }

            $this->chercheurControleur = new ChercheurControleur($this->parametres);
        }


    }

    public function choixAction()
    {

        if(isset($_SESSION['login']))
        {

            if(isset($this->parametres['action']))
            {

                switch($this->parametres['action'])
                {


                    case 'generer_profil':
                        $this->chercheurControleur->genererProfil();
                        break;
                    case 'generer_dashboard':
                        $this->chercheurControleur->genererDashboard();
                        break;
                    case 'generer_fiche_cv':
                        $this->chercheurControleur->genererFicheCv();
                        break;
                    case 'modifier_profil':
                        $this->chercheurControleur->modifierProfil();
                        break;
                    case 'upload_photo_profil':
                        $this->chercheurControleur->uploadPhotoProfil();
                        break;
                    case 'update_parametres_identification':
                        $this->chercheurControleur->updateParametresIdentification();
                        break;
                    case 'get_offre':
                        $this->chercheurControleur->getOffre();
                        break;
                    case 'candidater_offre':
                        $this->chercheurControleur->candidaterOffre();
                        break;
                    case 'retirer_candidature_offre':
                        $this->chercheurControleur->retirerCandidatureOffre();
                        break;
                    case 'get_entretien':
                        $this->chercheurControleur->getEntretien();
                        break;
                    case 'repondre_entretien':
                        $this->chercheurControleur->repondreEntretien();
                        break;
                    case 'get_resultat':
                        $this->chercheurControleur->getResultat();
                        break;
                    case 'update_infos_personnelles':
                        $this->chercheurControleur->updateInfosPersonnelles();
                        break;
                    case 'update_cv_description':
                        $this->chercheurControleur->updateCvDescription();
                        break;
                    case 'get_liste_villes':
                        $this->chercheurControleur->getListeVilles();
                        break;
                    case 'add_formation':
                        $this->chercheurControleur->addFormation();
                        break;
                    case 'delete_formation':
                        $this->chercheurControleur->deleteFormation();
                        break;
                    case 'form_edit_formation':
                        $this->chercheurControleur->formEditFormation();
                        break;
                    case 'modifier_formation':
                        $this->chercheurControleur->editFormation();
                        break;
                    case 'add_experiencePro':
                        $this->chercheurControleur->addExperiencePro();
                        break;
                    case 'delete_experiencePro':
                        $this->chercheurControleur->deleteExperiencePro();
                        break;
                    case 'form_edit_experiencePro':
                        $this->chercheurControleur->formEditExperiencePro();
                        break;
                    case 'modifier_experiencePro':
                        $this->chercheurControleur->editExperiencePro();
                        break;
                    case 'add_competence':
                        $this->chercheurControleur->addCompetence();
                        break;
                    case 'delete_competence':
                        $this->chercheurControleur->deleteCompetence();
                        break;
                    case 'form_edit_competence':
                        $this->chercheurControleur->formEditCompetence();
                        break;
                    case 'modifier_competence':
                        $this->chercheurControleur->editCompetence();
                        break;
                    case 'get_libelle_niveau':
                        $this->chercheurControleur->getLibelleNiveau();
                        break;
                    case 'form_add_competence':
                        $this->chercheurControleur->formAddCompetence();
                        break;



                }

            }

        }
        else
        {

            //Go to page d'authentification

        }

    }

}