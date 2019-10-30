<?php 
include('header1headSession.php');
include('header3Navbar.php');
?>
<!-- <link rel="stylesheet" href="../assets/css/msg.css"> -->
<title>inscription</title><?php
include('../controler/ctrlLogRegist.php');  //include le controler pour ne pas faire de redirection et laisser les champs affichés


if (isset($_POST['submit'])) { //si présence submit 	<!-- msg erreur (en bandeau) --> 
	if (isset($formError['same'])) { ?>     <!-- si erreur d'identification -->
		<div class="alert-danger" role="alert"><br>
			<h4><?= $formError['same'] ?></h4><br>
		</div> <?php
	} 
	else if (isset($formError['login'])) { ?>   <!-- si erreur d'identification -->
		<div class="alert-danger" role="alert"><br>
			<h4><?= $formError['login'] ?></h4><br>
		</div> <?php
	} 
	else if (isset($formError['pwd'])) { ?>     <!-- si erreur d'identification -->
		<div class="alert-danger" role="alert"><br>
			<h4><?= $formError['pwd'] ?></h4><br>
		</div> <?php
	} 
	else { ?>
		<h4 class="text-info">Vos identifiants ont été enregistrés</h4>
		<a href="products.php" class="btn-info" title="Retour">Liste de produits</a><br><br> <?php
	}			
} 
?>

<h2>Inscription</h2>

<form action="#" method="post">
    <label for="login">Votre login :</label> 
    <input id="login" name="login" type="text" value="<?php echo isset($_POST['login']) ? $_POST['login'] : '' ?>" required> <!-- récupération de la valeur postée --><br>
    <span id="errorLogin"><?php echo isset($formError['login']) ? $formError['login'] : '' ?></span><br>
    
    <label for="pwd">Votre mot de passe ( - _ ! * acceptés)</label> 				<!-- password -->
    <input id="pwd" name="pwd" type="password" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : '' ?>" required> <!-- récupération de la valeur postée --><br>
    <span id="errorPwd"><?php echo isset($formError['pwd']) ? $formError['pwd'] : '' ?></span><br>	
    <br>

    <!-- <div class="form-row">							 mail 
        <div class="col-lg-11"> -->
            <!-- Votre email : <input name="email" type="email"><br><br> -->
        <!-- </div>
        <div class="col-lg-1">
            <span id="pwdBis"></span><br>
            <p><= isset($formError['email']) ? $formError['email'] : '' ?></p>
        </div>
    </div> -->

    <input name="submit" type="submit" value="Création du compte" class="btn btn-info">

    <h4><a href="login.php">Déjà membre ?</a></h4>		<!-- lien login -->
</form>

<?php
include('footer.php'); ?>

<script src="../assets/js/ctrlLogRegistJQ.js"></script>  <!-- validation côté client -->

</body>
</html>		


<?php
// ------------------------------------------------------------------------------------------------------------------------------------------
// //CONTROLER
// //controler/ctrlLogRegist.php
// include('connexionBase.php');

// $formError = array(); // déclaration du tableau d'erreur

// //déclaration des regex pour validation côté serveur
// $loginRegex = '/^[0-9A-Za-zéàùâêîôûäëïöüç]+$/';  // \w= lettres min et maj + chiffres + _
// $pwdRegex = '/^[0-9A-Za-z\-\_\!\*éàùâêîôûäëïöüç]+$/';

// if (isset($_POST['submit'])) {  //si présence POST submit
//     if (isset($_POST['login']) && isset($_POST['pwd'])) { //si login et pwd remplis
//         if (preg_match($loginRegex, $_POST['login'])) { //si login passe la regex
//             $login = htmlspecialchars($_POST['login']);  //on déclare une var en specialchars
//         } else { //si login passe pas la regex
//             $formError['login'] = 'login non valide';
//         }

//         if (preg_match($pwdRegex, $_POST['pwd'])) {  //si pwd passe la regex
//             $pwd = password_hash(htmlspecialchars($_POST['pwd']), PASSWORD_DEFAULT);  //on déclare une var en specialchars
//         } else { //si pwd passe pas la regex
//             $formError['pwd'] = 'mot de passe non valide';
//         }

