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

        //$user = new UserObjet($this->parametres);

        //var_dump($user);

        $email = $this->parametres['usr_email'];
        $mdp = $this->parametres['usr_mot_de_passe'];

        if($user = $this->authentificationModele->checkUser($email, $mdp))
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

                $entrepriseControleur = new EntrepriseControleur($new_parametres);

                $entrepriseControleur->genererDashboard();

            }

        }else{
            echo "mauvais mot de passe";
        }

    }

    public function inscription()
    {

        $user = new UserObjet($this->parametres);

        $user->setUsr_id($this->authentificationModele->createUser($user));

        if($user->getUsr_est_chercheur_emploi())
        {

            $this->authentificationModele->createChercheurEmploi($user->getUsr_id());

            $new_parametres = array();
            $new_parametres['ent_id'] = $user->getUsr_id();

            $utilisateurControleur = new UtilisateurControleur($new_parametres);

            $utilisateurControleur->genererDashboard();

        }
        else
        {

            $this->authentificationModele->createEntreprise($user->getUsr_id());

            $new_parametres = array();
            $new_parametres['ent_id'] = $user->getUsr_id();

            $entrepriseControleur = new EntrepriseControleur($new_parametres);

            $entrepriseControleur->genererDashboard();

        }

    }

}