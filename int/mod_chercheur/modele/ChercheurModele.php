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
                " WHERE che.che_id = cce.chercheur_emploi";

            $resultat = $this->executeRequete($sql, array(
                $competence["cce_id"]
            ));

            foreach($resultat->fetchAll(PDO::FETCH_ASSOC) as $chercheurEmploi)
            {

                array_push($listeChercheursEmploi, new ChercheurObjet($chercheurEmploi));

            }

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

    public function getListeDepartements()
    {

        $sql = "SELECT * FROM T_Departement";

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

}