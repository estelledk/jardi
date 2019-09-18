<?php
include ('connexionBase.php'); //connexion à la BDD

/**
 *  AJOUT D'UN PRODUIT DANS BDD
 */


// déclaration du tableau d'erreur
$formError = array();

// déclaration des regexs
$refPattern = '/^[a-zA-Z\_\-\d]+$/';
$textPattern = '/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/';
$pricePattern = '/^[0-9-.]+$/';
$numPattern = '/^[\d]+$/';
$radioPattern = '/^[1-2]{1}$/';
$colorPattern = '/^[a-zA-Zéèëê]+$/';
$pro_photo = '';


if (isset($_POST['submit'])) {  //si POST submit est présent

// vérif categories
    if (!empty($_POST['categories'])) {
        $pro_cat_id = htmlspecialchars($_POST['categories']);
    } 
    else 
    {
        $formError['categories'] = 'Veuillez renseigner une catégorie pour le produit';
    }

// vérif ref
    if (!empty($_POST['ref']))  //si POST pas vide
    {
        if (preg_match($refPattern, $_POST['ref']))   //si regex validées
        {
            $pro_ref = htmlspecialchars($_POST['ref']);
        } 
        else //si regex pas validées
        {
            $formError['ref'] = 'Veuillez renseigner une référence valide';
        }
    } 
    else //si POST vide
    {
        $formError['ref'] = 'Veuillez préciser une référence au produit';
    }

//vérif color
    if (!empty($_POST['color'])) {
        if (preg_match($colorPattern, $_POST['color'])) {
            $pro_color = htmlspecialchars($_POST['color']);
        } 
        else 
        {
            $formError['color'] = 'Veuillez renseigner une couleur valide';
        }
    } 
    else 
    {
        $formError['color'] = 'Veuillez préciser une couleur au produit';
    }

// vérif label
    if (!empty($_POST['label'])) {
        if (preg_match($textPattern, $_POST['label'])) {
            $pro_libelle = htmlspecialchars($_POST['label']);
        } 
        else 
        {
            $formError['label'] = 'Veuillez renseigner un libellé valide';
        }
    } 
    else 
    {
        $formError['label'] = 'Veuillez préciser un libellé au produit';
    }

// vérif price
    if (!empty($_POST['price'])) {
        if (preg_match($pricePattern, $_POST['price'])) {
            $pro_prix = htmlspecialchars($_POST['price']);
        } 
        else 
        {
            $formError['price'] = 'Veuillez renseigner un prix valide';
        }
    } 
    else 
    {
        $formError['price'] = 'Veuillez préciser un prix au produit';
    }

// vérif stock
    if (!empty($_POST['stock'])) {
        if (preg_match($numPattern, $_POST['stock'])) {
            $pro_stock = htmlspecialchars($_POST['stock']);
        } 
        else 
        {
            $formError['stock'] = 'Veuillez renseigner un stock valide';
        }
    } 
    else 
    {
        $formError['stock'] = 'Veuillez préciser un stock au produit';
    }

// vérif description
    if (!empty($_POST['description'])) {
        if (preg_match($textPattern, $_POST['description'])) {
            $pro_description = htmlspecialchars($_POST['description']);
        } 
        else 
        {
            $formError['description'] = 'Veuillez renseigner un description valide valide';
        }
    } 
    else 
    {
        $formError['description'] = 'Veuillez préciser une description au produit';
    }

//vérif radio2    
    if (!empty($_POST['radio2'])) {
        if (preg_match($radioPattern, $_POST['radio2'])) {
            $pro_bloque = htmlspecialchars($_POST['radio2']);
        } 
        else 
        {
            $formError['radio2'] = 'Veuillez renseigner un blocage valide';
        }
    } 
    else 
    {
        $formError['radio2'] = 'Veuillez préciser si le produit est bloqué ou non';
    }


//vérif fichier
    if ($_FILES['file']['name'] != '')  //si le champs file n'est pas vide
    {
        //on définit les types de fichiers acceptés
        $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff'); 

        //création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée  
        $finfo = finfo_open(FILEINFO_MIME_TYPE);  //on extrait le type du fichier via l'extension FILE_INFO
        $mimetype = finfo_file($finfo, $_FILES['file']['tmp_name']);  // on récupère le type MIME du fichier et on le stocke dans une variable

        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes))  //si le type de fichier est correct
        {
            $pro_photo = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);  //récupération de l'extension et stockage dans une variable
        } 
        else  //si le fichier n'est pas correct
        {
            $formError['file'] = 'Vous devez joindre une photo valide au produit';
        }

    } 
    else  //si le champs est vide
    {
        $formError['file'] = 'Veuillez insérer une photo';
    }


    /**
     * GESTION DES ERREURS
     */
    if (count($formError) == 0) //s'il n'y a pas d'erreurs
    {
        $requete = 'INSERT INTO produits (pro_cat_id, pro_libelle, pro_ref, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque)'
            . 'VALUE (:pro_cat_id, :pro_libelle, :pro_ref, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW(), :pro_bloque)';
        $addProduct = $db->prepare($requete);
        $addProduct->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
        $addProduct->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_prix', $pro_prix, PDO::PARAM_INT);
        $addProduct->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $addProduct->bindValue(':pro_couleur', $pro_color, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_photo', $pro_photo, PDO::PARAM_STR);
        $addProduct->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);

        if ($addProduct->execute()) {
            //stockage du chemin de destination dans une variable
            $upload_dir = '../assets/img/';

            // renommage du fichier
            $_FILES['file']['name'] = $db->lastInsertId();

            // indication du chemin + nom de fichier pour le déplacement
            $upload_file = $upload_dir . $_FILES['file']['name'] . '.' . $pro_photo;

            // autorisation pour l'écriture
            // chmod($_FILES['file']['tmp_name'], 0777);

            //déplacement du fichier
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);

            //message de confirmation
            // header('Location:products.php');
        }
        
    } 
    else  //s'il y a des erreurs
    {
        $formError['error'] = 'Une erreur est survenue lors de l\'insertion du produit dans la base de données';

        /** 
         * affichage des catégories dans la liste déroulante
         *  */ 
        // $requete = 'SELECT * FROM categories';
        // $reponse = $db->query($requete);
        // if (is_object($reponse)) {
        //     $isObjectResult = $reponse->fetchAll(PDO::FETCH_OBJ);
        // }
        // return $isObjectResult;
            //on peut écrire directement, sans faire la condition :
            // $requete = 'SELECT * FROM categories';
            // $reponse = $db->query($requete);
            // $isObjectResult = $reponse->fetchAll(PDO::FETCH_OBJ);
            // return $isObjectResult;
    }
} 
// else {  //si POST submit n'est pas présent
//     /** 
//          * affichage des catégories dans la liste déroulante
//          *  */ 
//     $requete = 'SELECT * FROM categories';
//     $reponse = $db->query($requete);
//     if (is_object($reponse)) {
//         $isObjectResult = $reponse->fetchAll(PDO::FETCH_OBJ);
//     }
//     return $isObjectResult;
// }