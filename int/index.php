<?php
session_start();

require_once('include/configuration.php');

Autoloader::inscrire();

if(!isset($_REQUEST['gestion']))
{
    $_REQUEST['gestion'] = 'invite';
}

$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();


