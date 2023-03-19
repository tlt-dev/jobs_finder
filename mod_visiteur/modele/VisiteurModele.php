<?php

class VisiteurModele extends Modele
{

    private $parametres = array();

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

}