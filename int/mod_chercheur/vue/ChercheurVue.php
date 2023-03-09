<?php

class ChercheurVue
{

    private $parametres = array();
    private $tpl;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function afficherProfil($chercheur, $user)
    {

        $this->tpl->assign('chercheur', $chercheur);
        $this->tpl->assign('user', $user);

        if(ChercheurObjet::getMessageErreur() != "" ) {
            $this->tpl->assign('messageErreur', ChercheurObjet::getMessageErreur());
        }else if(UserObjet::getMessageErreur() != "") {
            $this->tpl->assign('messageErreur', UserObjet::getMessageErreur());
        } else {
            $this->tpl->assign('messageErreur', '');
        }

        if(ChercheurObjet::getMessageSucces() != "") {
            $this->tpl->assign('messageSucces', ChercheurObjet::getMessageSucces());
        } else if (UserObjet::getMessageSucces() != "") {
            $this->tpl->assign('messageSucces', UserObjet::getMessageSucces());
        } else {
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_chercheur/vue/profil.tpl');

    }

}