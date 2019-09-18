<?php
include ('connexionBase.php'); //connexion à la bdd

$id = $_GET['pro_id'];

if (isset($_POST['submit'])) //suppression si on appuie sur le bouton "supprimer"
{
      $delete = "DELETE FROM produits WHERE pro_id = :id";
      $requete = $db->prepare($delete);
      $requete->bindvalue (':id', $id, PDO::PARAM_INT);
      return $requete->execute();

      header('Location:msgProductDelete1.php');
}

//redirection vers liste
// header("Location:../views/productsManagement.php");
?>