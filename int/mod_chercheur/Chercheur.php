<?php

class Chercheur
{

    private $parametres = array();
    private $chercheurControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->chercheurControleur = new ChercheurControleur($this->parametres);

    }

    public function choixAction()
    {

        if(isset($_SESSION['login']))
        {

            if(isset($this->parametres['action']))
            {

                switch($this->parametres['action'])
                {

                    case 'generer_dashboard':
                        $this->utilisateurControleur->genererDashboard();
                        break;
                    case 'form_modifier_profil':
                        $this->utilisateurControleur->formModifierProfil();
                        break;
                    case 'modifier_profil':
                        $this->utilisateurControleur->modifierProfil();
                        break;

                }

            }
            else
            {

                //Action par défaut
                $this->utilisateurControleur->genererAccueil();

            }

        }
        else
        {

            //Go to page d'authentification

        }

    }

}