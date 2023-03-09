<?php

class Offre
{

    private $parametres = array();
    private $offreControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->offreControleur = new OffreControleur($this->parametres);

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
                    $this->offreControleur->creerOffre();
                    break;
                case 'supprimer_offre':
                    $this->offreControleur->supprimerOffre();
            }

        }
        else
        {

            //Action par défaut
            $this->offreControleur->genererListeOffre();

        }

    }

    public function getOffre_controleur(){
        return $this->offreControleur;
    }

}