<?php
include('connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd :

$pro_id = $_GET['pro_id'];


if (isset($_POST['submit'])) {  //suppression si on appuie sur le bouton "supprimer"
      $delete_whereProId = 'DELETE FROM produits WHERE pro_id = :id';
      $resultDelete = $db->prepare($delete_whereProId);
      $resultDelete->bindvalue (':id', $pro_id, PDO::PARAM_INT);

      return $resultDelete->execute();
}
?>