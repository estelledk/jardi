<?php 
include ('header1headSession.php'); ?>
	<link rel="stylesheet" href="../assets/css/login.css">
	<title>suppression de produit</title>
	<?php
include ('header2bodyImg.php');

include ('../controler/ctrlFormDelete.php');


if (isset($_POST['submit']) )  //si POST submit message conf de la suppression
{ ?>
	<h1 class="text-center">Suppression</h1>
	<div class="post-it">  <!-- pour appliquer css -->   
		<div class="container-fluid text-center">
    		<h4>la ligne a été supprimée</h4><br><br>
<!-- retour -->
			<a href="products.php" class="btn btn-success" title="Retour vers la liste des produits">Retour à la liste de produits</a>
			<br><br>
    	</div>
	</div>
	<?php
	
} else //si pas POST submit proposition confirmation
{
?>
	
	<h1 class="text-center">Suppression ?</h1>
	
	<form action="#" method="POST">  
		<div class="container-fluid text-center">
			<h4>Etes-vous sûr de vouloir supprimer cette ligne ?</h4><br><br>
<!-- suppression -->
			<input name="submit" type="submit" class="btn btn-danger" value="Suppression">
<!-- annulation -->
			<br><br>
			<a href="products.php" class="btn btn-secondary" title="Retour vers la liste des produits">Annuler</a>
			<br><br>
    	</div>
	</form>

<?php
}

include ('footer.php'); ?>
</body>
</html>