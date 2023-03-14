<?php

class AuthentificationModele extends Modele
{

    private $parametres;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function checkUser($email, $mdp)
    {

        $sql = 'SELECT * FROM T_User WHERE usr_email = ?';

        $resultat = $this->executeRequete($sql, array(
            $email
        ));

        $user = $resultat->fetch(PDO::FETCH_ASSOC);

        if(password_verify($mdp, $user['usr_mot_de_passe']))
        {

            return $user;

        }
        else
        {

            return false;

        }
        
    }

    public function createUser(UserObjet $user)
    {
        $_SESSION['mdp'] = $user->getUsr_mot_de_passe();
        //Hashage du mot de passe
        $user->setUsr_mot_de_passe(password_hash($user->getUsr_mot_de_passe(), PASSWORD_DEFAULT));

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

        $sql = "SELECT LAST_INSERT_ID()";

        $resultat = $this->executeRequete($sql);

        return $resultat->fetch(PDO::FETCH_ASSOC)['LAST_INSERT_ID()'];

    }

    public function createEntreprise($usr_id)
    {

        $sql = "INSERT INTO T_entreprise (ent_nom, ent_user) VALUES (?,?)";

        $this->executeRequete($sql, array(
            $this->parametres['ent_nom'],
            $usr_id
        ));

        $sql = "SELECT LAST_INSERT_ID()";

        $resultat = $this->executeRequete($sql);

        return $resultat->fetch(PDO::FETCH_ASSOC)['LAST_INSERT_ID()'];

    }

    public function getIdChercheurEmploi($user_id)
    {

        $sql = "SELECT che_id FROM T_Chercheur_Emploi WHERE che_user = ?";

        $resultat = $this->executeRequete($sql, array(
            $user_id
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC)['che_id'];

    }

    public function getIdEntreprise($ent_id)
    {

        $sql = 'SELECT ent_id FROM T_entreprise WHERE ent_user = ?';

        $resultat = $this->executeRequete($sql , array(
            $ent_id
        ));

        return $resultat->fetch(PDO::FETCH_ASSOC)['ent_id'];

    }

}