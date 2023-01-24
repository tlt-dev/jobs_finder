<?php
//On vérifie que la méthode utilisée est correcte (GET)
if($_SERVER['REQUEST_METHOD'] == 'GET') {

    require_once 'include/modele.php';
    require_once 'include/parametres.php';

    $oModele = new Modele();

    $sql = "SELECT reu_ide, reu_dat, reu_heu, reu_dur, reu_pre, reu_cap, lie_nom, lie_cpo, lie_vil"
        . " FROM " . P . "reunion AS r," . P . "lieu AS l "
        . " WHERE r.reu_lie = l.lie_ide"
        . " AND reu_dat >= CURDATE() AND reu_pub = 1"
        . " ORDER BY reu_dat DESC";

    $idRequete = $oModele->executeRequete($sql);

    //On vérifie l'existence d'au moins une réunion
    if ($idRequete->rowCount() > 0) {

        $listeReunions = $idRequete->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($listeReunions);

    }else{

        echo json_encode(["message" => "Aucune réunion planifiée actuellement."]);

    }

}else{

    //Gestion de l'erreur
    echo json_encode(["message" => "La méthode n'est pas autorisée"])
    ;

}