<?php

class VisiteurModele extends Modele
{

    private $parametres = array();

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function getAllOffre(){

        $sql = "SELECT * from t_offre toff
        JOIN t_poste tp ON toff.off_poste=tp.pos_id
        JOIN t_ville tv ON toff.off_ville=tv.vil_id";

        return $this->executeRequete($sql)->fetchAll();
    }

}