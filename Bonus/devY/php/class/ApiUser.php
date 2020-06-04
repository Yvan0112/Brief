<?php



class ApiUser
{
    // PROPRIETE COLLECTIVE
    static $confirmation    = "";
    static $cleApi          = "";

    
    // METHODES
    static function create ()
    {
        
        // RECUPERER LES INFOS DU FORMULAIRE
       
        // ET ON VA LES INSERER DANS LA TABLE utilisateur

        $tabAssoColonneValeur = [
            "email"         => $_REQUEST["email"] ?? "",
            "password"      => $_REQUEST["password"] ?? "",
            
        ];

        // ETAPE SUPPLEMENTAIRE
        // HASHER LE MOT DE PASSE
        $tabAssoColonneValeur["password"] = password_hash($tabAssoColonneValeur["password"], PASSWORD_DEFAULT);

        // ON VA INSERER DANS LA TABLE SQL utilisateur
        $requetePrepareeSQL = 
<<<CODESQL
INSERT INTO utilisateur
( email,password)
VALUES
( :email,:password)
CODESQL;

        Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

    }

    static function login ()
    {
        // LES INFOS DE FORMULAIRES SONT RECUPEREES DANS $_REQUEST
        $emailForm      = $_REQUEST["email"] ?? "";
        $passwordForm   = $_REQUEST["password"] ?? "";

        $tabResult = Model::read("utilisateur", "email", $emailForm);

        // DEV
        // NORMALEMENT DANS LE CREATE (INSCRIPTION D'UN NOUVEL UTILISATEUR...)
        $passwordHash = password_hash($passwordForm, PASSWORD_DEFAULT);

        foreach($tabResult as $tabLigne)
        {
            extract($tabLigne);
            // => CREE LES VARIABLES A PARTIR DES COLONNES
            // $id,$email, $password
            
        }
        
