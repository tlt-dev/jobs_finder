<?php

class VisiteurVue
{

    private $parametres = array();
    private $tpl;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function afficherAccueil($listeOffre)
    {

        $this->tpl->assign("listeOffre",$listeOffre);

        $this->tpl->display('mod_visiteur/vue/accueil.tpl');

    }

}