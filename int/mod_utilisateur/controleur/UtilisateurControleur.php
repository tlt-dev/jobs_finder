<?php

class UtilisateurControleur
{

    private $parametres;
    private $utilisateurModele;
    private $utilisateurVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->utilisateurModele = new UtilisateurModele($this->parametres);
        $this->utilisateurVue = new UtilisateurVue($this->parametres);

    }

}