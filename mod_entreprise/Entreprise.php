<?php

class Entreprise
{

    private $parametres = array();
    private $entrepriseControleur;


    public function __construct($parametres)
    {

        $this->parametres = $parametres;
       


        if ((!isset($this->parametres['token'])) || ($_SESSION['token'] != $this->parametres['token'])) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        } else {

            if (!isset($this->parametres['ent_id'])) {
                $entrepriseModele = new EntrepriseModele(NULL);
                $ent_id = $entrepriseModele->getEntId($_SESSION["login"]);

                $this->parametres["ent_id"] = $ent_id;
            }

        }

        $this->entrepriseControleur = new EntrepriseControleur($this->parametres);

    }

    public function choixAction()
    {

        //On vérifie que l'utilisateur est authentifié
        if (isset($_SESSION['login'])) {
            if (isset($this->parametres['action'])) {

                switch ($this->parametres['action']) {

                    case 'modifier_entreprise':
                        $this->entrepriseControleur->modifierEntreprise();
                        break;
                    case 'generer_dashboard':
                        $this->entrepriseControleur->genererDashboard();
                        break;
                    case 'consulter_profil':
                        $this->entrepriseControleur->consulterProfil();
                        break;
                    case 'upload_logo':
                        $this->entrepriseControleur->uploadLogo();
                        break;
                    case 'update_parametres_identification':
                        $this->entrepriseControleur->modifierParametresIdentification();
                        break;
                    case 'modifier_informations_personnelles':
                        $this->entrepriseControleur->modifierInformationsPersonnelles();
                        break;
                    case 'modifier_informations_contact':
                        $this->entrepriseControleur->modifierInformationsContact();
                        break;
                    case 'generer_liste_offre':
                        $this->entrepriseControleur->genererListeOffre();
                        break;
                    case 'recherche_chercheur_emploi':
                        $this->entrepriseControleur->rechercheChercheurEmploi();
                        break;
                    case 'recherche_Candidat':
                        $this->entrepriseControleur->recherche_Candidat();
                        break;
                    case 'consulter_suivi':
                        $this->entrepriseControleur->genererSuivi();
                        break;
                    case 'get_entretien':
                        $this->entrepriseControleur->getEntretien();
                        break;
                    case 'add_entretien':
                        $this->entrepriseControleur->addEntretien();
                        break;
                    case 'get_ListeOffres':
                        $this->entrepriseControleur->getListeOffres();
                        break;
                    case 'get_listeChercheur':
                        $this->entrepriseControleur->getListeChercheur();
                        break;
                    case 'modifier_entretien':
                        $this->entrepriseControleur->editEntretien();
                        break;
                    case 'modifier_reponse_entretien':
                        $this->entrepriseControleur->modifierReponseEntretien();
                        break;



                }



            } else {


                $this->entrepriseControleur->genererDashboard();


            }

        } else {


        }

    }

}