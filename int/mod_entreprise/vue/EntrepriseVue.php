<?php

class EntrepriseVue
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

        $this->tpl->display('mod_entreprise/vue/accueilEntreprise.tpl');

    }

}