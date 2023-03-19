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

        $email = $this->parametres['usr_email'];
        $mdp = $this->parametres['usr_mot_de_passe'];

        if($user = $this->authentificationModele->checkUser($email,$mdp)){

            $_SESSION["login"] = $user['usr_email'];

            if($user['usr_est_chercheur_emploi'])
            {
                $_SESSION["type_user"] = "chercheur";

                echo(json_encode(array(
                    "gestion"=>"chercheur",
                    "action"=>"generer_dashboard",
                    "token"=>$_SESSION['token'],
                    "user_login"=>$user['usr_email'],
                    "message"=>""
                )));

            }
            else
            {
                $_SESSION["type_user"] = 'entreprise';

                echo(json_encode(array(
                    "gestion"=>"entreprise",
                    "action"=>"generer_dashboard",
                    "token"=>$_SESSION['token'],
                    "user_login"=>$user['usr_email'],
                    "message"=>""
                )));

            }

        }else{
            echo(json_encode(array(
                "usr_email"=>$email,
                "usr_mot_de_passe"=>password_hash($mdp,PASSWORD_DEFAULT),
                "message"=>"Email ou Mot de passe invalide !"
            )));
        }



    }

    /*public function verifierUtilisateur()
    {

        //$user = new UserObjet($this->parametres);

        //var_dump($user);
        $email = $this->parametres['usr_email'];
        $mdp = $this->parametres['usr_mot_de_passe'];

        var_dump($email);

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
            echo(json_encode(array(
                "message"=>"Le login ou le mot de passe est incorrect !",
                "email"=>$email,
                "mdp"=>$mdp
            )));
        }

    }*/

    public function inscription()
    {

        $user = new UserObjet($this->parametres);

        $user->setUsr_id($this->authentificationModele->createUser($user));

        if($user->getUsr_est_chercheur_emploi())
        {

            $che_id = $this->authentificationModele->createChercheurEmploi($user->getUsr_id());

            $new_parametres = array();
            $new_parametres['che_id'] = $che_id;

            $chercheurControleur = new ChercheurControleur($new_parametres);

            $chercheurControleur->genererDashboard();

        }
        else
        {

            $ent_id = $this->authentificationModele->createEntreprise($user->getUsr_id());

            $new_parametres = array();
            $new_parametres['ent_id'] = $ent_id;

            $entrepriseControleur = new EntrepriseControleur($new_parametres);

            $entrepriseControleur->genererDashboard();

        }

    }

    public function deconnexion()
    {

        session_destroy();

        $visiteurModele = new VisiteurControleur(NULL);
        $visiteurModele->genererAccueil();

    }

}