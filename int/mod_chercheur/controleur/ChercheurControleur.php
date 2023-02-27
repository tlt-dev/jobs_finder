<?php

class ChercheurControleur
{

    private $parametres;
    private $chercheurModele;
    private $chercheurVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->chercheurModele = new ChercheurModele($this->parametres);
        $this->chercheurVue = new ChercheurVue($this->parametres);

    }

    public function genererAccueil()
    {

        //Infos du profil
        $chercheur = $this->chercheurModele->getChercheur();

        //Liste Villes
        $listeVilles = $this->chercheurModele->getListeVilles();

        //Liste Sexes
        $listeSexes = $this->chercheurModele->getListeSexes();

        //Email
        $mail = $this->chercheurModele->getMail($chercheur->getChe_user());

        //Vue
        $this->chercheurVue->afficherProfil($chercheur, $listeVilles, $listeSexes, $mail);

    }

}