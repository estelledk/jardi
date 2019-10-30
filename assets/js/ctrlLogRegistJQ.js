//définition des variables
var log = $('#log');
var pwd = $('#pwd');

//définition des variables pour affichage des erreurs
var errorLog = $('#errorLog');
var errorPwd = $('#errorPwd');


//définition des Regex (respect du format)
var regexLog = /^[0-9A-Za-zéàùâêîôûäëïöüç]+$/;  //chiffres + lettres + accents
var regexPwd = /^[0-9A-Za-z\-\_\!\*éàùâêîôûäëïöüç]+$/;  //regexLogin+ -  _  !  * 


//fonction générique
$(document).ready(function() {  //dès que le document est chargé :
	function verifier(champ, erreur, regex) { 	//ordre paramètres n'importe pas
		if (champ.val() == "") {  //si le champ est vide
			erreur.text("Saisie manquante");
			erreur.css( {   
				color : "red"
			});

	    } else if (regex.test(champ.val()) == false) {  //si regex est passée
			erreur.text("Saisie erronée"); 
			erreur.css( {
				color : "orange"
			});
		} else {  //si pas d'erreur
			erreur.html("&#10003");  //on affiche le check(&#10003) de validation
			erreur.css( {
				color : "green"
			});
		}
	}

	//application de la fonction générique
	//login
	log.blur(function() {  //blur : à la perte de focus ça lance la fonction (click : risque que ce soit PHP avant JS)
		verifier(log, errorLog, regexLog);   //vérifie $login et affichera message d'erreur dans $errorLogin
	});
	
	//pwd
	pwd.blur(function() {
		verifier(pwd, errorPwd, regexPwd);  
	});

});