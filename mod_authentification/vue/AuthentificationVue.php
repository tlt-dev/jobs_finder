<?php

class AuthentificationVue
{

    private $parametres = array();
    private $tpl;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function afficherFormulaireAuthentification()
    {

        $this->tpl->assign('token', $_SESSION['token']);

        $this->tpl->display('mod_authentification/vue/formAuthentification.tpl');

    }

}