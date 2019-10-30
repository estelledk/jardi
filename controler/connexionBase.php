<?php
function connexionJardi()  //connexionJardi() envoie l'identifiant de connexion à la base personnelle
{
    $host = 'localhost';    //adresse du host (serveur) où se trouve la bdd
    $base = 'jardi';        //bdd
    $login= 'root';         //loggin d'accès au serveur de BDD
    $password= '';          //password pour s'identifier auprès du serveur

    try  //on tente(try) une connection à bdd
    {
        $db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base, $login, $password);  //charset=utf8 : type de caractères utilisés
        return $db;  //return() renvoie à la page qui a demandé la connexion
    } 
    catch (Exception $e)  //sinon on retourne(catch) une erreur
    {
        echo 'Erreur : '.$e->getMessage().'<br>';  //$e->getMessage() permet de récupérer le message d'erreur
        echo 'N° : '.$e->getCode().'<br>';   //$e->getCode() permet de récupérer le code d'erreur
        
        die('Connexion au serveur impossible');
    }
}

$db = connexionJardi();  //appel de la fonction
?>
