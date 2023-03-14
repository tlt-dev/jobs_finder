<?php
session_start();

require_once('include/configuration.php');

Autoloader::inscrire();

if(!isset($_SESSION['token']))
{
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}

if(!isset($_REQUEST['gestion']))
{
    $_REQUEST['gestion'] = 'visiteur';
}

$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();


