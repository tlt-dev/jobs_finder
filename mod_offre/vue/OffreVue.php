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

    public function afficherFormulaireModificationOffre($offre,$listeVilles,$listeSecteurActivite,$listeSalaire,$listeTypeContrat,$listePoste)
    {

        $this->tpl->assign('titre', "Modifier votre offre d'emploi");
        $this->tpl->assign('offre',$offre);
        $this->tpl->assign('listeVilles', $listeVilles);
        $this->tpl->assign('listeSecteurActivite', $listeSecteurActivite);
        $this->tpl->assign('listeSalaire', $listeSalaire);
        $this->tpl->assign('listeTypeContrat',$listeTypeContrat);
        $this->tpl->assign('listePoste',$listePoste);
        $this->tpl->assign('token', $_SESSION['token']);

        $this->tpl->assign('action', 'modifier_offre');
        
        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_offre/vue/formulaireModifierOffre.tpl');

    }

    public function afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite,$entreprise){

        $this->tpl->assign('titre', "Liste offres d'emplois");
        $this->tpl->assign('listeOffres', $listeOffres);
        $this->tpl->assign('listeVilles', $listeVilles);
        $this->tpl->assign('listeSecteurActivite', $listeSecteurActivite);
        $this->tpl->assign('token', $_SESSION['token']);
        $this->tpl->assign('entreprise',$entreprise);

        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_entreprise/vue/listeOffre.tpl');
    }

    public function afficherFormulaireCreationOffre($listeVilles,$listeSecteurActivite,$listeSalaire,$listeTypeContrat,$listePoste)
    {

        $this->tpl->assign('titre', "Créer votre offre d'emploi");
        $this->tpl->assign('listeVilles', $listeVilles);
        $this->tpl->assign('listeSecteurActivite', $listeSecteurActivite);
        $this->tpl->assign('listeSalaire', $listeSalaire);
        $this->tpl->assign('listeTypeContrat',$listeTypeContrat);
        $this->tpl->assign('listePoste',$listePoste);
        $this->tpl->assign('token', $_SESSION['token']);

        $this->tpl->assign('action', 'creer_offre');
        
        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_offre/vue/formulaireCreerOffre.tpl');

    }

}