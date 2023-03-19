<?php

class Visiteur
{

    private $parametres = array();
    private $visiteurControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->visiteurControleur = new VisiteurControleur($this->parametres);

    }

    public function choixAction()
    {

        if(isset($this->parametres['action ']))
        {

            switch($this->parametres['action'])
            {



            }

        }
        else
        {

            //Action par défaut
            $this->visiteurControleur->genererAccueil();

        }

    }

}