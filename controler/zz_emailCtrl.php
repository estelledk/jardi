<?php 
//source : https://m-gut.developpez.com/tutoriels/php/mail-confirmation/

//connexion à la bdd
include("connexionBase.php");

//récupération des variables nécessaires à l'activation
$login = $_GET['log'];
$cle = $_GET['cle'];

//récupération de la clé correspondant au $login dans la bdd
$stmt = $dbh->prepare("SELECT cle, actif FROM user 
                       WHERE login like :login ");

if ($stmt->execute(array(':login' => $login)) && $row = $stmt->fetch()) 
{
    $clebdd = $row['cle'];	//récupération de la clé
    $actif = $row['actif']; //$actif contiendra alors 0 (par défaut) ou 1
}


//si compte déjà actif
if ($actif == '1') { // Si le compte est déjà actif on prévient
    echo "Votre compte est déjà actif";

//si compte pas encore actif
} else 
{ 

    //si les 2 clés correspondent, activation du compte
    if ($cle == $clebdd) { 
        echo "Votre compte a bien été activé";
        
        //requête pour passer champ actif de 0 à 1
        $stmt = $dbh->prepare("UPDATE user SET actif = 1 
                              WHERE login like :login ");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
    
        
    //si les 2 clés ne correspondent pas
    } else { 
        echo "Erreur ! Votre compte ne peut être activé";
    }
}


?>