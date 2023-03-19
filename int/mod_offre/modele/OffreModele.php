<?php

class OffreModele extends Modele
{

    private $parametres;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    public function getListeOffres($login = null)
    {

        $sql = "SELECT * FROM t_offre";
        if (!is_null($login)) {
            $sql .= " JOIN t_entreprise ON t_entreprise.ent_id=t_offre.off_entreprise
            JOIN t_user ON t_user.usr_id=t_entreprise.ent_user
            WHERE usr_email=?";
            $resultat = $this->executeRequete($sql, array($login));
        } else {
            $resultat = $this->executeRequete($sql);
        }

        $listeOffres = $resultat->fetchAll(PDO::FETCH_ASSOC);

        $listeOffresObjet = array();

        foreach ($listeOffres as $offre) {
            $listeOffresObjet[] = new OffreObjet($offre);
        }

        return $listeOffresObjet;
    }

    public function getOffreFromId($id)
    {

        $sql = "SELECT * FROM T_Offre where off_id = ?";

        $resultat = $this->executeRequete(
            $sql,
            array(
                $id
            )
        );

        return new OffreObjet($resultat->fetch(PDO::FETCH_ASSOC));
    }

    public function getAllVille()
    {

        $sql = "SELECT * FROM t_ville";

        $resultat = $this->executeRequete($sql)->fetchAll();

        foreach ($resultat as $ville) {
            $listeVilles[$ville['vil_id']] = array(
                'vil_nom' => $ville['vil_nom'],
                'vil_code_postal' => $ville['vil_code_postal']
            );
        }

        return $listeVilles;
    }

    public function getAllTypeContrat()
    {

        $sql = "SELECT * FROM t_type_contrat";

        $resultat = $this->executeRequete($sql)->fetchAll();

        foreach ($resultat as $typeContrat) {
            $listeTypeContrat[$typeContrat['tco_id']] = $typeContrat['tco_libelle'];
        }

        return $listeTypeContrat;
    }

    public function getAllSecteurActivite()
    {

        $sql = "SELECT * FROM t_secteur_activite";

        $resultat = $this->executeRequete($sql)->fetchAll();

        foreach ($resultat as $secteurActivite) {
            $listeSecteurActivite[$secteurActivite['sea_id']] = $secteurActivite['sea_libelle'];
        }

        return $listeSecteurActivite;

    }

    public function getAllSalaire()
    {

        $sql = "SELECT * FROM t_salaire";

        $resultat = $this->executeRequete($sql)->fetchAll();

        foreach ($resultat as $salaire) {
            $listeSalaire[$salaire['sal_id']] = $salaire['sal_libelle'];
        }

        return $listeSalaire;
    }

    public function modifierOffre($offre)
    {
        $sql = "UPDATE t_offre SET off_intitule = ?,
            off_secteur_activite = ?,
            off_ville = ?,
            off_date_prise_poste = ?,
            off_salaire = ?,
            off_duree = ?,
            off_descriptif = ?,
            off_type_contrat = ?
            WHERE off_id = ?";

        $this->executeRequete(
            $sql,
            array(
                $offre->getOff_intitule(),
                $offre->getOff_secteur_activite(),
                $offre->getOff_ville(),
                $offre->getOff_date_prise_poste(),
                $offre->getOff_salaire(),
                $offre->getOff_duree() == null ? 1 : $offre->getOff_duree(),
                $offre->getOff_descriptif(),
                $offre->getOff_type_contrat(),
                $offre->getOff_id()
            )
        );
    }

    public function creerOffre($offre)
    {

        $sql = "INSERT INTO t_offre (
            off_intitule,
            off_secteur_activite,
            off_ville,
            off_date_prise_poste ,
            off_salaire,
            off_duree,
            off_descriptif,
            off_type_contrat,
            off_entreprise
        ) VALUES (?,?,?,?,?,?,?,?,?)";

