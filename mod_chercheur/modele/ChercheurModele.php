<?php

class ChercheurModele extends Modele
{

    private $parametres = array();

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function getChercheur()
    {

        $sql = "SELECT * FROM T_Chercheur_Emploi WHERE che_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        return new ChercheurObjet($resultat->fetch(PDO::FETCH_ASSOC));

    }

    public function getCheId($login)
    {

        $sql = "SELECT che_id FROM T_Chercheur_Emploi INNER JOIN T_User ON usr_id = che_user WHERE usr_email = ?";

        $resultat = $this->executeRequete($sql, array(
            $login
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC)["che_id"];

    }

    public function getChercheursEmploiByCompetences($listeCompetences)
    {

        $listeChercheursEmploi = array();

        foreach($listeCompetences as $competence)
        {

            $sql = "SELECT * FROM T_Chercheur_Emploi as che" .
                " INNER JOIN T_Competence_Chercheur_Emploi AS cce ON cce.cce_competence = ?" .
                " WHERE che.che_id = cce.cce_chercheur";

            $resultat = $this->executeRequete($sql, array(
                $competence
            ));

            array_push($listeChercheursEmploi, $resultat->fetchAll(PDO::FETCH_ASSOC));
           

        }

        return $listeChercheursEmploi;

    }

    public function getListeChercheursEmploi()
    {

        $sql = "SELECT * FROM " . P . "T_Chercheur_Emploi";

        $resultat = $this->executeRequete($sql);

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }


    public function getListeVilles()
    {

        $sql = "SELECT * FROM T_Ville";

        $resultat = $this->executeRequete($sql);

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getListeSexes()
    {

        $sql = "SELECT * FROM T_Sexe";

        $resultat = $this->executeRequete($sql);

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMail($usr_id)
    {

        $sql = "SELECT usr_email FROM t_User WHERE usr_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $usr_id
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    public function editProfil(ChercheurObjet $chercheur)
    {

        $che_id = $this->getCheId($_SESSION['login']);

        $sql = "UPDATE T_Chercheur_Emploi SET che_nom = ?, che_prenom = ?, che_sexe = ?, che_date_naissance = ?,"
            . " che_telephone = ?, che_mail = ?, che_adresse = ?, che_ville = ?, che_en_recherche = ?"
            . " WHERE che_id = ?";

        $this->executeRequete($sql, array(
            $chercheur->getChe_nom(),
            $chercheur->getChe_prenom(),
            $chercheur->getChe_sexe(),
            $chercheur->getChe_date_naissance(),
            $chercheur->getChe_telephone(),
            $chercheur->getChe_mail(),
            $chercheur->getChe_adresse(),
            $chercheur->getChe_ville(),
            $chercheur->getChe_en_recherche(),
            $che_id
        ));

    }

    public function getUser()
    {

        $sql = "SELECT * FROM T_User WHERE usr_email = ?";

        $resultat = $this->executeRequete($sql, array(
            $_SESSION['login']
        ));

        return new UserObjet($resultat->fetch(PDO::FETCH_ASSOC));

    }

    public function editUserMotDePasse(UserObjet $user)
    {

        $mdp = password_hash($user->getUsr_mot_de_passe(), PASSWORD_DEFAULT);

        $sql = "UPDATE T_User SET usr_mot_de_passe = ? WHERE usr_email = ?";

        $this->executeRequete($sql, array(
            $mdp,
            $_SESSION['login']
        ));

    }

    public function editUserEmail(UserObjet $user)
    {

        $sql = "UPDATE T_User SET usr_email = ? WHERE usr_email = ?";

        $this->executeRequete($sql, array(
            $user->getUsr_email(),
            $_SESSION['login']
        ));

    }

    public function candidaterOffre()
    {

        $sql = "INSERT INTO T_Candidature (can_chercheur, can_offre) VALUES (?,?)";

        $this->executeRequete($sql, array(
            $this->parametres['che_id'],
            $this->parametres['off_id']
        ));

    }

    public function retirerCandidatureOffre()
    {

        $sql = "DELETE FROM T_Candidature WHERE can_chercheur = ? AND can_offre = ?";

        $this->executeRequete($sql, array(
            $this->parametres['che_id'],
            $this->parametres['off_id']
        ));

    }

    public function getEntretien()
    {

        $sql = "SELECT * FROM T_Entretien WHERE ent_chercheur = ? AND ent_offre = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id'],
            $this->parametres['off_id']
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    public function updateStatutEntretien()
    {

        if($this->parametres['reponse'] == 1){
            $statut = 2;
        }else{
            $statut = 3;
        }

        $sql = "UPDATE T_Entretien SET ent_statut = ?, ent_reponse = ? WHERE ent_chercheur = ? AND ent_offre = ?";

        $this->executeRequete($sql, array(
            $statut,
            1,
            $this->parametres['che_id'],
            $this->parametres['off_id']
        ));

    }

    public function getResultat()
    {

        $sql = "SELECT * FROM T_Entretien WHERE ent_chercheur = ? AND ent_offre = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id'],
            $this->parametres['off_id']
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    public function getCv()
    {

        $sql = "SELECT cv_description FROM T_Cv WHERE cv_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    public function getFormations()
    {

        $sql = "SELECT * FROM T_Formation WHERE for_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getExperiencesPro()
    {

        $sql = "SELECT * FROM T_Experience_Pro WHERE exp_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getCompetencesChercheur()
    {

        $sql = "SELECT cce_id, com_libelle, cce_niveau, niv_libelle FROM T_Competence"
            . " INNER JOIN T_Competence_Chercheur_Emploi ON com_id = cce_competence"
            . " INNER JOIN T_Niveau ON cce_niveau = niv_id"
            . " WHERE cce_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
           $this->parametres['che_id']
        ));

        return $resultat->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLanguesChercheur()
    {

        $sql = "SELECT lan_id, lan_nom, lce_niveau, niv_libelle FROM T_Langue"
            . " INNER JOIN T_Langue_Chercheur_Emploi ON lce_id = lan_id"
            . " INNER JOIN T_niveau on niv_id = lce_niveau"
            . " WHERE lce_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getCentresInteret()
    {

        $sql = "SELECT * FROM T_Centre_Interet WHERE cei_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getVille($vil_id)
    {

        $sql = "SELECT vil_nom FROM T_Ville WHERE vil_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $vil_id
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC)['vil_nom'];

    }

    public function updateInfosPersonnelles(ChercheurObjet $chercheur)
    {

        $sql = "UPDATE T_Chercheur_Emploi SET che_nom = ?, che_prenom = ?,"
            . " che_telephone = ?, che_mail = ?, che_adresse = ?, che_ville = ?, che_code_postal = ?, che_en_recherche = ?"
            . " WHERE che_id = ?";

        $this->executeRequete($sql, array(
            $chercheur->getChe_nom(),
            $chercheur->getChe_prenom(),
            $chercheur->getChe_telephone(),
            $chercheur->getChe_mail(),
            $chercheur->getChe_adresse(),
            $chercheur->getChe_ville(),
            $chercheur->getChe_code_postal(),
            $chercheur->getChe_en_recherche(),
            $this->parametres['che_id']
        ));

    }

    public function updateCvDescription()
    {

        $sql = "SELECT * FROM T_CV WHERE cv_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        if($resultat->fetch(PDO::FETCH_ASSOC)){
            $sql = 'UPDATE T_CV SET cv_description = ? WHERE cv_chercheur = ?';
        }else{
            $sql = 'INSERT INTO T_CV (cv_description, cv_chercheur) VALUES (?,?)';
        }

        $this->executeRequete($sql, array(
            $this->parametres['cv_description'],
            $this->parametres['che_id']
        ));

    }

    public function getFormation()
    {

        $sql = "SELECT * FROM T_Formation WHERE for_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['for_id']
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    public function addFormation()
    {

        $sql = "INSERT INTO T_Formation (for_formation, for_etablissement, for_ville, for_date_debut, for_date_fin, for_description, for_chercheur) VALUES (?,?,?,?,?,?,?)";

        $this->executeRequete($sql, array(
           $this->parametres['for_formation'],
           $this->parametres['for_etablissement'],
           $this->parametres['for_ville'],
           $this->parametres['for_date_debut'],
           $this->parametres['for_date_fin'],
           $this->parametres['for_description'],
           $this->parametres['che_id']
        ));

    }

    public function deleteFormation()
    {

        $sql = "DELETE FROM T_Formation WHERE for_id = ?";

        $this->executeRequete($sql, array(
            $this->parametres['for_id']
        ));

    }

    public function editFormation()
    {

        $sql = "UPDATE T_Formation SET for_formation=?, for_etablissement=?, for_ville=?, for_date_debut=?, for_date_fin=?, for_description=? WHERE for_id=?";

        $this->executeRequete($sql, array(
           $this->parametres['for_formation'],
           $this->parametres['for_etablissement'],
           $this->parametres['for_ville'],
           $this->parametres['for_date_debut'],
           $this->parametres['for_date_fin'],
           $this->parametres['for_description'],
           $this->parametres['for_id']
        ));

    }

    public function getExperiencePro()
    {

        $sql = "SELECT * FROM T_Experience_Pro WHERE exp_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['exp_id']
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    public function addExperiencePro()
    {

        $sql = "INSERT INTO T_Experience_Pro (exp_poste, exp_employeur, exp_ville, exp_date_debut, exp_date_fin, exp_description, exp_chercheur) VALUES (?,?,?,?,?,?,?)";

        $this->executeRequete($sql, array(
            $this->parametres['exp_poste'],
            $this->parametres['exp_employeur'],
            $this->parametres['exp_ville'],
            $this->parametres['exp_date_debut'],
            $this->parametres['exp_date_fin'],
            $this->parametres['exp_description'],
            $this->parametres['che_id']
        ));

    }

    public function deleteExperiencePro()
    {

        $sql = "DELETE FROM T_Experience_Pro WHERE exp_id = ?";

        $this->executeRequete($sql, array(
            $this->parametres['exp_id']
        ));

    }

    public function editExperiencePro()
    {

        $sql = "UPDATE T_Experience_Pro SET exp_poste=?, exp_employeur=?, exp_ville=?, exp_date_debut=?, exp_date_fin=?, exp_description=? WHERE exp_id=?";

        $this->executeRequete($sql, array(
            $this->parametres['exp_poste'],
            $this->parametres['exp_employeur'],
            $this->parametres['exp_ville'],
            $this->parametres['exp_date_debut'],
            $this->parametres['exp_date_fin'],
            $this->parametres['exp_description'],
            $this->parametres['exp_id']
        ));

    }

    public function addCompetence()
    {

        $sql = "INSERT INTO T_Competence_Chercheur_Emploi (cce_chercheur, cce_competence, cce_niveau) VALUES (?,?,?)";

        $this->executeRequete($sql, array(
            $this->parametres['che_id'],
            $this->parametres['cce_competence'],
            $this->parametres['cce_niveau']
        ));

    }

    public function deleteCompetence()
    {

        $sql = "DELETE FROM T_Competence_Chercheur_Emploi WHERE cce_id = ?";

        $this->executeRequete($sql, array(
            $this->parametres['cce_id'],
        ));

    }

    public function getListeCompetences()
    {

        $sql = "SELECT * FROM T_Competence";

        $resultat = $this->executeRequete($sql);

        return $resultat->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getCompetence()
    {

        $sql = "SELECT * FROM T_Competence_Chercheur_Emploi WHERE cce_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['cce_id']
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);

    }

    public function editCompetence()
    {

        $sql = "UPDATE T_Competence_Chercheur_Emploi SET cce_competence = ?, cce_niveau = ? WHERE cce_id = ?";

        $this->executeRequete($sql, array(
            $this->parametres['cce_competence'],
            $this->parametres['cce_niveau'],
            $this->parametres['cce_id']
        ));

    }

    public function getLibelleNiveau()
    {

        $sql = "SELECT niv_libelle FROM T_Niveau WHERE niv_id = ?";

        $resultat = $this->executeRequete($sql, array(
           $this->parametres['cce_niveau']
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC);
    }


}