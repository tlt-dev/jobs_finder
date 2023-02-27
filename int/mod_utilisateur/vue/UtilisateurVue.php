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

    public function afficherProfil($utilisateur, $listeVilles, $listeSexes, $mail)
    {

        $this->tpl->assign('utilisateur', $utilisateur);
        $this->tpl->assign('listeVilles', $listeVilles);
        $this->tpl->assign('listeSexes', $listeSexes);
        $this->tpl->assign('mail', $mail);

        $this->tpl->display('mod_utilisateur/vue/accueilChercheur.tpl');

    }

}