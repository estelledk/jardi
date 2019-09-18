<?php

//connexionBase() envoie l'identifiant de connexion à la base personnelle
function connexionJardi() {

// paramètre de connexion serveur
    $host = 'localhost';  //adresse du host (serveur) où se trouve la bdd
    $base = 'jardi';    // bdd avec laquelle on travaille
    $login= 'root';     // loggin d'accès au serveur de BDD
    $password= '';    // password pour s'identifier auprès du serveur

//on tente(try) une connection à bdd
    try {
        $db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base, $login, $password);  //charset=utf8 : type de caractères utilisés
        return $db;  //return() renvoie à la page qui a demandé la connexion

//sinon on retourne(catch) une erreur
    } catch (Exception $e) {
        echo 'Erreur : '.$e->getMessage().'<br>';  //$e->getMessage() permet de récupérer le message d'erreur
        echo 'N° : '.$e->getCode().'<br>';   //$e->getCode() permet de récupérer le code d'erreur
        die('Connexion au serveur impossible');
    }
}

$db = connexionJardi();
?>
