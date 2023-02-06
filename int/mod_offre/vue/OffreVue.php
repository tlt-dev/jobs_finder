<?php

class OffreVue
{

    private $parametres = array();
    private $tpl;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function afficherFormulaireOffre()
    {

        $this->tpl->display('mod_offre/vue/formOffre.tpl');

    }

}