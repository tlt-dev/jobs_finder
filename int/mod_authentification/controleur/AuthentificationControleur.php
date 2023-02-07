<?php

class AuthentificationControleur
{

    private $parametres = array();
    private $authentificationModele;
    private $authentificationVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->authentificationModele = new AuthentificationModele($this->parametres);
        $this->authentificationVue = new AuthentificationVue($this->parametres);

    }

    public function genererFormulaireAuthentification()
    {

        $this->authentificationVue->afficherFormulaireAuthentification();

    }

    public function verifierUtilisateur()
    {

        $user = new AuthentificationObjet($this->parametres);

        if($user = $this->authentificationModele->checkUser($user))
        {

            $_SESSION['login'] = $user->getUsr_email();

            if($user->getUsr_est_chercheur_emploi())
            {

                $new_parametres = array();
                $new_parametres['che_id'] = $user->getUsr_id();
                $_REQUEST['gestion'] = 'utilisateur';

                $utilisateurControleur = new UtilisateurControleur($new_parametres);

                $utilisateurControleur->genererAccueil();

            }
            else
            {

                $new_parametres = array();
                $new_parametres['ent_id'] = $user->getUsr_id();
                $_REQUEST['gestion'] = 'utilisateur';

                $entrepriseControleur = new EntrepriseControleur($new_parametres);

                $entrepriseControleur->genererAccueil();

            }

        }else{
            echo "mauvais mot de passe";
        }

    }

}