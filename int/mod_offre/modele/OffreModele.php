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

    public function modifierOffre($offre){

        $sql = "UPDATE t_offre SET off_intitule = ?,
            off_secteur_activite = ?,
            off_ville = ?,
            off_date_prise_poste = ?,
            off_salaire = ?,
            off_duree = ?,
            off_descriptif = ?
            WHERE off_id = ?";

        $this->executeRequete($sql, array($offre->getOff_intitule(),
        $offre->getOff_secteur_activite(),
        $offre->getOff_ville(),
        $offre->getOff_date_prise_poste(),
        $offre->getOff_salaire(),
        $offre->getOff_duree(),
        $offre->getOff_descriptif(),
        $offre->getOff_id()));
    }

    public function creerOffre($offre){

        $sql = "INSERT INTO t_offre (
            off_intitule,
            off_secteur_activite,
            off_ville,
            off_date_prise_poste ,
            off_salaire,
            off_duree,
            off_descriptif
        ) VALUES (?,?,?,?,?,?,?)
        ";

        $this->executeRequete($sql, array($offre->getOff_intitule(),
        $offre->getOff_secteur_activite(),
        $offre->getOff_ville(),
        $offre->getOff_date_prise_poste(),
        $offre->getOff_salaire(),
        $offre->getOff_duree(),
        $offre->getOff_descriptif()));
    }

    public function supprimerOffre($id){

        $sql = "DELETE FROM t_offre 
        where off_id = ?";

        $this->executeRequete($sql,array($id));
    }

}