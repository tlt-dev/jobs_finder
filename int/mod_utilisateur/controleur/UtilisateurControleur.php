<?php

class UtilisateurControleur
{

    private $parametres;
    private $utilisateurModele;
    private $utilisateurVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->utilisateurModele = new UtilisateurModele($this->parametres);
        $this->utilisateurVue = new UtilisateurVue($this->parametres);

    }

    public function genererAccueil()
    {

        //Infos du profil
        $utilisateur = $this->utilisateurModele->getUtilisateur();

        //Liste Villes
        $listeVilles = $this->utilisateurModele->getListeVilles();

        //Liste Sexes
        $listeSexes = $this->utilisateurModele->getListeSexes();

        //Email
        $mail = $this->utilisateurModele->getMail($utilisateur->getChe_user());

        //Vue
        $this->utilisateurVue->afficherProfil($utilisateur, $listeVilles, $listeSexes, $mail);

    }

}