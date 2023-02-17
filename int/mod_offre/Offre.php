<?php

class Offre
{

    private $parametres = array();
    private $offreControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->offreControleur = new offreControleur($this->parametres);

    }

    public function choixAction()
    {

        if(isset($this->parametres['action']))
        {

            switch($this->parametres['action'])
            {

                case 'modifier_offre':
                    $this->offreControleur->modifierOffre();
                    break;
                case 'form_offre':
                    $this->offreControleur->genererFormulaireoffre();
                    break;
                case 'creer_offre':
                    $this->offreController->creerOffre();
                    break;
            }

        }
        else
        {

            //Action par défaut
            $this->offreControleur->genererListeOffre();

        }

    }

}