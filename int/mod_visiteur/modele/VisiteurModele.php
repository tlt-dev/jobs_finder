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

    public function getAllPoste(){

        $sql = "SELECT * FROM t_poste";

        return $this->executeRequete($sql)->fetchAll();
    }

    public function rechercheOffre($off_poste){
        
        $sql = "SELECT * from t_offre toff
        JOIN t_poste tp ON toff.off_poste=tp.pos_id
        JOIN t_ville tv ON toff.off_ville=tv.vil_id";

        if (!empty($off_poste)){
            if (is_array($off_poste)){
                $sql .= " WHERE ";
                foreach($off_poste as $offre){
                    $sql .= " off_poste=$offre AND";
                }
                $sql = substr($sql, 0, -3);
            }else{
                $sql .= " WHERE off_poste=$off_poste";
            }
        }

        return $this->executeRequete($sql)->fetchAll();
    }

}