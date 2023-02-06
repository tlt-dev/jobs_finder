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



                }

            }
            else
            {

                //Action par défaut
                $this->entrepriseControleur->genererAccueil();

            }

        }
        else
        {



        }

    }

}