        $this->executeRequete(
            $sql,
            array(
                $offre->getOff_intitule(),
                $offre->getOff_secteur_activite(),
                $offre->getOff_ville(),
                $offre->getOff_date_prise_poste(),
                $offre->getOff_salaire(),
                $offre->getOff_duree() == null ? 1 : $offre->getOff_duree(),
                $offre->getOff_descriptif(),
                $offre->getOff_type_contrat(),
                $offre->getOff_entreprise()
            )
        );
    }

    public function supprimerOffre($id)
    {

        $sql = "DELETE FROM t_offre 
        where off_id = ?";

        $this->executeRequete($sql, array($id));
    }

    public function getOffresFavoriesChercheur($che_id)
    {

        $sql = "SELECT * FROM T_Offre INNER JOIN T_Favori_Chercheur_Emploi ON off_id = fce_offre WHERE fce_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $che_id
        )
        );

        $listeFavories = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if ($listeFavories) {
            foreach ($listeFavories as $key => $value) {
                $listeFavories[$key]['ent_nom'] = $this->getNomEntreprise($listeFavories[$key]['off_entreprise']);
                $listeFavories[$key]['vil_nom'] = $this->getNomVille($listeFavories[$key]['off_ville']);
            }

        }

        return $listeFavories;

    }

    public function getCandidaturesChercheur($che_id)
    {

        $sql = "SELECT * FROM T_Offre INNER JOIN T_Candidature ON off_id = can_offre WHERE can_chercheur = ?";

        $resultat = $this->executeRequete($sql, array(
            $che_id
        )
        );

        $listeCandidatures = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if ($listeCandidatures) {
            foreach ($listeCandidatures as $key => $value) {
                $listeCandidatures[$key]['ent_nom'] = $this->getNomEntreprise($listeCandidatures[$key]['off_entreprise']);
                $listeCandidatures[$key]['vil_nom'] = $this->getNomVille($listeCandidatures[$key]['off_ville']);
            }

        }

        return $listeCandidatures;

    }

    public function getEntretiensChercheur($che_id)
    {
        $sql = "SELECT * FROM T_Offre INNER JOIN T_Entretien ON off_id = ent_offre WHERE ent_chercheur = ? AND ent_statut = 1 OR ent_statut = 3";

        $resultat = $this->executeRequete($sql, array(
            $che_id
        )
        );

        $listeEntretiens = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if ($listeEntretiens) {
            foreach ($listeEntretiens as $key => $value) {
                $listeEntretiens[$key]['ent_nom'] = $this->getNomEntreprise($listeEntretiens[$key]['off_entreprise']);
                $listeEntretiens[$key]['vil_nom'] = $this->getNomVille($listeEntretiens[$key]['off_ville']);
            }

        }

        return $listeEntretiens;
    }

    public function getResultatsEntretien($che_id)
    {
        $sql = "SELECT * FROM T_Offre INNER JOIN T_Entretien ON off_id = ent_offre WHERE ent_chercheur = ? AND ent_statut = 0 OR ent_statut = 2";

        $resultat = $this->executeRequete($sql, array(
            $che_id
        )
        );

        $listeResultats = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if ($listeResultats) {
            foreach ($listeResultats as $key => $value) {
                $listeResultats[$key]['ent_nom'] = $this->getNomEntreprise($listeResultats[$key]['off_entreprise']);
                $listeResultats[$key]['vil_nom'] = $this->getNomVille($listeResultats[$key]['off_ville']);
            }

        }

        return $listeResultats;
    }

    public function getNomEntreprise($ent_id)
    {

        $sql = "SELECT ent_nom FROM T_Entreprise WHERE ent_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $ent_id
        )
        );

        return $resultat->fetch(PDO::FETCH_ASSOC)['ent_nom'];

    }

    public function getNomVille($vil_id)
    {

        $sql = "SELECT vil_nom FROM T_Ville WHERE vil_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $vil_id
        )
        );

        return $resultat->fetch(PDO::FETCH_ASSOC)['vil_nom'];

    }

    public function getSalaire($sal_id)
    {

        $sql = "SELECT sal_libelle FROM T_Salaire WHERE sal_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $sal_id
        )
        );

        return $resultat->fetch(PDO::FETCH_ASSOC)['sal_libelle'];

    }

    public function getContrat($tco_id)
    {

        $sql = "SELECT tco_libelle FROM T_Type_Contrat WHERE tco_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $tco_id
        )
        );

        return $resultat->fetch(PDO::FETCH_ASSOC)['tco_libelle'];

    }

    public function getSecteurActivite($sea_id)
    {

        $sql = "SELECT sea_libelle FROM T_Secteur_Activite WHERE sea_id = ?";

        $resultat = $this->executeRequete($sql, array(
            $sea_id
        )
        );

        return $resultat->fetch(PDO::FETCH_ASSOC)['sea_libelle'];

    }

    public function getEntrepriseId($login)
    {
        $sql = "SELECT ent_id from t_entreprise join t_user on t_entreprise.ent_user=t_user.usr_id where usr_email=?";

        $resultat = $this->executeRequete($sql, array($login));

        return $resultat->fetch(PDO::FETCH_ASSOC)["ent_id"];
    }


}