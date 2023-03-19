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

    public function afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite){

        $this->tpl->assign('titre', "Liste offres d'emplois");
        $this->tpl->assign('listeOffres', $listeOffres);
        $this->tpl->assign('listeVilles', $listeVilles);
        $this->tpl->assign('listeSecteurActivite', $listeSecteurActivite);
        $this->tpl->assign('token', $_SESSION['token']);

        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_entreprise/vue/listeOffre.tpl');
    }

}