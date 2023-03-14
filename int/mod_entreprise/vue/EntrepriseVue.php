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

    public function afficherDashboard($entreprise, $listeChercheurEmploi, $listeCompetence)
    {

        $this->tpl->assign("entreprise", $entreprise);
        $this->tpl->assign("listeCompetence", $listeCompetence);
        $this->tpl->assign("listeChercheurEmploi", $listeChercheurEmploi);
        $this->tpl->display('mod_entreprise/vue/dashboardEntreprise.tpl');

    }

    public function afficherProfil($entreprise, $listeStatuts, $listeVilles, $userName, $listeSecteurs)
    {

        $this->tpl->assign("entreprise", $entreprise);
        $this->tpl->assign("listeVilles", $listeVilles);
        $this->tpl->assign("listeStatuts", $listeStatuts);
        $this->tpl->assign("listeSecteurs", $listeSecteurs);
        $this->tpl->assign("userName", $userName);
        $this->tpl->display('mod_entreprise/vue/profilEntrepriseV1.tpl');


    }

    public function afficherSuivi($listeOffres)
     {
        $this->tpl->assign('listeOffres', $listeOffres);
        $this->tpl->display('mod_entreprise/vue/suiviCandidat.tpl');
    }

    public function afficherListe($listeEntreprises)
    {

        //$this->tpl->assign('titre', "Liste Entreprises");
        $this->tpl->assign('listeEntreprises', $listeEntreprises);

        if (EntrepriseObjet::getMessageSucces() != "") {
            $this->tpl->assign('messageSucces', EntrepriseObjet::getMessageSucces());
        } else {
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_entreprise/vue/listeEntreprise.tpl');

    }

    public function afficherFicheEntreprise($entreprise)
    {

        switch ($this->parametres['action']) {
            case 'form_ajouter_entreprise':
            case 'ajouter_entreprise':
                $this->tpl->assign('titre', 'Ajouter une entreprise');
                $this->tpl->assign('action', 'ajouter_entreprise');
                break;
            case 'form_modifier_entreprise':
            case 'modifier_entreprise':
                $this->tpl->assign('titre', 'Modifier une entreprise');
                $this->tpl->assign('action', 'modifier_entreprise');
                break;

        }

        if (EntrepriseObjet::getMessageErreur() != "") {
            $this->tpl->assign('messageErreur', EntrepriseObjet::getMessageErreur());
        } else {
            $this->tpl->assign('messageErreur', '');
        }

        $this->tpl->assign('entreprise', $entreprise);

        $this->tpl->display('mod_entreprise/vue/ficheEntreprise.tpl');

    }

    public function afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite){
        $this->tpl->assign('titre', "Liste offres d'emplois");
        $this->tpl->assign('listeOffres', $listeOffres);
        $this->tpl->assign('listeVilles', $listeVilles);
        $this->tpl->assign('listeSecteurActivite', $listeSecteurActivite);

        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_entreprise/vue/listeOffre.tpl');
    }

}