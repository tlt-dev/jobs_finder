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



            }

        }
        else
        {

            //Action par défaut
            $this->offreControleur->genererFormulaireOffre();

        }

    }

}