<?php
ini_set("display_errors", 1);
//Pour connexion à la base de donnée
define('NOM', 'root');
define('PASSE', 'root');
define('SERVEUR', 'localhost');
define('BASE', 'jobs_finder');
define('P', 'x19v_');

//$typeUser = GLOBALS['type'];
//$idUser = GLOBALS['idUser'];

setLocale(LC_CTYPE, 'FR_fr.UTF-8');
//header( 'content-type: text/html; charset=utf-8' );

//Heure de début des réunions
define('HD', '08:00');

//info langue
//setlocale(LC_TIME, 'fr-FR.utf8', 'fra');
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

//echo phpinfo();