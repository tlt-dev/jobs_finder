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



            }

        }
        else
        {

            //Action par défaut

        }

    }

}