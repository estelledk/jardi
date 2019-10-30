<?php
include('header1headSession.php');
include('header3Navbar.php'); 
include('../controler/ctrlProductUpdate.php');  //inclut connexion bdd
?>
<title>produits</title>
<!-- <link rel="stylesheet" href="../assets/css/msg.css"> -->

<?php
if (isset($_POST['submit']) && count($formError) == 0) { ?>  <!-- si POST présent et pas d'erreurs, msg de confirmation de création -->
    <h4>Le produit a été modifié</h4>
    <a href="products.php" title="Retour">Retour à la liste de produits</a> <?php
} 
else { ?> <!-- sinon affichage formulaire -->
    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Modification du produit <?php echo $fetchProd_whereProId->pro_libelle ?></h2><br>
        
    <!-- A COPIER _ couleur -->
        <span id="errorPro_couleur"><?php echo isset($formError['pro_couleur']) ? $formError['pro_couleur'] : '' ?></span><br><br>
        <label for="pro_couleur">Couleur</label> 				
        <input id="pro_couleur" name="pro_couleur" type="text" value="<?php echo isset($_POST['pro_couleur']) ? $_POST['pro_couleur'] : $fetchProd_whereProId->pro_couleur ?>">
                
    <!-- description avec textarea -->
        <span id="errorPro_description"><?php echo isset($formError['pro_description']) ? $formError['pro_description'] : '' ?></span><br>
        <label for="pro_description">Description</label>
        <textarea id="pro_description" name="pro_description"><?php echo isset($_POST['decription']) ? $_POST['pro_description'] : $fetchProd_whereProId->pro_description ?></textarea><br>

    <!-- photo avec type file -->   
        <span id="errorPro_photo"><?php echo isset($formError['pro_photo']) ? $formError['pro_photo'] : '' ?></span> <!-- type="file" -->
        <img id="img" src="" /><br>
        <input name="pro_photo" id="pro_photo" type="file"><br>Au format : .gif, .jpg, .jpeg, .pjpeg, .png <br><br>

    <!-- categorie avec select, foreach et option-->
        <label for="pro_cat_id">Catégorie</label> 
        <select id="pro_cat_id" name="pro_cat_id"> <?php
            foreach ($fetchCat as $row) { ?>
                <option value="<?php echo $row->cat_id ?>" <?php echo isset($_POST['pro_cat_id']) && $_POST['pro_cat_id'] == $row->cat_id || $row->cat_id == $fetchProd_whereProId->pro_cat_id  ? 'selected' : '' ?>>
                    <?php echo $row->cat_nom ?>
                </option> <?php
            } ?> 
        </select><br>

    <!-- bloque -->	
        <label for="bloque1">Bloqué </label>
        <input id="pro_bloque1" name="pro_bloque" type="radio" value="1" checked> <!-- value déterminée pour la BDD -->
        <span>Oui</span>
        <label for="pro_bloque2"></label>
        <input id="pro_bloque2" name="pro_bloque" type="radio" value="2"> <!-- value déterminée pour la BDD -->
        <span>Non</span><br>

    <!-- ID -->
        <label for="pro_id">ID</label><br>
        <input id="pro_id" name="pro_id" type="text" value="<?php echo $fetchProd_whereProId->pro_id ?>" readonly="readonly"><br><br>

    <!-- date d ajout -->           						
        <label for="pro_d_ajout">Date d'ajout</label>
        <input id="pro_d_ajout" name="pro_d_ajout" value="<?php echo $fetchProd_whereProId->pro_d_ajout ?>" readonly="readonly"><br>
            
    <!-- date modif -->
        <span id="errorPro_d_modif"><?php echo isset($formError['pro_d_modif']) ? $formError['pro_d_modif'] : '' ?></span><br>
        <label for="pro_d_modif">Date de modif (se notera automatiquement)</label>
        <input id="pro_d_modif" name="pro_d_modif" value="<?php echo isset($_POST['pro_d_modif']) ? $_POST['pro_d_modif'] : $fetchProd_whereProId->pro_d_modif ?>" readonly="readonly">
                
	<!-- submit -->
        <input name="submit" type="submit" class="btn btn-warning" value="modification du produit"><br>
    </form> <br><br>

<?php
}
include('footer.php');
?>
<!-- <script src="../assets/js/loadImg.js"></script> -->
<script src="../assets/js/ctrlProductJQ.js"></script>  <!-- validation côté client -->

</body>
</html>

<?php

// ------------------------------------------------------------------------------------------------------------------------------------------
// //CONTROLER
// //controler/ctrlProductUpdate.php
// include('connexionBase.php');

