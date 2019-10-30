<?php
include('connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd :

$formError = array();   // déclaration du tableau d'erreur

$regexPro_couleur = '/^[A-Za-z\s\-àèùéâêîôûäëïöüç]+$/'; 	 //lettres, blancs(\s), tiret(\-), accents ; au moins 1 fois(+)
$regexPro_ref = '/^[0-9A-Za-z]+$/';
$regexPro_libelle = '/^[A-Za-z\s\'\-àâéèêîïôöùç]+$/';
$regexPro_prix = '/^[0-9\.]+$/';
$regexPro_stock = '/^[0-9]+$/';
$regexPro_description = '/^[A-Za-z\s\'\-\,\.\;\:\!\?\(\)\&\°\%\+\=àâéèêîïôöùç]+$/'; 	 //lettres, blancs(\s), ponctuation, accents
// $regexPro_d_modif = '/^(0[1-9]|1[0-9]|2[0-9]|3[01])\-(0[1-9]|1[012])\-(2[0][1][1-9])$/';
$regexPro_bloque = '/^[1-2]{1}$/';
$pro_photo = '';



if (isset($_POST['submit']) )  // si présence du POST submit
{
    $pro_id = $_POST['pro_id'];

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

    /**
     * VERIFICATION DU CHAMPS FILE
     */
//vérif photo puis $_FILES
    if ($_FILES['pro_photo']['name'] != '')  // si le champs n'est pas vide
    {
        $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');  //on définit les types de fichiers acceptés

        //On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);  // création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée
        $mimetype = finfo_file($finfo, $_FILES['pro_photo']['tmp_name']);  // on récupère le type MIME du fichier et on le stock dans une variable
        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes))  //si le type de fichier est correct
        {
            // $pro_photo = pathinfo($_FILES['pro_photo']['name'], PATHINFO_EXTENSION);   // récupération de l'extension du fichier et stockage dans une variable
            $pro_photo = substr(strrchr($_FILES['pro_photo']['name'], "."), 1);      
            chmod($_FILES['pro_photo']['tmp_name'], 0750);   // autorisation pour l'écriture (chmod) et renommage du fichier avec $_FILES['pro_photo']['name'] 
            move_uploaded_file($_FILES['pro_photo']['tmp_name'], '../../ci/assets/img/' . $_POST['pro_id'] . "." . $pro_photo);  //déplacement du fichier avec move_uploaded_file($_FILES['pro_photo']['tmp_name'], $upload_file);   
        } 
        else  //si le type n'est pas correct
        {
            $formError['pro_photo'] = 'Vous devez joindre une photo valide au produit';   // cas où il n'y a pas de fichier d'uploader
        }
    }

    /**
     * GESTION DES ERREURS
     */

    if (empty($formError))  //si le tableau d'erreur est vide
    {
        $updateProd = 'UPDATE produits 
        SET
        pro_cat_id = :pro_cat_id,
        pro_ref = :pro_ref,
        pro_libelle = :pro_libelle,
        pro_description = :pro_description,
        pro_prix = :pro_prix,
        pro_couleur = :pro_couleur,
        pro_stock = :pro_stock,
        pro_photo = :pro_photo,
        pro_d_modif = NOW(),
        pro_bloque = :pro_bloque
        WHERE pro_id = :pro_id';

        $resultUpdate = $db->prepare($updateProd);
        $resultUpdate->bindvalue(':pro_id', $pro_id, PDO::PARAM_INT);
        $resultUpdate->bindvalue(':pro_cat_id', $_POST['pro_cat_id'], PDO::PARAM_INT);
        $resultUpdate->bindvalue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $resultUpdate->bindvalue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $resultUpdate->bindvalue(':pro_description', $pro_description, PDO::PARAM_STR);
        $resultUpdate->bindvalue(':pro_prix', $pro_prix, PDO::PARAM_INT);
        $resultUpdate->bindvalue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
        $resultUpdate->bindvalue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $resultUpdate->bindvalue(':pro_photo', $pro_photo, PDO::PARAM_STR);
        $resultUpdate->bindvalue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);

        return $resultUpdate->execute();
    }
    else //s'il y a des erreurs
    { 
        //requête pour afficher toutes les col relatives à un prod visible 
        $selectProd_whereProId = 'SELECT * FROM produits
                    WHERE pro_id ='.$pro_id;
        $resultProd_whereProId = $db->query($selectProd_whereProId);
        $fetchProd_whereProId = $resultProd_whereProId->fetch(PDO::FETCH_OBJ);  

        //requête pour afficher nom de la catégorie grâce à la jointure
        $selectProd_joinCat = 'SELECT * FROM `produits`
                        INNER JOIN `categories`
                        ON produits.pro_cat_id = categories.cat_id
                        WHERE pro_id ='.$pro_id;  
        $resultProd_joinCat = $db->query($selectProd_joinCat);  
        $fetchProd_joinCat = $resultProd_joinCat->fetchAll(PDO::FETCH_OBJ); 

        return $fetchProd_joinCat;
    }
} 
else //sinon affichage formulaire
{
    //requête pour afficher toutes les col relatives à un prod visible 
    $pro_id = $_GET['pro_id']; //récupère la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET
   
    $selectProd_whereProId = 'SELECT * FROM produits
                WHERE pro_id ='.$pro_id;
    $resultProd_whereProId = $db->query($selectProd_whereProId);
    $fetchProd_whereProId = $resultProd_whereProId->fetch(PDO::FETCH_OBJ);  

    //requête pour afficher nom de la catégorie grâce à la jointure
    $selectCat = 'SELECT * FROM `categories`
                    ORDER BY cat_nom ASC';     
    $resultCat = $db->query($selectCat);  
    $fetchCat = $resultCat->fetchAll(PDO::FETCH_OBJ); 

    return $fetchCat;
}
?>
