<?php

class VisiteurControleur
{

    private $parametres = array();
    private $visiteurModele;
    private $visiteurVue;

    public function __construct($parametres)
    {

        $this->parametres = $parametres;
        $this->visiteurModele = new VisiteurModele($this->parametres);
        $this->visiteurVue = new VisiteurVue($this->parametres);
    }

    public function genererAccueil()
    {
        $listeOffre = $this->visiteurModele->getAllOffre();
        $listePoste = $this->visiteurModele->getAllPoste();

        $this->visiteurVue->afficherAccueil($listeOffre, $listePoste);
    }

    public function rechercheOffre()
    {

        $listeOffre = $this->visiteurModele->rechercheOffre($this->parametres["off_poste"]);

        $data = array();
        foreach ($listeOffre as $offre){
            $data[] = array(
                "off_intitule" => $offre["off_intitule"],
                "off_id" => $offre["off_id"],
                "vil_nom" => $offre["vil_nom"],
                "off_descriptif" => $offre["off_descriptif"]
            );
        }
        echo (json_encode($data));
    }

    public function getOffreById()
    {
        $offre = $this->visiteurModele->getOffreById($this->parametres['off_id']);

        echo (json_encode(array(
            "off_intitule" => $offre["off_intitule"],
            "off_secteur" => $offre["sea_libelle"],
            "off_ville" => $offre["vil_nom"],
            "off_date_prise_poste" => $offre["off_date_prise_poste"],
            "off_salaire" => $offre["sal_libelle"],
            "off_type_contrat" => $offre["tco_libelle"],
            "off_duree_contrat" => $offre["off_duree"],
            "off_description" => $offre["off_descriptif"]
        )));
    }
}
