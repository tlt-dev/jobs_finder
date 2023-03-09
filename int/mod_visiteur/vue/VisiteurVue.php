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

    public function afficherAccueil($listeOffre,$listePoste)
    {
        if(isset($_SESSION['type_user']))
        {
            if($_SESSION['type_user'] == 'chercheur')
            {
                $this->tpl->assign("chercheurConnected", 1);
                $this->tpl->assign('entrepriseConnected', 0);
            }
            else
            {
                $this->tpl->assign("chercheurConnected", 0);
                $this->tpl->assign('entrepriseConnected', 1);
            }
        }
        else
        {
            $this->tpl->assign('chercheurConnected', 0);
            $this->tpl->assign('entrepriseConnected', 0);
        }

        $this->tpl->assign("listeOffre",$listeOffre);
        $this->tpl->assign("listePoste",$listePoste);

        $this->tpl->display('mod_visiteur/vue/accueil.tpl');

    }

}