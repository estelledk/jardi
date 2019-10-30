//définition des variables
var nom = $('#nom');
var prenom = $('#prenom');
var naissance = $('#naissance');
var adresse = $('#adresse');
var ville = $('#ville');
var postal = $('#postal');
var email = $('#email');
// var jardin = $('#jardin');
// var frequence = $('#frequence');
// var autre = $('#autre');
// var commentaire = $('#commentaire');
// var jour = $('#jour');
// var envoi = $('#envoyer');
// var effacer = $('#effacer');


//définition des variables pour affichage des erreurs
var erreurNom = $('#nomBis');
var erreurPrenom = $('#prenomBis');
var erreurNaissance = $('#naissanceBis');
var erreurAdresse = $('#adresseBis');
var erreurVille = $('#villeBis');
var erreurPostal = $('#postalBis');
var erreurEmail = $('#emailBis');
// var erreurFrequence = $('#frequenceBis');
// var erreurAutre = $('#autreBis');
// var erreurCommentaire = $('#commentaireBis');
// var erreurJour = $('#jourBis');


//définition des Regex (respect du format)
var regexNom = /^[A-Za-z\s\-àâéèêîïôöùç]+$/; 	 //lettres + blancs(\s) + tiret(\-) + accents
//var regexPrenom inutile, on applique regexNom
var regexNaissance = /^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{4,4}$/;
var regexAdresse = /^[0-9A-Za-z\s\-\/àâéèêîïôöùç]+$/; //chiffres + \/ + regexNom
var regexVille = /^[A-Za-z\s\-\/àâéèêîïôöùç]+$/;  //\/ + regexNom
var regexPostal = /^[0-9]{5}$/;	//chiffres, au nombre de 5
var regexEmail = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/; 	//[nom]@[domaine au moins 2 caractères].[extension entre 2 et 6 caractères]


//fonction générique
$(document).ready(function()   //dès que le document est chargé :
{
	function verifier(champ, erreur, regex)  //ordre paramètres n'importe pas
	{
		if (champ.val() == "")   //si le champ est vide
		{
			erreur.text("Saisie manquante"); //on affiche le message d'erreur
			erreur.css(
			{   
				color : "red" 
			});
		} 
		else if (regex.test(champ.val()) == false)  //si regex n'est pas passée
		{
			erreur.text("Saisie erronée");  //on affiche le message d'erreur
			erreur.css(
			{  
				color : "orange"
			});
		} 
		else //si regex est passée
		{
			erreur.html("&#10003");  //on affiche le check(&#10003) de validation
			erreur.css(
			{   
				color : "green"
			});
		}
	}

//application de la fonction générique
//nom
	nom.blur(function()   //blur : à la perte de focus ça lance la fonction (click : risque que ce soit PHP avant JS)
	{
		verifier(nom, erreurNom, regexNom);   //vérifie $nom et affichera message d'erreur dans $erreurNom
	});
	
//prenom
	prenom.blur(function()
	{   
		verifier(prenom, erreurPrenom, regexNom);  //regex prénom identique à celle du nom
	});

//naissance
	naissance.blur(function()
	{
		verifier(naissance, erreurNaissance, regexNaissance);  
	});

//adresse
	adresse.blur(function()
	{
		verifier(adresse, erreurAdresse, regexAdresse);  
	});

//ville
	ville.blur(function()
	{
		verifier(ville, erreurVille, regexVille);  
	});

//postal
	postal.blur(function()
	{
		verifier(postal, erreurPostal, regexPostal);  
	});

//email
	email.blur(function()
	{
		verifier(email, erreurEmail, regexEmail);  
	});

/*
//jour
	jour.blur(function() 
	{
		verifier(jour, erreurJour, regexJour);  
	});
	*/
});