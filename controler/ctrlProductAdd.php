<?php
include('connexionBase.php');

// déclaration du tableau d'erreur
$formError = array();

// déclaration des regexs
$regexPro_couleur = '/^[A-Za-z\s\-àèùéâêîôûäëïöüç]+$/'; 	 //lettres, blancs(\s), tiret(\-), accents ; au moins 1 fois(+)
$regexPro_ref = '/^[0-9A-Za-z]+$/';
$regexPro_libelle = '/^[A-Za-z\s\'\-àâéèêîïôöùç]+$/';
$regexPro_prix = '/^[0-9\.]+$/';
$regexPro_stock = '/^[0-9]+$/';
$regexPro_description = '/^[A-Za-z\s\'\-\,\.\;\:\!\?\(\)\&\°\%\+\=àâéèêîïôöùç]+$/'; 	 //lettres, blancs(\s), ponctuation, accents
$regexPro_bloque = '/^[1-2]{1}$/';
$pro_photo = '';


if (isset($_POST['submit']))  //si POST submit présent
{

/* VERIF DES ERREURS*/
    // vérif pro_cat_id
    if (!empty($_POST['pro_cat_id'])) {
        $pro_cat_id = htmlspecialchars($_POST['pro_cat_id']);
    } else {
        $formError['pro_cat_id'] = 'Veuillez renseigner une catégorie';
    }

    // vérif pro_ref
    if (!empty($_POST['pro_ref'])) {  //si POST pas vide
        if (preg_match($regexPro_ref, $_POST['pro_ref'])) {   //si regex validées
            $pro_ref = htmlspecialchars($_POST['pro_ref']);
        } else { //si regex pas validées
            $formError['pro_ref'] = 'Veuillez renseigner une référence valide';
        }
    } else { //si POST vide
        $formError['pro_ref'] = 'Veuillez préciser une référence';
    }

    //vérif pro_couleur
    if (!empty($_POST['pro_couleur'])) {
        if (preg_match($regexPro_couleur, $_POST['pro_couleur'])) {
            $pro_couleur = htmlspecialchars($_POST['pro_couleur']);
        } else {
            $formError['pro_couleur'] = 'Veuillez renseigner une couleur valide';
        }
    } else {
        $formError['pro_couleur'] = 'Veuillez préciser une couleur';
    }

    // vérif pro_libelle
    if (!empty($_POST['pro_libelle'])) {
        if (preg_match($regexPro_libelle, $_POST['pro_libelle'])) {
            $pro_libelle = htmlspecialchars($_POST['pro_libelle']);
        } else {
            $formError['pro_libelle'] = 'Veuillez renseigner un libellé valide';
        }
    } else {
        $formError['pro_libelle'] = 'Veuillez préciser un libellé';
    }

    // vérif pro_prix
    if (!empty($_POST['pro_prix'])) {
        if (preg_match($regexPro_prix, $_POST['pro_prix'])) {
            $pro_prix = htmlspecialchars($_POST['pro_prix']);
        } else {
            $formError['pro_prix'] = 'Veuillez renseigner un prix valide';
        }
    } else {
        $formError['pro_prix'] = 'Veuillez préciser un prix';
    }

    // vérif pro_stock
    if (!empty($_POST['pro_stock'])) {
        if (preg_match($regexPro_stock, $_POST['pro_stock'])) {
            $pro_stock = htmlspecialchars($_POST['pro_stock']);
        } else {
            $formError['pro_stock'] = 'Veuillez renseigner un stock valide';
        }
    } else {
        $formError['pro_stock'] = 'Veuillez préciser un stock';
    }

    // vérif pro_description
    if (!empty($_POST['pro_description'])) {
        if (preg_match($regexPro_description, $_POST['pro_description'])) {
            $pro_description = htmlspecialchars($_POST['pro_description']);
        } else {
            $formError['pro_description'] = 'Veuillez renseigner une description valide valide';
        }
    } else {
        $formError['pro_description'] = 'Veuillez préciser une description';
    }

    //vérif pro_bloque    
    if (!empty($_POST['pro_bloque'])) {
        if (preg_match($regexPro_bloque, $_POST['pro_bloque'])) {
            $pro_bloque = $_POST['pro_bloque'];
        } else {
            $formError['pro_bloque'] = 'Veuillez renseigner un blocage valide';
        }
    } 

    //vérif photo
    // if(!empty($_FILES['pro_photo']['name'])) {    // Seulement si une image a été spécifiée
    //     $type = explode(".",$_FILES['pro_photo']['name'])[1];
    //     $fileName = $id . "." . $type;
    //     move_uploaded_file($_FILES['pro_photo']['tmp_name'], "assets/img/$fileName"); //on envoie l'image dans le dossier img en la renommant 'id.type'
    //     $stmtUpd->bindValue(':pro_photo', $type);
    // } else {
    //     $stmtUpd->bindValue(':pro_photo', $currentExt);
    // }
    if ($_FILES['pro_photo']['name'] != '')  //si champ pro_photo n'est pas vide
    {
        $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff'); //types de fichiers acceptés
        
        //on extrait extension et stocke dans une variable
        $finfo = finfo_open(FILEINFO_MIME_TYPE); 
        $mimetype = finfo_file($finfo, $_FILES['pro_photo']['tmp_name']);  
        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes)) {  //si le type de fichier est correct
            $pro_photo = pathinfo($_FILES['pro_photo']['name'], PATHINFO_EXTENSION);  //récupération de l'extension et stockage dans une variable
        } 
        else {  //si le type de fichier n'est pas correct
            $formError['pro_photo'] = 'Veuillez joindre une photo valide';
        }
    } else { //si champ pro_photo est vide
        $formError['pro_photo'] = 'Veuillez insérer une photo';
    }


