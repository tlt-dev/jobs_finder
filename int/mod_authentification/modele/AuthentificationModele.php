<?php

class AuthentificationModele extends Modele
{

    private $parametres;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function checkUser(AuthentificationObjet $user)
    {

        $sql = 'SELECT * FROM T_user WHERE usr_email = ? AND usr_mot_de_passe = ?';

        $resultat = $this->executeRequete($sql, array(
            $user->getUsr_email(),
            $user->getUsr_mot_de_passe()
        ));

        if($resultat)
        {
            return new AuthentificationObjet($resultat->fetch(PDO::FETCH_ASSOC));
        }

        return false;

    }

}