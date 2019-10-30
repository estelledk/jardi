<?php 
include('header1headSession.php'); 
include('header3Navbar.php');
include('../controler/ctrlProductDelete.php');
?>
<!-- <link rel="stylesheet" href="../assets/css/msg.css"> -->
<title>suppression de produit</title><?php


if (isset($_POST['submit']) ) { ?>  <!-- si POST submit message conf de la suppression -->
    <h4>La ligne a été supprimée</h4>
    <a href="products.php" class="btn btn-info" title="Retour">Retour à la liste de produits</a> <?php	
} 
else { ?>   <!-- si pas POST submit proposition confirmation -->
	<form action="#" method="POST"> 	
        <h4>Etes-vous sûr de vouloir<br>supprimer cette ligne ?</h4>
        <input name="submit" type="submit" class="btn-danger" value="Suppression"><br><br>
        <a href="products.php" title="Retour">Annuler</a>
	</form>

<?php
}
include('footer.php'); ?>
</body>
</html>


<?php
// ------------------------------------------------------------------------------------------------------------------------------------------
// //CONTROLER
// //controler/ctrlProductDelete.php
// include('connexionBase.php');  //lance la fonction connexionBase qui est dans le fichier connexion_bdd :

// $pro_id = $_GET['pro_id'];


// if (isset($_POST['submit'])) {  //suppression si on appuie sur le bouton "supprimer"
//       $delete_whereProId = 'DELETE FROM produits WHERE pro_id = :id';
//       $resultDelete = $db->prepare($delete_whereProId);
//       $resultDelete->bindvalue (':id', $pro_id, PDO::PARAM_INT);

//       return $resultDelete->execute();
// }
?>