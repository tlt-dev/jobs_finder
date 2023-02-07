<?php

class Authentification
{

    private $parametres = array();
    private $authentificationControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->authentificationControleur = new AuthentificationControleur($this->parametres);

    }

    public function choixAction()
    {

        if(isset($this->parametres['action']))
        {

            switch($this->parametres['action'])
            {

                case 'verifier_utilisateur':
                    $this->authentificationControleur->verifierUtilisateur();
                    break;

            }

        }
        else
        {

            //Action par défaut
            $this->authentificationControleur->genererFormulaireAuthentification();

        }

    }

}