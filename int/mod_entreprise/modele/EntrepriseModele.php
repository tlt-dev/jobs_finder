<?php

class EntrepriseModele extends Modele
{

    private $parametres = array();

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }


    public function getListeEntreprises()
    {
        $arrayEntreprise = array();
        $sql = "SELECT * FROM t_entreprise";

        $resultat = $this->executeRequete($sql);

        $listeEntreprises = $resultat->fetchAll(PDO::FETCH_ASSOC);


        foreach ($listeEntreprises as $entreprise) {

            $arrayEntreprise[] = new EntrepriseObjet($entreprise);

        }

        return $arrayEntreprise;

    }

    public function getEntreprise()
    {

        $sql = 'SELECT * FROM t_entreprise WHERE ent_id = ?';

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['ent_id']
        ));

        return new EntrepriseObjet($resultat->fetch(PDO::FETCH_ASSOC));

    }

    public function getListeVilles()
    {
        $sql = "SELECT * FROM t_ville";

        $resultat = $this->executeRequete($sql);

        $listeVilles = $resultat->fetchAll(PDO::FETCH_ASSOC);


        return $listeVilles;
    }

    public function getListeStatuts()
    {
        $sql = "SELECT * FROM t_statut_juridique";

        $resultat = $this->executeRequete($sql);

        $listeStatuts = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $listeStatuts;
    }

    public function getListeSecteurAct()
    {
        $sql = "SELECT * FROM t_secteur_activite";

        $resultat = $this->executeRequete($sql);

        $listeSecteurAct = $resultat->fetchAll(PDO::FETCH_ASSOC);


        return $listeSecteurAct;
    }


    public function getListeChercheureEmploi()
    {

        $sql = 'SELECT * FROM t_chercheur_emploi';

        $resultat = $this->executeRequete($sql);

        $listeChercheurEmploi = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $listeChercheurEmploi;
    }


    public function getListeCompetence()
    {
        $sql = 'SELECT * FROM t_competence';

        $resultat = $this->executeRequete($sql);

        $listeCompetence = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $listeCompetence;

    }

    public function getUserMail($usrId)
    {

        $sql = 'SELECT * FROM t_user WHERE usr_id = ?';

        $resultat = $this->executeRequete($sql, array(
            $usrId
        ));

        $userName = $resultat->fetch(PDO::FETCH_ASSOC);
        return $userName;

    }


    public function editEntreprise($entreprise)
    {

        $sql = 'UPDATE t_entreprise SET ent_nom = ?, 
        ent_adresse1 = ?, 
        ent_adresse2 = ?, 
        ent_adresse3 = ?, 
        ent_adresse4 = ?, 
        ent_chiffre_affaires = ?, 
        ent_date_creation = ?, 
        ent_descriptif = ?, 
        ent_secteur_activite = ?, 
        ent_siren = ?, 
        ent_siret = ?, 
        ent_statut = ?, 
        ent_ville = ?
         WHERE ent_id = ?';
        $this->executeRequete($sql, array(
            $entreprise->getEnt_nom(),
            $entreprise->getEnt_adresse1(),
            $entreprise->getEnt_adresse2(),
            $entreprise->getEnt_adresse3(),
            $entreprise->getEnt_adresse4(),
            $entreprise->getEnt_chiffre_affaires(),
            $entreprise->getEnt_date_creation(),
            $entreprise->getEnt_descriptif(),
            $entreprise->getEnt_secteur_activite(),
            $entreprise->getEnt_siren(),
            $entreprise->getEnt_siret(),
            $entreprise->getEnt_statut(),
            $entreprise->getEnt_ville(),
            $entreprise->getEnt_id()
        ));

    }

    public function deleteEntreprise($entreprise)
    {

        $sql = "DELETE FROM t_entreprise WHERE ent_id = ?";

        $this->executeRequete($sql, array(
            $entreprise->getEnt_id()
        ));

    }
}