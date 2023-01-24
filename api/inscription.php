<?php
//On vérifie que la méthode est correcte (POST)
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'include/modele.php';
    require_once 'include/parametres.php';

    $oModele = new Modele();

    //On récupère les informations envoyées
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->pdp_nom) && !empty($data->pdp_pre) && !empty($data->pdp_cpo)
        && !empty($data->pdp_vil) &&  !empty($data->pdp_log) && (!empty($data->pdp_tel) || !empty($data->pdp_por) || !empty($data->pdp_mai))
        && !empty($data->pdp_ric)){

        //conversion pdp_ric de chaine vers entier
        $ric = intval($data->pdp_ric);
        //Date du jour
        $dateInscription = date("Y-m-d");
        //type = candidat inscrit
        $typ = 2;
        //Génération du mot de passe
        $pw = 'Pdp_coopEmploi';
        //Salage
        $gauche="ar30&";
        $droite="tk!@";
        $mdp = hash('ripemd128', "$gauche$pw$droite");;

        //Requête DML
        $sql = "INSERT INTO ". P . "porteur_de_projet "
            ." (pdp_nom, pdp_pre, pdp_cpo, pdp_vil, pdp_tel, pdp_por, pdp_mai, pdp_typ, pdp_din, pdp_ric, pdp_log, pdp_mdp)"
            ." VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

        $idRequete = $oModele->executeRequete($sql, array(
            $data->pdp_nom,
            $data->pdp_pre,
            $data->pdp_cpo,
            $data->pdp_vil,
            $data->pdp_tel,
            $data->pdp_por,
            $data->pdp_mai,
            $typ,
            $dateInscription,
            $ric,
            $data->pdp_log,
            $mdp
        ));

        if($idRequete){
            //201 = bien écrit en base de donnée
            http_response_code(201);
            echo json_encode(["message" => "Votre inscription a bien été prise en compte. Nous vous remercions."]);
            /*$message = "Bonjour ".$data->pdp_pre.",\n Vous venez de vous inscrire à une réunion d'information collective
            de la coopérative d'activité et d'emploi Coop'Emploi.\nUn espace personnel vient de vous être attribué. Vous
            pourrez y ajouter différentes informations sur vous et votre projet.\n Voici vos identifiants de connexion :
            \nLogin : ".$data->pdp_log."\nMot de passe : Pdp_coopEmploi";

            $message = wordwrap($message, 70, "\n");

            mail($_POST['pdp_mai'],"Bienvenue chez Coop'Emploi",$message);*/
        }else{
            //503 = problèmes d'ajout dans la base de donnée
            http_response_code(503);
            echo json_encode(["message" => "Un problème est survenu lors de votre inscription. Veuillez contacter Coop Emploi"]);
        }

    }else{
        //405 = problème avec le serveur
        http_response_code(405);
        echo json_encode(["message" => "Certaines données de votre formulaire sont absentes"]);
    }

}else{

    //Gestion de l'erreur
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);

}