/* GESTION DES ERREURS */
    if (count($formError) == 0) //s'il n'y a pas d'erreurs
    {
        $insertInto = 'INSERT INTO produits (pro_cat_id, pro_libelle, pro_ref, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque)'
            . 'VALUE (:pro_cat_id, :pro_libelle, :pro_ref, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW(), :pro_bloque)';
        $resultInsert = $db->prepare($insertInto);
        $resultInsert->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
        $resultInsert->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $resultInsert->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $resultInsert->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
        $resultInsert->bindValue(':pro_prix', $pro_prix, PDO::PARAM_INT);
        $resultInsert->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $resultInsert->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
        $resultInsert->bindValue(':pro_photo', $pro_photo, PDO::PARAM_STR);
        $resultInsert->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);

        if ($resultInsert->execute()) {
            $upload_dir = '../../ci/assets/img/';  //stocke chemin de destination
            $_FILES['pro_photo']['name'] = $db->lastInsertId();  //renomme fichier
            $upload_file = $upload_dir . $_FILES['pro_photo']['name'] . '.' . $pro_photo;  // indication du chemin + nom de fichier pour le déplacement
            
            chmod($_FILES['pro_photo']['tmp_name'], 0777);  // autorisation pour l'écriture     
            move_uploaded_file($_FILES['pro_photo']['tmp_name'], $upload_file);  //déplacement du fichier
        }
    } 
    else {  //s'il y a des erreurs
        $formError['error'] = 'Une erreur est survenue lors de l\'insertion du produit dans la base de données';
        
        // récupération des categories pour la liste déroulante en cas d'erreur
        $selectCat = 'SELECT * FROM categories 
                    ORDER BY cat_nom ASC';
        $resultCat = $db->query($selectCat);
        $fetchCat = $resultCat->fetchAll(PDO::FETCH_OBJ);
        return $fetchCat;
    }
} 
else { //si post submit pas présent
    $selectCat = 'SELECT * FROM categories 
                ORDER BY cat_nom ASC';
    $resultCat = $db->query($selectCat);
    $fetchCat = $resultCat->fetchAll(PDO::FETCH_OBJ);
    return $fetchCat;
}