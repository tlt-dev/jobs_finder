<?php


class Autoloader
{
    public static function inscrire(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    public static function autoload($maClasse){
        $maClasse = lcfirst($maClasse);

        $repertoires = array(
            'mod_invite/',
            'mod_invite/controleur/',
            'mod_invite/modele/',
            'mod_invite/vue/'
        );

        foreach($repertoires as $repertoire){
            if(file_exists($repertoire.$maClasse.'.php')){
                require_once($repertoire.$maClasse.'.php');
            }
        }
    }


}