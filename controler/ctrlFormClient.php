<?php
include ('connexionBase.php'); //connexion à la BDD

//DECLARATIONS
//déclaration du tableau d'erreurs
$formError = array();

//déclaration des regex (les var sont remplacées par $, et les valeurs des regex sont encadrées par des " ")
$regexNom = "/^[A-Za-z\s\-àâéèêîïôöùç]+$/";   //lettres + blancs(\s) + accents
$regexPrenom = "/^[A-Za-z\s\-àâéèêîïôöùç]+$/";      //lettres + blancs(\s) + tiret(\-) + accents
$regexNaissance = "/^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{4,4}$/";
$regexAdresse = "/^[0-9A-Za-z\s\-\/àâéèêîïôöùç]+$/"; //chiffres + lettres + blancs + accents
$regexVille = "/^[A-Za-z\s\-\/àâéèêîïôöùç]+$/"; //lettres + /(\/)  + tiret(\-) + blancs(\s)
$regexPostal = "/^[0-9]{5}$/";        //chiffres, au nombre de 5
$regexMail = "/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/";     //[nom]@[domaine au moins 2 caractères].[extension entre 2 et 6 caractères]


//VERIFICATION DES SAISIES
//nom           
if (isset($_POST['submit']))  //si la valeur du bouton envoyer est présente          ($_POST['afficherValeurDeNAME='])
{
    if (!empty($_POST['nom']))    //si la valeur de nom n'est pas vide (!empty)
    {
        if (preg_match($regexNom, $_POST['nom']))   //si la donnée saisie passe la regex
        {
            $nom = $_POST['nom'];
        } else   //si la valeur ne passe pas la regex
        {
            $formError['nom'] = 'saisie du nom incorrecte';   //on rempli le tableau d'erreur
        }
    } else  //si le champs est vide 
    {
        $formError['nom'] = 'veuillez renseigner le champs "nom"';  //on rempli le tableau d'erreur
    }
}

//prenom
if (isset($_POST['submit'])) 
{  
    if (!empty($_POST['prenom'])) 
    {   
        if (preg_match($regexPrenom, $_POST['prenom'])) 
        {  
            $prenom = $_POST['prenom'];
        } else 
        {
            $formError['prenom'] = 'saisie du prénom incorrecte';   
        }
    } else 
    {  
        $formError['prenom'] = 'veuillez renseigner le champs "prénom"';
    }
}

//naissance
if (isset($_POST['submit'])) 
{   
    if (!empty($_POST['naissance'])) 
    {  
        if (preg_match($regexNaissance, $_POST['naissance'])) 
        {  
            $naissance = $_POST['naissance'];
        } else 
        {
            $formError['naissance'] = 'saisie de la date incorrecte';   
        }
    } else 
    { 
        $formError['naissance'] = 'veuillez renseigner le champs "date de naissance"';
    }
}

//adresse
if (isset($_POST['submit'])) 
{
    if (!empty($_POST['adresse'])) 
    { 
        if (preg_match($regexAdresse, $_POST['adresse'])) 
        {  
            $adresse = $_POST['adresse'];
        } else 
        {
            $formError['adresse'] = 'saisie de l\'adresse incorrecte';
        }
    } else 
    {
        $formError['adresse'] = 'veuillez renseigner le champs "adresse"';
    }
}

//ville
if (isset($_POST['submit'])) 
{ 
    if (!empty($_POST['ville'])) 
    {  
        if (preg_match($regexVille, $_POST['ville'])) 
        {  
            $ville = $_POST['ville'];
        } else 
        {
            $formError['ville'] = 'saisie de la ville incorrecte'; 
        }
    } else 
    {  
        $formError['ville'] = 'veuillez renseigner le champs "ville"';
    }
}

//postal
if (isset($_POST['submit'])) 
{ 
    if (!empty($_POST['postal'])) 
    {
        if (preg_match($regexPostal, $_POST['postal'])) 
        { 
            $postal = $_POST['postal'];
        } else 
        {
            $formError['postal'] = 'saisie du code postal incorrecte'; 
        }
    } else 
    { 
        $formError['postal'] = 'veuillez renseigner le champs "code postal"';
    }
}

//email
if (isset($_POST['submit'])) 
{ 
    if (!empty($_POST['email'])) 
    { 
        if (preg_match($regexMail, $_POST['email'])) 
        {
            $email = $_POST['email'];
        } else 
        {
            $formError['email'] = 'saisie de l\'e-mal incorrecte'; 
        }
    } else 
    { 
        $formError['email'] = 'veuillez renseigner le champs "email"';
    }
}


//INSERTION DANS LA BDD
if (isset($_POST['submit']) && count($formError) === 0)  //si présence du POST submit et pas d'erreurs
{
    $requete = $db->prepare('INSERT INTO formulaireclient(nom,prenom,dateNaissance,adresse,ville,codePostal,email,jardinage,frequence,autre,commentaire) 
    VALUES (:nom,:prenom,:dateNaissance, :adresse, :ville, :codePostal, :email, :jardinage, :frequence, :autre, :commentaire)');
    $requete->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR); //liaison des valeurs entre le POST et la valeur à insérer dans la bdd
    $requete->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $requete->bindValue(':dateNaissance', $_POST['naissance'], PDO::PARAM_STR);
    $requete->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $requete->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
    $requete->bindValue(':codePostal', $_POST['postal'], PDO::PARAM_INT);
    $requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $requete->bindValue(':jardinage', $_POST['jardinage'], PDO::PARAM_STR);
    $requete->bindValue(':frequence', $_POST['frequence'], PDO::PARAM_STR);
    $requete->bindValue(':autre', $_POST['autre'], PDO::PARAM_STR);
    $requete->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);

    $requete->execute();
    //var_dump($_POST);
    
    }
?>