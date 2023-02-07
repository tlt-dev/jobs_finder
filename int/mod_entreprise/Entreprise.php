<?php

class Entreprise
{

    private $parametres = array();
    private $entrepriseControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->entrepriseControleur = new EntrepriseControleur($this->parametres);

    }

    public function choixAction()
    {

        //On vérifie que l'utilisateur est authentifié
        if(isset($_SESSION['login']))
        {
            if(isset($this->parametres['action']))
            {

                switch($this->parametres['action'])
                {
                    /*case 'form_ajouter_entreprise':
                        $this->entrepriseControleur->formAjouterEntreprise($this->parametres->getEnt_id());
                        break;*/
                    /*case 'form_ajouter_entreprise_modal':
                        $this->entrepriseControleur->formAjouterEntrepriseModal();
                        break;
                    case 'ajouter_entreprise':
                        $this->entrepriseControleur->ajouterEntreprise();
                        break;*/
                    case 'form_modifier_entreprise_modal':
                        echo ('ici');
                        $this->entrepriseControleur->formModifierEntrepriseModal();
                        break;
                    case 'form_modifier_entreprise':
                        $this->entrepriseControleur->formModifierEntreprise();
                        break;
                    case 'modifier_entreprise':
                        $this->entrepriseControleur->modifierEntreprise();
                        break;
                    case 'supprimer_entreprise':
                        $this->entrepriseControleur->supprimerEntreprise();
                        break;
                    case 'afficher_fiche':
                        $this->entrepriseControleur->genererFicheEntreprise();
                        break;



                }

            }
            else
            {

                //Action par défaut
                $this->entrepriseControleur->genererListe();

            }

        }
        else
        {



        }

    }

}