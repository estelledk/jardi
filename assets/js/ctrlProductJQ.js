//définition des variables
var pro_couleur = $('#pro_couleur');
var pro_ref = $('#pro_ref');
var pro_libelle = $('#pro_libelle');
var pro_prix = $('#pro_prix');
var pro_stock = $('#pro_stock');
var pro_description = $('#pro_description');

//définition des variables pour affichage des erreurs
var errorPro_couleur = $('#errorPro_couleur');
var errorPro_ref = $('#errorPro_ref');
var errorPro_libelle = $('#errorPro_libelle');
var errorPro_prix = $('#errorPro_prix');
var errorPro_stock = $('#errorPro_stock');
var errorPro_description = $('#errorPro_description');

//définition des Regex (respect du format)
var regexPro_couleur = /^[A-Za-z\s\-àèùéâêîôûäëïöüç]+$/; 	 //lettres, blancs(\s), tiret(\-), accents ; au moins 1 fois(+)
var regexPro_ref = /^[0-9A-Za-z]+$/;
var regexPro_libelle = /^[A-Za-z\s\'\-àèùéâêîôûäëïöüç]+$/;
var regexPro_prix = /^[0-9\.]+$/;
var regexPro_stock = /^[0-9]+$/;
var regexPro_description = /^[A-Za-z\s\'\-\,\.\;\:\!\?\(\)\&\°\%\+\=àâéèêîïôöùç]+$/; 	 //lettres, blancs(\s), ponctuation, accents


$(document).ready(function()   //dès que le document est chargé :
{
	function verifier(champ, erreur, regex)  //fonction générique
	{
		if (champ.val() == '') {  //si le champ est vide
			erreur.text('Saisie manquante');
			erreur.css( {   
				color : 'red'
			});
	    } else if (regex.test(champ.val()) == false) {  //si regex ne passe pas
			erreur.text('Saisie erronée'); 
			erreur.css( {  
				color : 'orange'
			});
		} else {  //si regex passe
			erreur.html('&#10003');  //on affiche le check(&#10003) de validation
			erreur.css( {   
				color : 'green'
			});
		}
	}
   
    //application de la fonction
    pro_couleur.blur(function() {
        verifier(pro_couleur, errorPro_couleur, regexPro_couleur); 
    });

    pro_ref.blur(function() {
        verifier(pro_ref, errorPro_ref, regexPro_ref); 
    });

    pro_libelle.blur(function() {
        verifier(pro_libelle, errorPro_libelle, regexPro_libelle); 
    });

    pro_prix.blur(function() {
        verifier(pro_prix, errorPro_prix, regexPro_prix); 
    });

    pro_stock.blur(function() {
        verifier(pro_stock, errorPro_stock, regexPro_stock); 
    });

    pro_description.blur(function() {
        verifier(pro_description, errorPro_description, regexPro_description); 
    });

});