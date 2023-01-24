<?php


class Autoloader
{
    public static function inscrire(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    public static function autoload($maClasse){
        $maClasse = lcfirst($maClasse);

        $repertoires = array(
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_lieu/',
            'mod_lieu/controleur/',
            'mod_lieu/modele/',
            'mod_lieu/vue/',
            'mod_accompagnateur/',
            'mod_accompagnateur/controleur/',
            'mod_accompagnateur/modele/',
            'mod_accompagnateur/vue/',
            'mod_authentification/',
            'mod_authentification/controleur/',
            'mod_authentification/modele/',
            'mod_authentification/vue/',
            'mod_reunion/',
            'mod_reunion/controleur/',
            'mod_reunion/modele/',
            'mod_reunion/vue/',
            'mod_activite/',
            'mod_activite/controleur/',
            'mod_activite/modele/',
            'mod_activite/vue/',
            'mod_type/',
            'mod_type/controleur/',
            'mod_type/modele/',
            'mod_type/vue/',
            'mod_statut/',
            'mod_statut/controleur/',
            'mod_statut/modele/',
            'mod_statut/vue/',
            'mod_porteur/',
            'mod_porteur/controleur/',
            'mod_porteur/modele/',
            'mod_porteur/vue/'
        );

        foreach($repertoires as $repertoire){
            if(file_exists($repertoire.$maClasse.'.php')){
                require_once($repertoire.$maClasse.'.php');
            }
        }
    }


}