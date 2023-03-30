<?php

class Visiteur
{

    private $parametres = array();
    private $visiteurControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

        if(isset($_SESSION['login'])){
            $chercheurModele = new ChercheurModele(NULL);

            $this->parametres['che_id'] = $chercheurModele->getCheId($_SESSION['login']);
        }

        $this->visiteurControleur = new VisiteurControleur($this->parametres);

    }

    public function choixAction()
    {

        if(isset($this->parametres['action']))
        {

            switch($this->parametres['action'])
            {

                case 'recherche_poste':
                    $this->visiteurControleur->rechercheOffre();
                    break;
                case 'get_current_offre':
                    $this->visiteurControleur->getOffreById();
                    break;
                case "add_favori":
                    $this->visiteurControleur->addFavori();
                    break;
                case "retirer_favori":
                    $this->visiteurControleur->removeFavori();
                    break;
                case "add_candidature":
                    $this->visiteurControleur->addCandidature();
                    break;
                case "retirer_candidature":
                    $this->visiteurControleur->removeCandidature();
                    break;
            }

        }
        else
        {

            //Action par défaut
            $this->visiteurControleur->genererAccueil();

        }

    }

}