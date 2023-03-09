<?php

class UtilisateurModele extends Modele
{

    private $parametres = array();

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function getUtilisateur()
    {

        $sql = "SELECT * FROM T_Chercheur_Emploi WHERE che_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['che_id']
        ));

        return new UtilisateurObjet($resultat->fetch(PDO::FETCH_ASSOC));

    }

    public function getChercheursEmploiByCompetences($listeCompetences)
    {

        $listeChercheursEmploi = array();

        foreach($listeCompetences as $competence)
        {

            $sql = "SELECT * FROM T_Chercheur_Emploi as che" .
                " INNER JOIN T_Competence_Chercheur_Emploi AS cce ON cce.cce_competence = ?" .
                " WHERE che.che_id = cce.cce_chercheur_emploi";

            $resultat = $this->executeRequete($sql, array(
                $competence
            ));

            foreach($resultat->fetchAll(PDO::FETCH_ASSOC) as $chercheurEmploi)
            {

                //array_push($listeChercheursEmploi, new UtilisateurObjet($chercheurEmploi));
                array_push($listeChercheursEmploi, $chercheurEmploi);
            }
            

        }
        return $listeChercheursEmploi;

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

}