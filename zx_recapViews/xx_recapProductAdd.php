<?php 
include('header1headSession.php'); 
include('header3Navbar.php');
include('../controler/ctrlProductAdd.php'); //validation côté serveur
?>
<title>produits</title>
<!-- <link rel="stylesheet" href="../assets/css/msg.css"> -->

<?php 
if (isset($_POST['submit']) && count($formError) === 0) { ?>   <!-- si POST présent et pas d'erreurs, msg de confirmation de création -->
    <h4>Le produit a été ajouté</h4>
    <a href="products.php" title="Retour" class="btn btn-info">Retour à la liste de produits</a> <?php
} 

else { ?> <!-- sinon affichage formulaire -->
    <form action="" method="POST" enctype="multipart/form-data">
  
        <h1>Nouveau produit</h1>   
    <!-- A COPIER _ couleur -->                            
        <span id="errorPro_couleur"><?php echo isset($formError['pro_couleur']) ? $formError['pro_couleur'] : '' ?></span>
        <label for="pro_couleur">Couleur</label>  
        <input id="pro_couleur" name="pro_couleur" type="text" value="<?php echo isset($_POST['pro_couleur']) ? $_POST['pro_couleur'] : '' ?>" required><br> <!-- récupération de la valeur postée -->

    <!-- description avec textarea -->
        <span id="errorPro_description"><?php echo isset($formError['pro_description']) ? $formError['pro_description'] : '' ?></span>
        <label for="pro_description">Description</label>
        <textarea id="pro_description" name="pro_description" value="<?php echo isset($_POST['pro_description']) ? $_POST['pro_description'] : '' ?>" required></textarea><br>
     
    <!-- photo avec type file -->
        <span id="errorPro_photo"><?php echo isset($formError['pro_photo']) ? $formError['pro_photo'] : '' ?></span><br><br><!-- fichier js en lien avec l'affichage de la photo -->
        <img id="img" src=""/><br> 	
        <input name="pro_photo" id="pro_photo" type="file"><br>Au format : .gif, .jpg, .jpeg, .pjpeg, .png

    <!-- categorie avec select, foreach et option-->
        <label for="pro_cat_id">Catégorie</label>
        <select id="pro_cat_id" name="pro_cat_id"> <?php 
            foreach($fetchCat as $row) { ?>                        <!-- liste déroulante -->
                <option value="<?php echo $row->cat_id ?>"><?php echo $row->cat_nom ?></option> <?php 
            } ?>
        </select><br>
   
    <!-- bloque -->	
        <label for="pro_bloque1">Bloqué </label>	
        <input id="pro_bloque1" name="pro_bloque" type="radio" value="1" checked> <!-- value déterminée pour la BDD -->
        <span>Oui</span>
        <label for="pro_bloque2"></label>
        <input id="pro_bloque2" name="pro_bloque" type="radio" value="2">  <!-- value déterminée pour la BDD -->
        <span>Non</span><br>
        
    <!-- submit -->
        <input name="submit" type="submit" class="btn-info" value="création du nouveau produit">
    </form> 

<?php
} 
include('footer.php');
?>
<!-- <script src='../assets/js/loadImg.js'></script> -->
<script src='../assets/js/ctrlProductJQ.js'></script>  <!-- validation côté client -->

</body>
</html>

<?php  

// ------------------------------------------------------------------------------------------------------------------------------------------
// //CONTROLER
// //controler/ctrlProductAdd.php

// include('connexionBase.php');

// //déclaration du tableau d'erreur
// $formError = array();

// // déclaration des regexs
// $regexPro_couleur = '/^[A-Za-z\s\-àèùéâêîôûäëïöüç]+$/'; 	 //lettres, blancs(\s), tiret(\-), accents ; au moins 1 fois(+)
// $regexPro_ref = '/^[0-9A-Za-z]+$/';
// $regexPro_libelle = '/^[A-Za-z\s\'\-àâéèêîïôöùç]+$/';
// $regexPro_prix = '/^[0-9\.]+$/';
// $regexPro_stock = '/^[0-9]+$/';
// $regexPro_description = '/^[A-Za-z\s\'\-\,\.\;\:\!\?\(\)\&\°\%\+\=àâéèêîïôöùç]+$/'; 	 //lettres, blancs(\s), ponctuation, accents
// $regexPro_bloque = '/^[1-2]{1}$/';
// $pro_photo = '';


