<?php

class EntrepriseVue
{

    private $parametres = array();
    private $tpl;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function afficherAccueil()
    {

        $this->tpl->display('mod_entreprise/vue/listeEntreprise.tpl');

    }

    public function afficherListe($listeEntreprises)
    {

        //$this->tpl->assign('titre', "Liste Entreprises");
        $this->tpl->assign('listeEntreprises', $listeEntreprises);

        if(EntrepriseObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', EntrepriseObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_entreprise/vue/listeEntreprise.tpl');

    }

    public function afficherFicheEntreprise($entreprise)
    {

        switch($this->parametres['action'])
        {
            case 'form_ajouter_entreprise':
            case 'ajouter_entreprise':
                $this->tpl->assign('titre', 'Ajouter une entreprise');
                $this->tpl->assign('action', 'ajouter_entreprise');
                break;
            case 'form_modifier_entreprise':
            case 'modifierEntreprise':
                $this->tpl->assign('titre', 'Modifier une entreprise');
                $this->tpl->assign('action', 'modifier_entreprise');
                break;

        }

        if(EntrepriseObjet::getMessageErreur() != "")
        {
            $this->tpl->assign('messageErreur', EntrepriseObjet::getMessageErreur());
        }else{
            $this->tpl->assign('messageErreur', '');
        }

        $this->tpl->assign('entreprise', $entreprise);

        $this->tpl->display('mod_entreprise/vue/ficheEntreprise.tpl');

    }

}