// $formError = array();   // déclaration du tableau d'erreur

// $regexPro_couleur = '/^[A-Za-z\s\-àèùéâêîôûäëïöüç]+$/'; 	 //lettres, blancs(\s), tiret(\-), accents ; au moins 1 fois(+)
// $regexPro_ref = '/^[0-9A-Za-z]+$/';
// $regexPro_libelle = '/^[A-Za-z\s\'\-àâéèêîïôöùç]+$/';
// $regexPro_prix = '/^[0-9\.]+$/';
// $regexPro_stock = '/^[0-9]+$/';
// $regexPro_description = '/^[A-Za-z\s\'\-\,\.\;\:\!\?\(\)\&\°\%\+\=àâéèêîïôöùç]+$/'; 	 //lettres, blancs(\s), ponctuation, accents
// // $regexPro_d_modif = '/^(0[1-9]|1[0-9]|2[0-9]|3[01])\-(0[1-9]|1[012])\-(2[0][1][1-9])$/';
// $regexPro_bloque = '/^[1-2]{1}$/';
// $pro_photo = '';


// if (isset($_POST['submit'])) {  //si présence du POST submit
//     $pro_id = $_POST['pro_id'];

// /* VERIF DES ERREURS*/
//     //A COPIER _ vérif pro_ref
//     if (!empty($_POST['pro_ref'])) {  //si POST pas vide
//         if (preg_match($regexPro_ref, $_POST['pro_ref'])) {   //si regex validées
//             $pro_ref = htmlspecialchars($_POST['pro_ref']);
//         } else { //si regex pas validées
//             $formError['pro_ref'] = 'Veuillez renseigner une référence valide';
//         }
//     } else {     //si POST vide
//         $formError['pro_ref'] = 'Veuillez préciser une référence';
//     }

//                 //vérif pro_bloque    
//                 if (!empty($_POST['pro_bloque'])) {
//                     if (preg_match($regexPro_bloque, $_POST['pro_bloque'])) {
//                         $pro_bloque = $_POST['pro_bloque'];
//                     } else {
//                         $formError['pro_bloque'] = 'Veuillez renseigner un blocage valide';
//                     }
//                 } 

//                 //vérif photo
//                 if ($_FILES['pro_photo']['name'] != '') {    // si le champs n'est pas vide
//                     $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');  //on définit les types de fichiers acceptés

//                     //On extrait le type du fichier via l'extension FILE_INFO 
//                     $finfo = finfo_open(FILEINFO_MIME_TYPE);  // création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée
//                     $mimetype = finfo_file($finfo, $_FILES['pro_photo']['tmp_name']);  // on récupère le type MIME du fichier et on le stock dans une variable
//                     finfo_close($finfo);

//                     if (in_array($mimetype, $aMimeTypes)) {   //si le type de fichier est correct
//                         //$pro_photo = pathinfo($_FILES['pro_photo']['name'], PATHINFO_EXTENSION);   // récupération de l'extension du fichier et stockage dans une variable
//                         $pro_photo = substr(strrchr($_FILES['pro_photo']['name'], "."), 1);      
//                         chmod($_FILES['pro_photo']['tmp_name'], 0750);   // autorisation pour l'écriture (chmod) et renommage du fichier avec $_FILES['pro_photo']['name'] 
//                         move_uploaded_file($_FILES['pro_photo']['tmp_name'], '../../ci/assets/img/' . $_POST['pro_id'] . "." . $pro_photo);  //déplacement du fichier avec move_uploaded_file($_FILES['pro_photo']['tmp_name'], $upload_file);   
//                     } 
//                     else {    //si le type n'est pas correct
//                         $formError['pro_photo'] = 'Vous devez joindre une photo valide au produit';   // cas où il n'y a pas de fichier d'uploader
//                     }
//                 }

// /* GESTION DES ERREURS */
//     if (empty($formError)) {  //si le tableau d'erreur est vide
//         $updateProd = 'UPDATE produits 
//         SET
//         pro_cat_id = :pro_cat_id,
//         pro_ref = :pro_ref,
//         pro_...                              A COPIER
//         pro_d_modif = NOW(),
//         pro_bloque = :pro_bloque
//         WHERE pro_id = :pro_id';

//         $resultUpdate = $db->prepare($updateProd);
//         $resultUpdate->bindvalue(':pro_id', $pro_id, PDO::PARAM_INT);
//         $resultUpdate->bindvalue(':pro_cat_id', $_POST['pro_cat_id'], PDO::PARAM_INT);
//         $resultUpdate->...                   A COPIER

