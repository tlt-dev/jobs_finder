<?php

    include("include/modele.php");
    include("include/parametres.php");

    $request_method = $_SERVER['REQUEST_METHOD'];

    switch($request_method)
    {

        case "GET":
            if(isset($_GET['id']))
            {

                $id = intval($_GET['id']);
                getUtilisateur($id);

            }
            else
            {

                getUtilisateurs();

            }
            break;

        case "POST":

            break;

        case "PUT":

            break;

        case "DELETE":

            break;

        default:
            header("HTTP/1.0 405 Méthode non autorisée");
            break;

    }

    function getUtilisateurs()
    {

        $modele = new Modele();

        $sql = "SELECT * FROM T_User";
        $resultat = $modele->executeRequete($sql);
        $reponse = $resultat->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($reponse, JSON_PRETTY_PRINT);

    }

    function getUtilisateur($id=0)
    {

        $modele = new Modele();

        $sql = "SELECT * FROM T_User";
        if($id != 0){
            $sql .= " WHERE usr_id = " .$id;
        }

        $resultat = $modele->executeRequete($sql);
        $reponse = $resultat->fetch(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($reponse, JSON_PRETTY_PRINT);

    }
