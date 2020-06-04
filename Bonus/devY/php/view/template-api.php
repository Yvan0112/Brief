<?php


$tabAssoJson = [];
$tabAssoJson["request"] = $_REQUEST;


// ON DONNE LA POSSIBILITE DE CHOISIR LA CLASSE Api ET LA METHODE A ACTIVER
$classeApi  = $_REQUEST["classeApi"] ?? "User";
$methodeApi = $_REQUEST["methodeApi"] ?? "";

// ON VA VERIFIER SI CETTE METHODE EXISTE DANS MON ApiUser

$codeApi = "Api$classeApi::$methodeApi";
if (is_callable($codeApi))
{
    // SI PHP A TROUVE LA METHODE
    // ALORS, ON PEUT L'ACTIVER...
    $codeApi();
}

// ON VA RECUPERER LA REPONSE DANS LA PROPRIETE
$tabAssoJson["confirmation"] = ApiUser::$confirmation;
$tabAssoJson["cleApi"]       = ApiUser::$cleApi;

// CONVERTIR LE TABLEAU ASSOCIATIF EN TEXTE FORMATTE EN JSON

$texteJSON = json_encode($tabAssoJson, JSON_PRETTY_PRINT);

echo $texteJSON;