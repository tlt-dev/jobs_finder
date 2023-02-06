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

        $this->tpl->display('mod_offre/vue/modalOffre.tpl');

    }

    public function afficherListeOffres($listeOffres){

        $this->tpl->assign('titre', "Liste offres d'emplois");
        $this->tpl->assign('listeOffress', $listeOffres);

        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_offre/vue/listeOffre.tpl');
    }

}