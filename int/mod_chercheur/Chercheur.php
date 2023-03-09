<?php

class Chercheur
{

    private $parametres = array();
    private $chercheurControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

        if(!isset($this->parametres['che_id'])) {
            $chercheurModele = new ChercheurModele(NULL);
            $che_id = $chercheurModele->getCheId($_SESSION["login"]);

            $this->parametres["che_id"] = $che_id;
        }

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


                }

            }

        }
        else
        {

            //Go to page d'authentification

        }

    }

}