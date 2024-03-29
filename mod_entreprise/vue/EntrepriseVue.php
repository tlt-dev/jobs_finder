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

    /*public function afficherAccueil()
    {

        $this->tpl->display('mod_entreprise/vue/listeEntreprise.tpl');

    }*/

    public function afficherDashboard($entreprise, $listeChercheurEmploi, $listeCompetence)
    {

        $this->tpl->assign("entreprise", $entreprise);
        $this->tpl->assign("listeCompetence", $listeCompetence);
        $this->tpl->assign("listeChercheurEmploi", $listeChercheurEmploi);
        $this->tpl->assign('token', $_SESSION['token']);
        $this->tpl->display('mod_entreprise/vue/dashboardEntreprise.tpl');

    }

    /*public function afficherProfil($entreprise, $listeStatuts, $listeVilles, $userName, $listeSecteurs)
    {

        $this->tpl->assign("entreprise", $entreprise);
        $this->tpl->assign("listeVilles", $listeVilles);
        $this->tpl->assign("listeStatuts", $listeStatuts);
        $this->tpl->assign("listeSecteurs", $listeSecteurs);
        $this->tpl->assign("userName", $userName);
        $this->tpl->assign('token', $_SESSION['token']);
        $this->tpl->display('mod_entreprise/vue/profil.tpl');


    }*/

    public function afficherProfil($entreprise, $listeStatuts, $listeVilles, $listeSecteurs, $user)
    {

        $this->tpl->assign("entreprise", $entreprise);
        $this->tpl->assign("listeVilles", $listeVilles);
        $this->tpl->assign("listeStatuts", $listeStatuts);
        $this->tpl->assign("listeSecteurs", $listeSecteurs);
        $this->tpl->assign('user', $user);
        $this->tpl->assign('token', $_SESSION['token']);

        if(EntrepriseObjet::getMessageErreur() != "" ) {
            $this->tpl->assign('messageErreur', EntrepriseObjet::getMessageErreur());
        }else if(UserObjet::getMessageErreur() != "") {
            $this->tpl->assign('messageErreur', UserObjet::getMessageErreur());
        } else {
            $this->tpl->assign('messageErreur', '');
        }

        if(EntrepriseObjet::getMessageSucces() != "") {
            $this->tpl->assign('messageSucces', EntrepriseObjet::getMessageSucces());
        } else if (UserObjet::getMessageSucces() != "") {
            $this->tpl->assign('messageSucces', UserObjet::getMessageSucces());
        } else {
            $this->tpl->assign('messageSucces', '');
        }

        $this->tpl->display('mod_entreprise/vue/profil.tpl');


    }

    public function afficherSuivi($listeOffres, $entreprise)
     {
        $this->tpl->assign('listeOffres', $listeOffres);
        $this->tpl->assign('token', $_SESSION['token']);
        $this->tpl->assign('entreprise', $entreprise);
        $this->tpl->display('mod_entreprise/vue/suiviCandidat.tpl');
    }


    public function afficherListeOffres($listeOffres,$listeVilles,$listeSecteurActivite,$entreprise, $listeTypeContrat){
        $this->tpl->assign('titre', "Liste offres d'emplois");
        $this->tpl->assign('listeOffres', $listeOffres);
        $this->tpl->assign('listeVilles', $listeVilles);
        $this->tpl->assign('listeTypeContrat', $listeTypeContrat);
        $this->tpl->assign('listeSecteurActivite', $listeSecteurActivite);
        $this->tpl->assign('token', $_SESSION['token']);
        $this->tpl->assign('entreprise', $entreprise);

        if(OffreObjet::getMessageSucces() != "")
        {
            $this->tpl->assign('messageSucces', OffreObjet::getMessageSucces());
        }else{
            $this->tpl->assign('messageSucces', '');
        }

        if(OffreObjet::getMessageErreur() != "")
        {
            $this->tpl->assign('messageErreur', OffreObjet::getMessageErreur());
        }else{
            $this->tpl->assign('messageErreur', '');
        }

        $this->tpl->display('mod_entreprise/vue/listeOffre.tpl');
    }

}