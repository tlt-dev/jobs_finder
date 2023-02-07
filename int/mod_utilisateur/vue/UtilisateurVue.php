<?php

class UtilisateurVue
{

    private $parametres = array();
    private $tpl;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function afficherAccueil()
    {

        $this->tpl->display('mod_utilisateur/vue/accueilChercheur.tpl');

    }

}