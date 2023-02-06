<?php

class OffreModele extends Modele
{

    private $parametres;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function getListeOffres()
    {

        $sql = "SELECT * FROM t_offre";

        $resultat = $this->executeRequete($sql);

        $listeOffres = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $listeOffres;

    }

}