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

        foreach($listeOffres as $offre){
            $listeOffresObjet[] = new OffreObjet($offre);
        }
        
        return $listeOffresObjet;
    }

    public function getOffreFromId($id){

        $sql = "SELECT * FROM t_offre where off_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $id
        ));

        return new OffreObjet($resultat->fetch(PDO::FETCH_ASSOC));
    }

}