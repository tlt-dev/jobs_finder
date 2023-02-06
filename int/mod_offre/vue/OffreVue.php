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

    public function afficherFormulaireModificationOffre($offre)
    {

        $this->tpl->assign('titre', "Modifier offre d'emploi");
        $this->tpl->assign('offre',$offre);

        $this->tpl->assign('action', 'modifier_offre');
        
        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_offre/vue/formulaireModifierOffre.tpl');

    }

    public function afficherListeOffres($listeOffres){

        $this->tpl->assign('titre', "Liste offres d'emplois");
        $this->tpl->assign('listeOffres', $listeOffres);

        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_offre/vue/listeOffre.tpl');
    }

}