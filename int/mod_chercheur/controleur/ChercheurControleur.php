<?php

class ChercheurControleur
{

    private $parametres;
    private $chercheurModele;
    private $chercheurVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->chercheurModele = new ChercheurModele($this->parametres);
        $this->chercheurVue = new ChercheurVue($this->parametres);

    }

    public function genererProfil()
    {
        //Infos du profil
        $chercheur = $this->chercheurModele->getChercheur();

        $user = $this->chercheurModele->getUser();

        //Vue
        $this->chercheurVue->afficherProfil($chercheur, $user);

    }

    public function modifierProfil()
    {

        $controleChercheur = new ChercheurObjet($this->parametres);

        if($controleChercheur->getAutorisationBD())
        {

            $this->chercheurModele->editProfil($controleChercheur);
            ChercheurObjet::setMessageSucces("Infos personnelles modifiées avec succès !");


        }

        $user = $this->chercheurModele->getUser();

        $this->chercheurVue->afficherProfil($controleChercheur, $user);


    }

    public function uploadPhotoProfil()
    {

        $chercheur = $this->chercheurModele->getChercheur();
        $user = $this->chercheurModele->getUser();

        if($_FILES['source_photo_profil']['size'])
        {

            $path = "mod_chercheur/documents/" . $this->parametres['che_id'] . "/";

            if(!file_exists($path)) mkdir($path, true);

            $filename = $path . "logo.png";

            move_uploaded_file($_FILES['source_photo_profil']['tmp_name'], $filename);

            ChercheurObjet::setMessageSucces("Photo de profil modifiée avec succès !");
            $this->chercheurVue->afficherProfil($chercheur, $user);

        }else{

            ChercheurObjet::setMessageErreur("Aucun fichier à ajouter !");
            $this->chercheurVue->afficherProfil($chercheur, $user);

        }

    }

    public function updateParametresIdentification()
    {

        $chercheur = $this->chercheurModele->getChercheur();

        $controleUser = new UserObjet($this->parametres);

        var_dump($controleUser);

        if($controleUser->getAutorisationBD())
        {

            if(!empty($controleUser->getUsr_mot_de_passe()))
            {
                $this->chercheurModele->editUserMotDePasse($controleUser);
            }

            $this->chercheurModele->editUserEmail($controleUser);

            $_SESSION['login'] = $controleUser->getUsr_email();

            UserObjet::setMessageSucces("Paramètres d'authentification modifiés avec succès !");

        }

        $this->chercheurVue->afficherProfil($chercheur, $controleUser);

    }

}