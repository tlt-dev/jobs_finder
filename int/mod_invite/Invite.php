<?php

class Invite
{

    private $parametres = array();
    private $inviteControleur;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->inviteControleur = new InviteControleur($this->parametres);

    }

    public function choixAction()
    {

        if(isset($this->parametres['action ']))
        {

            switch($this->parametres['action'])
            {



            }

        }
        else
        {

            //Action par défaut

        }

    }

}