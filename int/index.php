<?php
session_start();

require_once('include/configuration.php');

Autoloader::inscrire();

$_SESSION['login'] = 'login_temp'; //Login temporaire pour éviter l'authentification

if(!isset($_REQUEST['gestion']))
{
    $_REQUEST['gestion'] = 'visiteur';
}

$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();


