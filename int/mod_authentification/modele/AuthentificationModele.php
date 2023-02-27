<?php

class AuthentificationModele extends Modele
{

    private $parametres;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function checkUser(UserObjet $user)
    {

        $sql = 'SELECT * FROM T_user WHERE usr_email = ? AND usr_mot_de_passe = ?';

        $resultat = $this->executeRequete($sql, array(
            $user->getUsr_email(),
            $user->getUsr_mot_de_passe()
        ));

        if($resultat)
        {
            return new UserObjet($resultat->fetch(PDO::FETCH_ASSOC));
        }

        return false;

    }

    public function createUser(UserObjet $user)
    {

        $sql = "INSERT INTO T_User (usr_email, usr_mot_de_passe, usr_est_chercheur_emploi) VALUES(?,?,?)";

        $this->executeRequete($sql, array(
            $user->getUsr_email(),
            $user->getUsr_mot_de_passe(),
            $user->getUsr_est_chercheur_emploi()
        ));

        $sql = "SELECT LAST_INSERT_ID()";

        $resultat = $this->executeRequete($sql);

        return $resultat->fetch(PDO::FETCH_ASSOC)['LAST_INSERT_ID()'];

    }

    public function createChercheurEmploi($usr_id)
    {

        $sql = "INSERT INTO T_chercheur_emploi (che_nom, che_prenom, che_user) VALUES (?,?,?)";

        $this->executeRequete($sql, array(
            $this->parametres['che_nom'],
            $this->parametres['che_prenom'],
            $usr_id
        ));

    }

    public function createEntreprise($usr_id)
    {

        $sql = "INSERT INTO T_entreprise (ent_nom, ent_user) VALUES (?,?)";

        $this->executeRequete($sql, array(
            $this->parametres['ent_nom'],
            $usr_id
        ));

    }

}