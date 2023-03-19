<?php

class Entreprise
{

    private $parametres = array();
    private $entrepriseControleur;





    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        var_dump($this->parametres);


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
                    /*case 'form_modifier_entreprise_modal':
                    $this->entrepriseControleur->formModifierEntrepriseModal();
                    break;*/
                    /*case 'form_modifier_entreprise':
                    $this->entrepriseControleur->formModifierEntreprise();
                    break;*/
                    case 'modifier_entreprise':
                        $this->entrepriseControleur->modifierEntreprise();
                        break;
                    case 'supprimer_entreprise':
                        $this->entrepriseControleur->supprimerEntreprise();
                        break;
                    /*case 'afficher_fiche':
                    $this->entrepriseControleur->genererFicheEntreprise();
                    break;*/
                    case 'generer_dashboard':
                        $this->entrepriseControleur->genererDashboard();
                        break;
                    case 'consulter_profil':
                        $this->entrepriseControleur->consulterProfil();
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
                    case 'add_entretien':
                        $this->entrepriseControleur->addEntretien();
                        break;
                    case 'get_ListeOffres':
                        $this->entrepriseControleur->getListeOffres();
                        break;
                    case 'get_listeChercheur':
                        $this->entrepriseControleur->getListeChercheur();
                        break;
                    case 'edit_entretien':
                        $this->entrepriseControleur->editEntretien();
                        break;

                }



            } else {


                $this->entrepriseControleur->genererDashboard();


            }

        } else {


        }

    }

}