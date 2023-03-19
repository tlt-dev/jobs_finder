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

        $this->tpl->assign('token', $_SESSION['token']);

        $this->tpl->display('mod_chercheur/vue/profil.tpl');

    }

    public function afficherDashboard($offresFavories, $listeCandidatures, $listeEntretiens, $listeResultats)
    {

        $this->tpl->assign('offresFavories', $offresFavories);
        $this->tpl->assign('listeCandidatures', $listeCandidatures);
        $this->tpl->assign('listeEntretiens', $listeEntretiens);
        $this->tpl->assign('listeResultats', $listeResultats);

        $this->tpl->assign('token', $_SESSION['token']);


        $this->tpl->display('mod_chercheur/vue/dashboard.tpl');

    }

    public function afficherFicheCV($chercheur, $description, $formations, $experiencesPro, $competences, $langues, $centresInteret, $ville, $listeVilles)
    {

        $this->tpl->assign('chercheur', $chercheur);
        $this->tpl->assign('description', $description);
        $this->tpl->assign('listeFormationsChercheur', $formations);
        $this->tpl->assign('listeExperiencesProChercheur', $experiencesPro);
        $this->tpl->assign('listeCompetencesChercheur', $competences);
        $this->tpl->assign('listeLanguesChercheur', $langues);
        $this->tpl->assign('listeCentresInteretChercheur', $centresInteret);

        $this->tpl->assign('ville', $ville);
        $this->tpl->assign('listeVilles', $listeVilles);

        $this->tpl->assign('token', $_SESSION['token']);

        $this->tpl->display('mod_chercheur/vue/cv.tpl');


    }

}