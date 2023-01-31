<?php

class InviteControleur
{

    private $parametres = array();
    private $inviteModele;
    private $inviteVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->inviteModele = new InviteModele($this->parametres);
        $this->inviteVue = new InviteVue($this->parametres);

    }

}