<?php

class EntrepriseControleur
{

    private $parametres = array();
    private $entrepriseModele;
    private $entrepriseVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->entrepriseModele = new EntrepriseModele($this->parametres);
        $this->entrepriseVue = new EntrepriseVue($this->parametres);

    }

    /*public function genererAccueil()
    {

        $this->entrepriseVue->afficherAccueil();

    }*/

    public function genererListe()
    {

        $listeEntreprises = $this->entrepriseModele->getListeEntreprises();

        $this->entrepriseVue->afficherListe($listeEntreprises);

    }

    public function genererFicheEntreprise()
    {

        $entreprise = $this->entrepriseModele->getEntreprise();

        $this->entrepriseVue->afficherFicheEntreprise($entreprise);

    }

   


    public function formModifierEntreprise()
    {

        $entreprise = $this->entrepriseModele->getEntreprise();

        $this->entrepriseVue->afficherFicheEntreprise($entreprise);


    }

    public function formModifierEntrepriseModal()
    {

        $entreprise = $this->entrepriseModele->getEntreprise();

        echo(json_encode(array(
            "action"=>"modifier_entreprise",
            "titre"=>"Modifier l'entreprise",
            "button"=>"Modifier",
            "ent_id"=>$entreprise->getEnt_id(),
            "ent_nom"=>$entreprise->getEnt_nom()
        )));

    }


    public function modifierEntreprise()
    {
        $entreprise = new EntrepriseObjet($this->parametres);
        var_dump($entreprise);

        if(!$entreprise->getAutorisationBD()){
            $this->entrepriseVue->afficherFicheEntreprise($entreprise);
        }else{
            $this->entrepriseModele->editEntreprise($entreprise);
            EntrepriseObjet::setMessageSucces("Entreprise modifiée avec succès !");
            $this->genererListe();
        }

    }

    public function supprimerEntreprise()
    {

        $entreprise = new EntrepriseObjet($this->parametres);

        $this->entrepriseModele->deleteEntreprise($entreprise);

        EntrepriseObjet::setMessageSucces("Entreprise supprimée avec succès !");

        $this->genererListe();

    }

}