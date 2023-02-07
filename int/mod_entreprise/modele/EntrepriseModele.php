<?php

class EntrepriseModele extends Modele
{

    private $parametres = array();

    public function __construct($parametres)
    {

        $this->parametres = $parametres;

    }

    

    public function getListeEntreprises()
    {
        $arrayEntreprise = array();
        $sql = "SELECT * FROM t_entreprise";

        $resultat = $this->executeRequete($sql);

        $listeEntreprises = $resultat->fetchAll(PDO::FETCH_ASSOC);


        foreach($listeEntreprises as $entreprise) 
        {
            
            $arrayEntreprise[] = new EntrepriseObjet($entreprise);
               
        }

        var_dump($arrayEntreprise);

        return $arrayEntreprise;

    }

    public function getEntreprise()
    {

        $sql = 'SELECT * FROM t_entreprise WHERE ent_id = ?';

        $resultat = $this->executeRequete($sql, array(
            $this->parametres['ent_id']
        ));

        return new EntrepriseObjet($resultat->fetch(PDO::FETCH_ASSOC));


    }

    public function editEntreprise($entreprise)
    {

        $sql = 'UPDATE t_entreprise SET ent_nom = ? WHERE ent_id = ?';
        $this->executeRequete($sql, array(
            $entreprise->getEnt_nom(),
            $entreprise->getEnt_id()
        ));

    }

    public function deleteEntreprise($entreprise)
    {

        $sql = "DELETE FROM t_entreprise WHERE ent_id = ?";

        $this->executeRequete($sql, array(
            $entreprise->getEnt_id()
        ));

    }
}