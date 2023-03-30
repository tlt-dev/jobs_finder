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
        JOIN t_ville tv ON toff.off_ville=tv.vil_id
        JOIN t_secteur_activite tsa ON toff.off_secteur_activite=tsa.sea_id
        JOIN t_type_contrat tco ON toff.off_type_contrat=tco.tco_id
        JOIN t_salaire tsal ON toff.off_salaire=tsal.sal_id";

        return $this->executeRequete($sql)->fetchAll();
    }

    public function getAllPoste(){

        $sql = "SELECT * FROM t_poste";

        return $this->executeRequete($sql)->fetchAll();
    }

    public function rechercheOffre($off_poste){
        
        $sql = "SELECT * from t_offre toff
        JOIN t_poste tp ON toff.off_poste=tp.pos_id
        JOIN t_ville tv ON toff.off_ville=tv.vil_id
        JOIN t_secteur_activite sa ON toff.off_secteur_activite=sa.sea_id
        JOIN t_type_contrat tc ON toff.off_type_contrat=tc.tco_id";

        if (!empty($off_poste)){
            if (is_array($off_poste)){
                $sql .= " WHERE ";
                foreach($off_poste as $offre){
                    $sql .= " off_poste=$offre OR";
                }
                $sql = substr($sql, 0, -3);
            }else{
                $sql .= " WHERE off_poste=$off_poste";
            }
        }

        return $this->executeRequete($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOffreById($off_id){

        $sql = "SELECT * from t_offre toff
        JOIN t_poste tp ON toff.off_poste=tp.pos_id
        JOIN t_ville tv ON toff.off_ville=tv.vil_id
        JOIN t_secteur_activite sa ON toff.off_secteur_activite=sa.sea_id
        JOIN t_type_contrat tc ON toff.off_type_contrat=tc.tco_id
        JOIN t_salaire ts ON ts.sal_id=toff.off_salaire
        WHERE toff.off_id=?";

        return $this->executeRequete($sql,array($off_id))->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function verifyOffreFavori($off_id)
    {

        $sql = "SELECT fce_id FROM T_Favori_Chercheur_Emploi WHERE fce_offre = ?";

        $resultat = $this->executeRequete($sql, array(
            $off_id
        ));

        if($resultat->fetch(PDO::FETCH_ASSOC)){
            return true;
        }

        return false;

    }

    public function addCandidature()
    {

        $sql = "INSERT INTO T_Candidature (can_offre, can_chercheur) VALUES (?,?)";

        $this->executeRequete($sql, array(
            $this->parametres['off_id'],
            $this->parametres['che_id']
        ));

    }

    public function removeCandidature()
    {

        $sql = "DELETE FROM T_Candidature WHERE can_offre = ? AND can_chercheur = ?";

        $this->executeRequete($sql, array(
            $this->parametres['off_id'],
            $this->parametres['che_id']
        ));

    }

}