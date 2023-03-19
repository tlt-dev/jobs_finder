<?php

class EntrepriseModele extends Modele
{

    private $parametres = array();

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function addDocument($ent_id)
    {

        //Défini le chemin d'enregistrement
        $path = "mod_entreprise/documents/" . $ent_id . "/";

        //Répertoire de l'entreprise existe ?
        if(!file_exists($path))
        {

            mkdir($path, 0777, true);

        }
        
      $filename = $path . "logo.png";

        //On déplace le fichier de son emplacement temporaire à son emplacement final
        move_uploaded_file($_FILES['source_logo']['tmp_name'], $filename);
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

    public function getListeOffres()
    {
        $sql = 'SELECT off_id, off_intitule FROM `t_offre` where off_entreprise = ?';

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['ent_id']
        ));

        $listeOffres = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $listeOffres;
    }

    public function getEntId($login)
    {

        $sql = "SELECT ent_id FROM T_Entreprise INNER JOIN T_User ON ent_user = usr_id WHERE usr_email = ?";

        $resultat = $this->executeRequete($sql, array(
            $login
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC)["ent_id"];

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

   

    public function getListeCandidatureByOffreId($listeOffres)
    {

        $listecandidat = array();

        foreach($listeOffres as $offre)
        {

            $sql = 'SELECT * FROM `t_candidature` INNER JOIN t_chercheur_emploi ON t_candidature.can_chercheur = t_chercheur_emploi.che_id WHERE can_offre = ?';


            $resultat = $this->executeRequete($sql, array(
                $offre
            ));

            $listecandidat[] = $resultat->fetchAll(PDO::FETCH_ASSOC);
            

        }

        return $listecandidat;

    }

    public function addEntretien()
    {

        $sql = "INSERT INTO T_entretien (ent_offre, ent_chercheur, ent_date_entretien, ent_modalites) VALUES (?,?,?,?)";

        $this->executeRequete($sql, array(
           $this->parametres['ent_offre'],
           $this->parametres['ent_chercheur'],
           $this->parametres['ent_date_entretien'],
           $this->parametres['ent_modalites'],
        ));

    }


    public function editEntretien($entretienId)
    {

        $sql = 'UPDATE t_entretien SET ent_reponse = ?,      
         WHERE ent_id = ?';
        $this->executeRequete($sql, array(
            $entretienId
          
        ));

    }

   

    public function getEntretien($listeOffres)
    {


        $listeEntretien = array();

        foreach($listeOffres as $offre)
        {

            $sql = 'SELECT * FROM `t_entretien` where ent_offre = ? AND ent_statut = 1';


            $resultat = $this->executeRequete($sql, array(
                $offre
            ));

            $listeEntretien[] = $resultat->fetchAll(PDO::FETCH_ASSOC);
            

        }

        return $listeEntretien;

       

    }


    public function getEntretienReponse($listeOffres)
    {


        $listeEntretienReponse = array();

        foreach($listeOffres as $offre)
        {

            $sql = 'SELECT * FROM `t_entretien` where ent_offre = ? AND ent_statut = 2';


            $resultat = $this->executeRequete($sql, array(
                $offre
            ));

            $listeEntretienReponse[] = $resultat->fetchAll(PDO::FETCH_ASSOC);
            

        }

        return $listeEntretienReponse;

       

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