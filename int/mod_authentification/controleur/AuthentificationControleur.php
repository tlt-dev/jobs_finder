<?php

class AuthentificationControleur
{

    private $parametres = array();
    private $authentificationModele;
    private $authentificationVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->authentificationModele = new AuthentificationModele($this->parametres);
        $this->authentificationVue = new AuthentificationVue($this->parametres);

    }

}