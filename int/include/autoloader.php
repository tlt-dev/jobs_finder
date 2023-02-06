<?php


class Autoloader
{
    public static function inscrire(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    public static function autoload($maClasse){
        $maClasse = lcfirst($maClasse);

        $repertoires = array(
            'mod_visiteur/',
            'mod_visiteur/vue/',
            'mod_visiteur/controleur/',
            'mod_visiteur/modele/',
            'mod_utilisateur/',
            'mod_utilisateur/vue/',
            'mod_utilisateur/controleur/',
            'mod_utilisateur/modele/',
            'mod_entreprise/',
            'mod_entreprise/vue/',
            'mod_entreprise/controleur/',
            'mod_entreprise/modele/',
            'mod_authentification/',
            'mod_authentification/vue/',
            'mod_authentification/controleur/',
            'mod_authentification/modele/',
            'mod_offre/',
            'mod_offre/vue/',
            'mod_offre/controleur/',
            'mod_offre/modele/'
        );

        foreach($repertoires as $repertoire){
            if(file_exists($repertoire.$maClasse.'.php')){
                require_once($repertoire.$maClasse.'.php');
            }
        }
    }


}