<?php
include ('connexionBase.php');
?>

<?php
// définition d'un tableau d'erreur
$formError = array();

/**
 * définition des regex
 */


/**
 * vérification de formulaire
 */
// présence d'une valeur dans un champs de saisie
// valeur passe la regex
// $valeur = htmlspecialchars($_POST['valeur'])

if (isset($_POST['submit'])) {
    $rol_id = $_POST['id'];
    $rol_intitule = $_POST['intitule'];

    $insert = 'INSERT INTO roles(rol_id, rol_intitule) VALUES(:insert_rol_id, :insert_rol_intitule)';

    $requete = $db->prepare($insert);  //requête préparée plus sûre

    $requete->bindValue(':insert_rol_id', $rol_id, PDO::PARAM_INT);
    $requete->bindValue(':insert_rol_intitule', $rol_intitule, PDO::PARAM_STR);

    if ( $requete->execute() ) 
    {
        echo 'SUCCESS !!';
    } 
    else 
    {
        $formError['failed'] = 'Erreur d\'insertion !!!!';
    }
}
?>