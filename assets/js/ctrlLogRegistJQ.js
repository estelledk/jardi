//définition des variables
var login = $('#login');
var pwd = $('#pwd');

//définition des variables pour affichage des erreurs
var erreurLogin = $('#loginBis');
var erreurPwd = $('#pwdBis');


//définition des Regex (respect du format)
var regexLogin = /^[0-9A-Za-zàâéèêîïôöùç]+$/;  //chiffres + lettres + accents
var regexPwd = /^[0-9A-Za-z\-_!*àâéèêîïôöùç]+$/;  //regexLogin+ -  _  !  * 


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
				color : "red"  //on rend le champ rouge
			});
	    } else if (regex.test(champ.val()) == false)  //valid est relatif à la regex
		{
			erreur.text("Saisie erronée");  //on affiche le message d'erreur
			erreur.css(
			{  
				color : "orange"  //on rend le champ rouge
			});
		} else 
		{
			erreur.html("&#10003");  //on affiche le check(&#10003) de validation
			erreur.css(
			{   
				color : "green"  //on rend le champ vert
			});
		}
	}

//application de la fonction générique
//login
	login.blur(function()   //blur : à la perte de focus ça lance la fonction (click : risque que ce soit PHP avant JS)
	{
		verifier(login, erreurLogin, regexLogin);   //vérifie $login et affichera message d'erreur dans $erreurlogin
	});
	
//pwd
	pwd.blur(function()
	{   
		verifier(pwd, erreurPwd, regexPwd);  
	});

});