// if (isset($_POST['submit'])) {       //si POST submit présent
// /* VERIF DES ERREURS*/
//     //A COPIER _ vérif pro_ref
//     if (!empty($_POST['pro_ref'])) {  //si POST pas vide
//         if (preg_match($regexPro_ref, $_POST['pro_ref'])) {   //si regex validées
//             $pro_ref = htmlspecialchars($_POST['pro_ref']);
//         } else { //si regex pas validées
//             $formError['pro_ref'] = 'Veuillez renseigner une référence valide';
//         }
//     } else { //si POST vide
//         $formError['pro_ref'] = 'Veuillez préciser une référence';
//     }

//                 // vérif pro_cat_id
//                 if (!empty($_POST['pro_cat_id'])) {
//                     $pro_cat_id = htmlspecialchars($_POST['pro_cat_id']);
//                 } else {
//                     $formError['pro_cat_id'] = 'Veuillez renseigner une catégorie';
//                 }

//                 //vérif pro_bloque    
//                 if (!empty($_POST['pro_bloque'])) {
//                     if (preg_match($regexPro_bloque, $_POST['pro_bloque'])) {
//                         $pro_bloque = $_POST['pro_bloque'];
//                     } else {
//                         $formError['pro_bloque'] = 'Veuillez renseigner un blocage valide';
//                     }
//                 } 

//                 //vérif photo
//                 if ($_FILES['pro_photo']['name'] != '')  //si champ pro_photo n'est pas vide
//                 {
//                     $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff'); //types de fichiers acceptés
                    
//                     //on extrait extension et stocke dans une variable
//                     $finfo = finfo_open(FILEINFO_MIME_TYPE); 
//                     $mimetype = finfo_file($finfo, $_FILES['pro_photo']['tmp_name']);  
//                     finfo_close($finfo);

//                     if (in_array($mimetype, $aMimeTypes)) {  //si le type de fichier est correct
//                         $pro_photo = pathinfo($_FILES['pro_photo']['name'], PATHINFO_EXTENSION);  //récupération de l'extension et stockage dans une variable
//                     } 
//                     else {  //si le type de fichier n'est pas correct
//                         $formError['pro_photo'] = 'Veuillez joindre une photo valide';
//                     }
//                 } else { //si champ pro_photo est vide
//                     $formError['pro_photo'] = 'Veuillez insérer une photo';
//                 }


// /* GESTION DES ERREURS */
//     if (count($formError) == 0) {    //s'il n'y a pas d'erreurs
//         $insertInto = 'INSERT INTO produits (pro_cat_id, pro_libelle, pro_ref, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque)'
//             . 'VALUE (:pro_cat_id, :pro_libelle, :pro_ref, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW(), :pro_bloque)';
//         $resultInsert = $db->prepare($insertInto);
//         $resultInsert->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
//         $resultInsert->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
//         $resultInsert->...                              A COPIER

//         if ($resultInsert->execute()) {
//             $upload_dir = '../../ci/assets/img/';  //stocke chemin de destination
//             $_FILES['pro_photo']['name'] = $db->lastInsertId();  //renomme fichier
//             $upload_file = $upload_dir . $_FILES['pro_photo']['name'] . '.' . $pro_photo;  // indication du chemin + nom de fichier pour le déplacement
//             chmod($_FILES['pro_photo']['tmp_name'], 0777);  // autorisation pour l'écriture     
//             move_uploaded_file($_FILES['pro_photo']['tmp_name'], $upload_file);  //déplacement du fichier
//         }
//     } 
//     else {  //s'il y a des erreurs
//         $formError['error'] = 'Une erreur est survenue lors de l\'insertion du produit dans la base de données';
        
//         //récupération des categories pour la liste déroulante en cas d'erreur
//         $selectCat = 'SELECT * FROM categories 
//                     ORDER BY cat_nom ASC';
//         $resultCat = $db->query($selectCat);
//         $fetchCat = $resultCat->fetchAll(PDO::FETCH_OBJ);
//         return $fetchCat;
//     }
// } 
// else { //si post submit pas présent
//     $selectCat = 'SELECT * FROM categories 
//                 ORDER BY cat_nom ASC';
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