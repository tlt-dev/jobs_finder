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

    public function getAllVille(){

        $sql = "SELECT * FROM t_ville";

        $resultat = $this->executeRequete($sql)->fetchAll();

        foreach($resultat as $ville){
            $listeVilles[$ville['vil_id']] = array(
                'vil_nom' => $ville['vil_nom'],
                'vil_code_postal' => $ville['vil_code_postal']
            );
        }

        return $listeVilles;
    }

    public function getAllSecteurActivite(){

        $sql = "SELECT * FROM t_secteur_activite";

        $resultat = $this->executeRequete($sql)->fetchAll();

        foreach($resultat as $secteurActivite){
            $listeSecteurActivite[$secteurActivite['sea_id']] = $secteurActivite['sea_libelle'];
        }

        return $listeSecteurActivite;

    }

    public function getAllSalaire(){

        $sql = "SELECT * FROM t_salaire";

        $resultat = $this->executeRequete($sql)->fetchAll();

        foreach($resultat as $salaire){
            $listeSalaire[$salaire['sal_id']] = $salaire['sal_libelle'];
        }

        return $listeSalaire;
    }

}