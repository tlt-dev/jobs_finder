<?php

class OffreEmploiVue
{

    private $parametres = array();
    private $tpl;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function afficherFormulaireOffreEmploi()
    {

        $this->tpl->display('mod_offre_emploi/vue/formOffreEmploi.tpl');

    }

}