//         return $resultUpdate->execute();
//     }
//     else {   //s'il y a des erreurs
//         //requête pour afficher toutes les col relatives à un prod visible 
//         $selectProd_whereProId = 'SELECT * FROM produits
//                     WHERE pro_id ='.$pro_id;
//         $resultProd_whereProId = $db->query($selectProd_whereProId);
//         $fetchProd_whereProId = $resultProd_whereProId->fetch(PDO::FETCH_OBJ);  

//         //requête pour afficher nom de la catégorie grâce à la jointure
//         $selectProd_joinCat = 'SELECT * FROM `produits`
//                         INNER JOIN `categories`
//                         ON produits.pro_cat_id = categories.cat_id
//                         WHERE pro_id ='.$pro_id;  
//         $resultProd_joinCat = $db->query($selectProd_joinCat);  
//         $fetchProd_joinCat = $resultProd_joinCat->fetchAll(PDO::FETCH_OBJ); 

//         return $fetchProd_joinCat;
//     }
// } 
// else {   //sinon affichage formulaire
//     //requête pour afficher toutes les col relatives à un prod visible 
//     $pro_id = $_GET['pro_id']; //récupère la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET
   
//     $selectProd_whereProId = 'SELECT * FROM produits
//                 WHERE pro_id ='.$pro_id;
//     $resultProd_whereProId = $db->query($selectProd_whereProId);
//     $fetchProd_whereProId = $resultProd_whereProId->fetch(PDO::FETCH_OBJ);  

//     //requête pour afficher nom de la catégorie grâce à la jointure
//     $selectCat = 'SELECT * FROM `categories`
//                     ORDER BY cat_nom ASC';     
//     $resultCat = $db->query($selectCat);  
//     $fetchCat = $resultCat->fetchAll(PDO::FETCH_OBJ); 

//     return $fetchCat;
// }
// ------------------------------------------------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------------------------------------------------
// VALIDATION CLIENT
// //assets/js/ctrlProductJQ.js
// //définition des variables
// var pro_couleur = $('#pro_couleur');
// var pro_ref = $('#pro_ref');
// var pro_libelle = $('#pro_libelle');
// var pro_prix = $('#pro_prix');
// var pro_stock = $('#pro_stock');
// var pro_description = $('#pro_description');

// //définition des variables pour affichage des erreurs
// var errorPro_couleur = $('#errorPro_couleur');
// var errorPro_ref = $('#errorPro_ref');
// var errorPro_libelle = $('#errorPro_libelle');
// var errorPro_prix = $('#errorPro_prix');
// var errorPro_stock = $('#errorPro_stock');
// var errorPro_description = $('#errorPro_description');

// //définition des Regex (respect du format)
// var regexPro_couleur = /^[A-Za-z\s\-àèùéâêîôûäëïöüç]+$/; 	 //lettres, blancs(\s), tiret(\-), accents ; au moins 1 fois(+)
// var regexPro_ref = /^[0-9A-Za-z]+$/;
// var regexPro_libelle = /^[A-Za-z\s\'\-àèùéâêîôûäëïöüç]+$/;     
// var regexPro_prix = /^[0-9\.]+$/;
// var regexPro_stock = /^[0-9]+$/;
// var regexPro_description = /^[A-Za-z\s\'\-\,\.\;\:\!\?\(\)\&\°\%\+\=àâéèêîïôöùç]+$/; 	 //lettres, blancs(\s), ponctuation, accents


// $(document).ready(function()   //dès que le document est chargé :
// {
//    function verifier(champ, erreur, regex)  //fonction générique
// 	  {
// 		  if (champ.val() == '') {  //si le champ est vide
// 			erreur.text('Saisie manquante');
// 			erreur.css( {   
// 				color : 'red'
// 			});
// 	      } else if (regex.test(champ.val()) == false) {  //si regex ne passe pas
// 			erreur.text('Saisie erronée'); 
// 			erreur.css( {  
// 				color : 'orange'
// 			});
// 		  } else {  //si regex passe
// 			erreur.html('&#10003');  //on affiche le check(&#10003) de validation
// 			erreur.css( {   
// 				color : 'green'
// 			});
// 		  }
// 	  }
   
//    //A COPIER _ application de la fonction 
//    pro_couleur.blur(function() {
//        verifier(pro_couleur, errorPro_couleur, regexPro_couleur); 
//    });

// });
// ------------------------------------------------------------------------------------------------------------------------------------------

?>