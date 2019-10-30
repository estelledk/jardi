<?php 
include('header1headSession.php'); 
include('header3Navbar.php');
include('../controler/ctrlProductDelete.php');
?>
<link rel="stylesheet" href="../assets/css/msg.css">
<title>suppression de produit</title><?php


if (isset($_POST['submit']) )  //si POST submit message conf de la suppression
{ ?>
	<div class="container-fluid text-center post-itcss h4Post-itcss col-lg-3 col-xs-12 pb-5">	
		<h4 class="text-danger pt-4 pb-4">La ligne a été supprimée</h4>
		<a href="products.php" class="btn btn-info" title="Retour vers la liste des produits">Retour à la liste de produits</a>
	</div> <?php	
} 
else //si pas POST submit proposition confirmation
{ ?>
	<form action="#" method="POST">  
		<div class="container-fluid text-center post-itcss h4Post-itcss col-lg-3 col-xs-12 pb-5">	
			<h4 class="pt-4 pb-2">Etes-vous sûr de vouloir<br>supprimer cette ligne ?</h4>  <!-- padding-top ; padding-bottom -->
				<input name="submit" type="submit" class="btn btn-danger col-lg-4" value="Suppression"><br><br>
				<a href="products.php" class="btn btn-secondary" title="Retour vers la liste des produits">Annuler</a>
		</div>
	</form>

<?php
}
include('footer.php'); ?>
</body>
</html>