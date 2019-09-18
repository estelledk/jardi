<?php
include ('connexionBase.php');  

$date = date('Y-m-d H:i:s');

// récupération de l'id passé dans l'url


/**
 * SUPPRESSION DU PRODUIT
 */

// if (isset($_POST['delete']))
// {
//     $query = 'DELETE FROM produits '
//             . 'WHERE pro_id = :id ';
//     $result = $db->prepare($query);
//     $result->bindvalue(':id', $id, PDO::PARAM_INT);
//     return $result->execute();
// }

/**
 * DECLARATON DES VARIABLES
 */

// déclaration du tableau d'erreur
$formError = array();

// déclaration des regexs
$textPattern = '/^[a-zA-Z\-\,\. \déèàçùëüïôäâêûîô#&]+$/';
$pricePattern = '/^[\d]+[.]{1}[\d]{2,}+$/';
$numPattern = '/^[0-9]+$/';
$radioPattern = '/^[1-2]{1}$/';
$extension = '';


/**
 * RECUPERATION DE L'ID DU PRODUIT
 */

if (isset($_POST['submit']) )  // si la valeur du bouton submit est présente
{
    $id = $_POST['pro_id'];
    
//vérif ref 
    if (empty($_POST['ref']) ) //si ref est vide
    {
        $formError['ref'] = 'Veuillez renseigner le champs "Référence"';
    } 
    else if (!preg_match($textPattern, $_POST['ref']) ) //si ref pas vide et pas passage des regex
    {
        $formError['ref'] = 'Veuillez renseigner une référence valide';
    }

//vérif color
    if (empty($_POST['color']) )
    {
        $formError['color'] = 'Veuillez renseigner le champs "Couleur"';
    } 
    else if (!preg_match($textPattern, $_POST['color']) )
    {    
        $formError['color'] = 'Veuillez renseigner une couleur valide';
    }

//vérif label puis $label
    if (empty($_POST['label']) )
    {
        $formError['label'] = 'Veuillez renseigner le champs "Libellé"';
    } 
    else if (!preg_match($textPattern, $_POST['label']) )
    {    
       $formError['label'] = 'Veuillez renseigner un libellé valide';
    }
    

//vérif price puis $price
    if (empty($_POST['price']) )
    {
        $formError['price'] = 'Veuillez renseigner le champs "Prix"';
    } 
    else if (!preg_match($pricePattern, $_POST['price']) )
    {    
        $formError['price'] = 'Veuillez renseigner un prix valide comportant ".00" ';
    }

//vérif stock puis $stock
    if (empty($_POST['stock']) )
    {
        $formError['stock'] = 'Veuillez renseigner le champs "Stock"';
    } 
    else if (!preg_match($numPattern, $_POST['stock']) )
    {    
        $formError['stock'] = 'Veuillez renseigner un stock valide';
    }
   

//vérif description puis $description
    if (empty($_POST['description']) )
    {
        $formError['description'] = 'Veuillez renseigner le champs "Description"';
    } 
    else if (!preg_match($textPattern, $_POST['description']) )
    {   
        $formError['description'] = 'Veuillez renseigner une description valide';
    }

//vérif radio2 puis $bloque
    if (!preg_match($radioPattern, $_POST['radio2']) )
    {
            $formError['radio2'] = 'Veuillez renseigner un blocage valide';
    }

    /**
     * VERIFICATION DU CHAMPS FILE
     */
//vérif photo puis $_FILES
    if ($_FILES['file']['name'] != '')  // si le champs n'est pas vide
    {
        $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');  // on définit les type de fichiers acceptés

        /* On extrait le type du fichier via l'extension FILE_INFO  */
        $finfo = finfo_open(FILEINFO_MIME_TYPE);  // création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée
        $mimetype = finfo_file($finfo, $_FILES['file']['tmp_name']);  // on récupère le type MIME du fichier et on le stock dans une variable

        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes))  //si le type de fichier est correct
        {
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);   // récupération de l'extension du fichier et stockage dans une variable
            chmod($_FILES['file']['tmp_name'], 0750);   // autorisation pour l'écriture
            //... $_FILES['file']['name'] = $id;   // renommage du fichier
            move_uploaded_file($_FILES['file']['tmp_name'], '../assets/img/' . $_POST['pro_id'] . "." . $extension);
            //move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);   //déplacement du fichier
        } 
        else  //si le type n'est pas correct
        {
            $formError['file'] = 'Vous devez joindre une photo valide au produit';   // cas où il n'y a pas de fichier d'uploader
        }
    }

    /**
     * GESTION DES ERREURS
     */

    if (empty($formError))  //si le tableau d'erreur est vide
    {
        $query = 'UPDATE produits SET
        pro_cat_id = :categories,
        pro_ref = :ref,
        pro_libelle = :label,
        pro_description = :descrip,
        pro_prix = :price,
        pro_couleur = :color,
        pro_stock = :stock,
        pro_photo = :extension,
        pro_d_modif = :dateModif,
        pro_bloque = :bloque
        WHERE pro_id = :id';


        $result = $db->prepare($query);
        $result->bindvalue(':id', $id, PDO::PARAM_INT);
        $result->bindvalue(':categories', $_POST['categories'], PDO::PARAM_INT);
        $result->bindvalue(':ref', $_POST['ref'], PDO::PARAM_STR);
        $result->bindvalue(':label', $_POST['label'], PDO::PARAM_STR);
        $result->bindvalue(':descrip', $_POST['description'], PDO::PARAM_STR);
        $result->bindvalue(':price', $_POST['price'], PDO::PARAM_INT);
        $result->bindvalue(':color', $_POST['color'], PDO::PARAM_STR);
        $result->bindvalue(':stock', $_POST['stock'], PDO::PARAM_INT);
        $result->bindvalue(':extension', $file, PDO::PARAM_STR);
        $result->bindvalue(':dateModif', $date);
        $result->bindvalue(':bloque', $_POST['radio2'], PDO::PARAM_STR);

        $result->execute();

        // message de confirmation
        header('Location:../views/msgProductUpdate.php');
    }
}
?>
