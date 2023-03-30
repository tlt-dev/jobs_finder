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
                case 'verifier_inscription':
                    $this->authentificationControleur->verifierInscription();
                    break;
                case 'inscription':
                    $this->authentificationControleur->inscription();
                    break;
                case 'deconnexion':
                    $this->authentificationControleur->deconnexion();
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