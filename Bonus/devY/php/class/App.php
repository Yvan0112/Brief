<?php

class App 
{
    // METHODES STATIC (COLLECTIF)
    // ON CREE UNE PREMIERE METHODE DANS NOTRE CLASSE
    static function start ()
    {
        
        spl_autoload_register("App::chargerCodeClass");

        App::afficherPage();
    }

    static function afficherPage ()
    {

        

        // PAR DEFAUT, ON UTILISE LE TEMPLATE defaut
        $templateActif = "defaut";
        
        

        

       

        
        require_once "php/view/template-$templateActif.php";

    }

    
    static function chargerCodeClass ($className)
    {
      
        require_once "php/class/$className.php";
    }

}