//         if (count($formError) == 0) { //si pas d'erreurs
//             //EVITER REPETITIONS DES ENTREES DANS BDD
//             $select = 'SELECT count(`login`) AS `count` 
//                         FROM `user` 
//                         WHERE `login`= :login';
    
//             $requeteSelect = $db->prepare($select);
//             $requeteSelect->bindValue(':login', $login, PDO::PARAM_STR);
//             $requeteSelect->execute();
//             $fetchSelect = $requeteSelect->fetch(PDO::FETCH_OBJ);

//             $countSelect = $fetchSelect->count;
    
//             if ($countSelect == 0) {  //si login pas enregistré
//             //use_rol_id=10 accès client
//                 $insert = 'INSERT INTO user (`login`, `mot_de_passe`, `use_rol_id`)
//                             VALUES (:insert_login, :insert_pwd, 10)'; //insertion des données avec use_rol_id=10(accès client)  (admin=1)
    
//                 $requeteInsert = $db->prepare($insert);  //requête préparée
//                 $requeteInsert->bindValue(':insert_login', $login, PDO::PARAM_STR);
//                 $requeteInsert->bindValue(':insert_pwd', $pwd, PDO::PARAM_STR);
    
//                 if ($requeteInsert->execute()) { //si la requête s'exécute
//                     $_SESSION['login'] = $_POST['login'];
//                     $_SESSION['mot_de_passe'] = $_POST['pwd'];
//                     // $_SESSION['use_rol_id'] = $exec_query1->use_rol_id;  //tabl associatif on en ressort le champ souhaité    
//                 } else { //si la requête ne s'exécute pas
//                     $formError['Error'] = 'Problème de connexion à la base de données';
//                     // echo $formError['Error'];
//                 }
//             } 
//             else { //si login déjà utilisé
//                 $formError['same'] = 'Identifiant déjà utilisé';
//             }
//         }
//     } 
//     else { //si login et pwd vides
//         $formError['login'] = 'identifiant vide';
//         $formError['pwd'] = 'identifiant vide';
//     }
// }

// ------------------------------------------------------------------------------------------------------------------------------------------
// VALIDATION CLIENT
// //assets/js/ctrlLogRegistJQ.js
//définition des variables
// var log = $('#log');
// var pwd = $('#pwd');

// //définition des variables pour affichage des erreurs
// var errorLog = $('#errorLog');
// var errorPwd = $('#errorPwd');


// //définition des Regex (respect du format)
// var regexLog = /^[0-9A-Za-zéàùâêîôûäëïöüç]+$/;  //chiffres + lettres + accents
// var regexPwd = /^[0-9A-Za-z\-\_\!\*éàùâêîôûäëïöüç]+$/;  //regexLogin+ -  _  !  * 


// //fonction générique
// $(document).ready(function() {  //dès que le document est chargé :
// 	function verifier(champ, erreur, regex) { 	//ordre paramètres n'importe pas
// 		if (champ.val() == "") {  //si le champ est vide
// 			erreur.text("Saisie manquante");
// 			erreur.css( {   
// 				color : "red"
// 			});

// 	    } else if (regex.test(champ.val()) == false) {  //si regex est passée
// 			erreur.text("Saisie erronée"); 
// 			erreur.css( {
// 				color : "orange"
// 			});
// 		} else {  //si pas d'erreur
// 			erreur.html("&#10003");  //on affiche le check(&#10003) de validation
// 			erreur.css( {
// 				color : "green"
// 			});
// 		}
// 	}

// 	//application de la fonction générique
// 	//login
// 	log.blur(function() {  //blur : à la perte de focus ça lance la fonction (click : risque que ce soit PHP avant JS)
// 		verifier(log, errorLog, regexLog);   //vérifie $login et affichera message d'erreur dans $errorLogin
// 	});
	
// 	//pwd
// 	pwd.blur(function() {
// 		verifier(pwd, errorPwd, regexPwd);  
// 	});

// });
// ------------------------------------------------------------------------------------------------------------------------------------------
?>